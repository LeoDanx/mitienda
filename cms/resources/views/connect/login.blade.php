@extends('connect.master')
@section('title','Login')

<!--Esta pagina hereda de master-->
<!--En ésta pagina se estan reecribiendo los atributos heredados de master-->
<!--Recordar que @ es para sentencias blade-->
@section('content')

<div class="box box-login shadow">

  <div class="header">
        <!--  <a href="{{url('/')}}">
            <img src="{{url('/static/img/logo.jpg')}}" alt="">
        </a>-->
        INICIO DE SESIÓN
        <br>
        Introduce tus datos
    </div>

    <div class="inside">
         {!! Form::open(['url' => '/login'])!!}
         
        <label for="email">Correo electrónico: </label>
              <div class="input-group ">
       
                    <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-envelope-open-text"></i></div>
                     </div>
                    {!! Form::email('email',Null,['class'=>'form-control'])!!}<!--form-control es de bootstrap-->
                </div>

        <label for="password" class="mtop16">Password: </label>
             <div class="input-group ">
       
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                    {!! Form::password('password',['class'=>'form-control'])!!}<!--form-control es de bootstrap...Este arreglo es para definir los atribbutos de la etiqueta-->
                </div>
        {!! Form::submit('Ingresar',['class' => 'btn btn-success mtop16'])!!}
        {!! Form::close()!!}

        @if(Session::has('message'))
        <div class="container">
        <div class="mtop16 alert alert-{{Session::get('typealert')}}" style="display:none;">
            {{Session::get('message')}}
            @if($errors->any())        
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>    
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(function(){$('.alert').slideUp();},10000)
            </script>
            </div>
        </div>
        @endif
    
        <div class=" footer mtop16">

            <a href="{{url('/register')}}">¿No tienes una cuenta? Registrate</a>
            <a href="{{url('/recover')}}">Recuperar contraseña</a>
            </div>
    </div>

    
</div>
@stop