<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\Http\Requests\LoginRequest;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /** 
     * @param  LoginRequest $request 
     * @return json                
     */
    public function login(LoginRequest $request)
    {
        try {
            $http = new Client;

            $response = $http->post(env('APP_URL') .'/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('PASSPORT_CLIENT_ID'),
                    'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                    'username' => $request->get('email'),
                    'password' => $request->get('password'),
                    'scope' => '',
                ],
            ]);

            return json_decode((string) $response->getBody(), true);

        } catch(ClientException $e) {

            throw new AuthenticationException();

        }
    }
}