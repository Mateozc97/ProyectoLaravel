<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function register(){
        return view ('auth.register');
    }

    public function registerVerify(Request $request){
        $request->validate([
            'email' => 'required|unique:materia,email_profesor|email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
            'codigo' => 'required',
            'materia' => 'required'

        ],[
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya esta registrado',
            'password.required' => 'La contraseña es requerida',
            'password_confirmation.required' => 'La confirmación de la contraseña es requerida',
            'codigo.required' => 'El código de materia es requerido',
            'materia.required' => 'El nombre de la materia es requerido'
        ]);

        Materia::create([
            'email_profesor' => $request->email,
            'password' => bcrypt($request->password),
            'cod_materia' => $request->codigo,
            'nombre_materia' => $request->materia
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }

    public function login(){
        return view('auth.login');
    }

    public function loginVerify(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ], [
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya esta registrado',
        ]);
        
        // Autenticación
        echo "Inicio exitoso";
        if(Auth::attempt(['email_profesor'=>$request->email, 'password' => $request->password])){
            // Redirigir al dashboard si la autenticación es exitosa
            return redirect()->route('dashboard');
        }
        // Si la autenticación falla, regresa al login con un mensaje de error
        return back()->withErrors(['invalid_credentials'=> 'Usuario o contraseña no válida'])->withInput();
    }

    public function signOut(){
        Auth::logout();
        return redirect()->route('login')->with('success','session cerrada correctamente');
    }

}
