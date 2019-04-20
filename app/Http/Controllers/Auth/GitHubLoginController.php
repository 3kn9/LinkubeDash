<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GitHubLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function redirectToGitHub(){
        return redirect(
            'https://github.com/login/oauth/authorize?scope=user:email&client_id='
            . config('services.github.client_id'));
    }

    public function authorizedByGitHub(Request $request){
        return $this->requestGitHubAccessToken($request['code']);
    }

    protected function requestGitHubAccessToken($code){
        $result = [];
        parse_str(Utils::sendPostRequest('https://github.com/login/oauth/access_token', [
            'client_id' => config('services.github.client_id'),
            'client_secret' => config('services.github.client_secret'),
            'code' => $code
        ]), $result);

        if(!isset($result['access_token']) || $result['scope'] != 'user:email'){
            return $this->connectionFailedRedirect();
        }

        return $this->processGitHubLogin($result['access_token']);
    }

    protected function processGitHubLogin($token){

        $result = json_decode(Utils::sendcURLRequest('https://api.github.com/user', [
            "User-Agent: Linkube App",
            "Authorization: token " . $token
        ]), true);

        if(!isset($result['email'])){
            return $this->connectionFailedRedirect();
        }

        $users = User::all();
        if($user = $users->where('github_id', $result['id'])->first()){
            Auth::login($user);
            return redirect(route('dashboard'));
        } else {
            if($users->where('email', $result['email'])->first()){
                return $this->emailAlreadyExistRedirect();
            } else {
                User::create([
                    'name' => $result['name'] ?? $result['login'],
                    'email' => $result['email'],
                    'github_id' => $result['id']
                ]);
                return redirect(route('dashboard'));
            }
        }

    }

    protected function connectionFailedRedirect(){
        return redirect(route('login'))->withErrors(['notification' => trans('auth.github_failed')]);
    }

    protected function emailAlreadyExistRedirect(){
        return redirect(route('login'))->withErrors(['notification' => trans('auth.github_email_already_exist')]);
    }
}
