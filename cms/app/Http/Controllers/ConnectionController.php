<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator,Hash;
use App\User;

class ConnectionController extends Controller
{
    //

    public function __construct(){

        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){

        return view('connect.login');

    }

    public function postLogin(Request $request){

        $rules=[

            'email' =>'required|email',
            'password' => 'required|min:8'

        ];

        $messages =[

            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'Revise el formato de su correo. Es inválido.',
            'password.required' => 'Por favor escriba su contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres'
        ];

        $validator= Validator::make($request->all(),$rules,$messages);
        if($validator->fails()): 
         return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');

        else:

            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],true)):
                return redirect('/');
             else:
                return back()->withErrors($validator)->with('message','Correo electrónico o contraseña inválidas')->with('typealert','danger');
            endif;

        endif;

    }

    public function getRegister(){

        return view('connect.register');

    }

    public function postRegister(Request $request){

       // return view('connect.register');
       $rules= [

            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email', //users es la tabla del usuario
            'password' => 'required|min:8',
            'confpassword' => 'required|same:password'
       ];

       $messages=[

            'name.required' =>'Su nombre es requerido.',
            'lastname.required' =>'Su apellido es requerido.',
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'Revise el formato de su correo. Es inválido.' ,
            'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.' ,
            'password.required' => 'Por favor escriba su contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'confpassword.required' => 'Debe confirmar las contraseñas.',
            'confpassword.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'confpassword.same' => 'Las contraseñas no coinciden.'

       ];

       $validator= Validator::make($request->all(),$rules,$messages);
       if($validator->fails()): 
        return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');//withErrors extrae los errore sde validator; with arroja mensaje 'message' que es cachado en el master; danger es usado por bootrtrap para estilos

       else:
        //aqui se recolecta la info que el usuario indica
        $user = new User;//instancia al modelo user
        $user->name = e($request->input('name'));//e para evitar inyeciones de codigo
        $user->lastname = e($request->input('lastname'));
        $user->email = e($request->input('email'));
        $user->password = Hash::make($request->input('password'));

        if($user->save()):
            return redirect('/login')->with('message','Su usuario se creó con éxito.Puede iniciar sesión')->with('typealert','success');
       endif;
    endif;
    }


    public function getLogout(){
        Auth::logout();
        return redirect('/');

        //Personas que estan registradas y ya logueadas, no pueden ingresar al registro ni al inicio de sesión
        //checar RedirectAuthenticated.php en Middleware, cambiar ruta en return redirect('/')
    }


}
