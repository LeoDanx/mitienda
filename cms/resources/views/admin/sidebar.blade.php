<div class="sidebar shadow">

    <div class="section-top">
        <div class="logo">
            <img src="{{url('/static/img/logo.jpg')}}" class = "img-fluid" alt="No se pudo cargar imagen">
        </div>
        <div class="user">
            <span class="subtitle">Bienvenido</span>
            <div class="name">
                {{Auth::user()->name}} {{Auth::user()->lastname}}
            <a href="{{url('/logout')}}" data-toggle="tooltip" data-placement="top" title="Salir"><i class="fas fa-sign-out-alt"></i></a>
            </div>
            <div class="email">{{Auth::user()->email}}</div>
        </div>
    </div>

    <div class="main">
        <ul>
            <li>
            <a href="{{url('/admin')}}"><i class="fas fa-home"></i>Inicio</a>

            </li>

            <li>
                <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i>Productos</a>
    
            </li>

            <li>
                <a href="{{url('/admin/users')}}"><i class="fas fa-users"></i>Usuarios</a>
    
            </li>
    

                

        </ul>
    </div>


</div>