@extends('connect.master')
@section('title','Registro')

<!--Esta pagina hereda de master-->
<!--En ésta pagina se estan reecribiendo los atributos heredados de master-->
<!--Recordar que @ es para sentencias blade-->
@section('content')

<div class="box box-register shadow">

  <div class="header">
        <!--  <a href="{{url('/')}}">
            <img src="{{url('/static/img/logo.jpg')}}" alt="">
        </a>-->
        REGISTRO
        <br>
        Introduce tus datos
    </div>

    <div class="inside">
         {!! Form::open(['url' => '/register'])!!}<!--Para indicarle la rutaen la que debe operar-->

         <label for="name">Nombre: </label>
         <div class="input-group ">
  
               <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
               {!! Form::text('name',Null,['class'=>'form-control', 'required'])!!}<!--form-control es de bootstrap-->
        </div>

        <label for="lastname" class="mtop16">Apellido: </label>
           <div class="input-group ">
    
                 <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                 {!! Form::text('lastname',Null,['class'=>'form-control', 'required'])!!}<!--form-control es de bootstrap-->
            </div>
         
        <label for="email" class="mtop16">Correo electrónico: </label>
              <div class="input-group ">
       
                    <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-envelope-open-text"></i></div>
                     </div>
                    {!! Form::email('email',Null,['class'=>'form-control', 'required'])!!}<!--form-control es de bootstrap-->
                </div>

        <label for="password" class="mtop16">Password: </label>
             <div class="input-group ">
       
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>

                {!! Form::password('password',['class'=>'form-control', 'required'])!!}<!--form-control es de bootstrap...Este arreglo es para definir los atribbutos de la etiqueta-->
             </div>

        <label for="confpassword" class="mtop16">Confirmar Password: </label>
    
             <div class="input-group ">
       
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                
                 {!! Form::password('confpassword',['class'=>'form-control', 'required'])!!}<!--form-control es de bootstrap...Este arreglo es para definir los atribbutos de la etiqueta-->
            </div>

        {!! Form::submit('Registrarse',['class' => 'btn btn-success mtop16'])!!}
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
            <a href="{{url('/login')}}">¿Ya tienes una cuenta? Regresar al inicio</a>
        </div>
    </div>
</div>
@stop