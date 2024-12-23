<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
     /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
          
         
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['user'] =  $user;
       
            return response()->json(["message"=>"Usurio Registrado"], 200);
        } catch (ValidationException $e) {
            return response()->json([
                "message" => "Datos inválidos.",
                "errors" => $e->errors()
            ], 422);
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" => ["Error en el servidor"]
            ], 500);
        } 
        
    }

    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (! $token = auth()->attempt($credentials)) {
                return response()->json([
                    'message' =>"Credenciales incorrectas",
                    'errors' =>[' No Autorizado'] 
                ], 401);
                
            }  
            $user = auth()->user();
            return response()->json([
                'message' => 'Usuario Logeado',
                'token' => $token,
                'name' => $user['name'],
                'email' => $user['email'],
                'id' => $user['id']
            ]);
        
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" => ["Error en el servidor"]
            ], 500);
        } 
    }

    // Logout - Invalida el token
    public function logout()
    {
        try {
            auth()->logout(); 
            return response()->json(['message' => 'Cerró Sessión']);
        }catch (\Exception $e) {
            return response()->json([
                "message" => "Error Comuniquese con su Administrador",
                "errors" => ["Error en el servidor"]
            ], 500);
        } 
    }

   // Validar el token - Obtener los datos del usuario
   public function validateToken()
   {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return response()->json([
                'message' => 'Token válido',
                'user' => $user,
            ], 200);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['message' => 'Token expirado'], 401);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'Token inválido'], 401);
        } catch (\PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['message' => 'Token no proporcionado'], 401);
        }
   }
}
