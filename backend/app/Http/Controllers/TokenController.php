<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyTokenRequest;
use App\Services\TokenService;
use Exception;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    protected $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function create(Request $request)
    {
        //$request->token_name
        $token = $request->customer()->createToken('name');

        return ['token' => $token->plainTextToken];
    }

    public function delete(Request $request)
    {
        try {
            $request->customer()->token()->revoke();
            $this->response['authenticated'] = false;
        } catch (Exception $e) {

        }

        return response()->json($this->response, $this->response['code']);
    }

    public function verify(VerifyTokenRequest $request)
    {
        try {
            $data = [
                'type' => $request->getType(),
                'token' => $request->getToken(),
            ];

            $this->tokenService->verify($data);
            $this->response['data'] = ['verified' => true];
        } catch (Exception $e) {
            $this->response = [
                'code' => 500,
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($this->response, $this->response['code']);
    }
}
