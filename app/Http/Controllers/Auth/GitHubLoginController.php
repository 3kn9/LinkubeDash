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

        if(!isset($result['access_token'])){
            return $this->failedRedirect('auth.github_failed');
        }

        return $this->processGitHubLogin($result['access_token']);
    }

    protected function processGitHubLogin($token){

        $result = json_decode(Utils::sendcURLRequest('https://api.github.com/user', [
            "User-Agent: Linkube App",
            "Authorization: token " . $token
        ]), true);

        $users = User::all();
        if($user = $users->where('github_id', $result['id'])->first()){
            Auth::login($user);
            return redirect(route('dashboard'));
        } else {

            if(!isset($result['email'])){

                // If the GitHub user hasn't set any public email address
                // Send a request to GitHub again to check for private email addresses

                if(!($email = $this->getPrimaryEmail(json_decode(Utils::sendcURLRequest('https://api.github.com/user/emails', [
                    "User-Agent: Linkube App",
                    "Authorization: token " . $token
                ]), true)))){
                    return $this->failedRedirect('auth.github_invalid_email');
                }

            } else {
                $email = $result['email'];
            }

            if($users->where('email', $result['email'])->first()){
                return $this->failedRedirect('auth.github_email_already_exist');
            } else {
                User::create([
                    'name' => $result['name'] ?? $result['login'],
                    'email' => $email,
                    'github_id' => $result['id']
                ]);
                return redirect(route('dashboard'));
            }
        }

    }

    protected function failedRedirect($message){
        return redirect(route('login'))->withErrors(['notification' => trans($message)]);
    }

    protected function getPrimaryEmail(array $emails){
        foreach($emails as $data){
            if($data['primary'] && $data['verified']){
                return $data['email'];
            }
        }
        return false;
    }
}
