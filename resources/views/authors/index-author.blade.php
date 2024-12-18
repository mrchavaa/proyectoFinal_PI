
<!-- 
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->
 <!DOCTYPE html>

 <html lang="en">
 
 <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
     <link rel="icon" type="image/png" href=" {{ asset('assets/img/favicon.ico') }} ">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>Autores</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href=" {{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" />
     <link href=" {{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0 ') }} " rel="stylesheet" />
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


     <style>
        .udeg {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
     </style>
 </head>
 
 <body>
     <div class="wrapper">
         <div class="sidebar" data-image=" {{ asset('assets/img/sidebar-5.jpg') }} ">
             <!--
         Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
 
         Tip 2: you can also add an image using data-image tag
     -->
             <div class="sidebar-wrapper">
                 <div class="logo">
                    <div class="udeg">
                        <img src="{{ asset('assets/img/udeg-white.png') }}" alt="Logo UdeG">
                     </div>
                 </div>
                 <ul class="nav">
                     <li>
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Perfil</p>
                        </a>
                     </li>
                     <li>
                        <a class="nav-link" href=" {{ route('book.index') }} ">
                            <i class="nc-icon nc-map-big"></i>
                            <p>Libros</p>
                        </a>
                     </li>
                     <li class="nav-item active">
                         <a class="nav-link" href="{{ route('author.index') }}">
                             <i class="nc-icon nc-badge"></i>
                             <p>Autores</p>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="{{ route('file.index') }}">
                             <i class="nc-icon nc-paper-2"></i>
                             <p>Archivos</p>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
         <div class="main-panel">
             <!-- Navbar -->
             <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#pablo"> Biblioteca Virtual </a>
                     <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                     </button>
                     <div class="collapse navbar-collapse justify-content-end" id="navigation">
                         <ul class="nav navbar-nav mr-auto">
                             <li class="nav-item">
                                 <a href="#" class="nav-link" data-toggle="dropdown">
                                     <i class="nc-icon nc-palette"></i>
                                     <span class="d-lg-none">Dashboard</span>
                                 </a>
                             </li>
                             <li class="dropdown nav-item">
                                 <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                     <i class="nc-icon nc-planet"></i>
                                     <span class="notification">5</span>
                                     <span class="d-lg-none">Notification</span>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <a class="dropdown-item" href="#">Notificación 1</a>
                                     <a class="dropdown-item" href="#">Notificación 2</a>
                                     <a class="dropdown-item" href="#">Notificación 3</a>
                                     <a class="dropdown-item" href="#">Notificación 4</a>
                                     <a class="dropdown-item" href="#">Otra notificación</a>
                                 </ul>
                             </li>
                             <li class="nav-item">
                                 <a href="#" class="nav-link">
                                     <i class="nc-icon nc-zoom-split"></i>
                                     <span class="d-lg-block">&nbsp;Buscar</span>
                                 </a>
                             </li>
                         </ul>
                         <ul class="navbar-nav ml-auto">
                             <li class="nav-item">
                                 <a class="nav-link" href="#pablo">
                                     <span class="no-icon">Cuenta</span>
                                 </a>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <span class="no-icon">Menú</span>
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                     <a class="dropdown-item" href="#">Action</a>
                                     <a class="dropdown-item" href="#">Another action</a>
                                     <a class="dropdown-item" href="#">Something</a>
                                     <a class="dropdown-item" href="#">Something else here</a>
                                     <div class="divider"></div>
                                     <a class="dropdown-item" href="#">Separated link</a>
                                 </div>
                             </li>
                             <li class="nav-item">
                                @guest
                                        <li class="nav-item d-flex align-items-center">
                                        <a href="{{ route('login') }}" class="nav-link text-body font-weight-bold px-0">
                                            <i class="fa fa-user me-sm-1"></i>
                                            <span class="d-sm-inline d-none">Iniciar sesión</span>
                                        </a>
                                        </li>
                                @endguest

                                @auth
                                        <li class="nav-item d-flex align-items-center">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="nav-link text-body font-weight-bold px-0"
                                        >
                                            <i class="fa fa-user me-sm-1"></i>
                                            <span class="d-sm-inline d-none">Salir</span>
                                        </a>
                                        </li>
                                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                             @csrf
                                        </form>
                                @endauth
                             </li>
                         </ul>
                     </div>
                 </div>
             </nav>
             <!-- End Navbar -->


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-50">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header">
                        <h4 style="margin: 10px" class="card-title">Autores registrados</h4>
                        <a style="margin: 10px" href=" {{ route('author.create') }} " class="btn btn-success">Agregar autor</a>
                        <p style="margin: 10px" class="card-category">Autores disponibles para asignar a la hora de crear un libro</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Autor</th>
                                    <th>Biografía</th>
                                    <th>Libros</th>
                                    @can('delete', $authors[0])
                                        <th>Acciones</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                <tr>
                                    <td>
                                        <p> {{ $author->id }} </p>
                                    </td>
                                    
                                    <td>
                                        <div>
                                            <a href="{{ route('author.show', $author) }}"> {{ $author->name }} </a>
                                        </div>
                                    </td>
                
                                    <td>
                                        <p> {{ $author->bio }} </p>
                                    </td>
                
                                    <td>
                                        @foreach($author->books as $book)
                                            <a href=" {{ route('book.show', $book) }} "> {{ $book->title }} </a>
                                        @endforeach
                                    </td>
                
                                    @can('delete', $author)
                                    <td>
                                        <a style="margin: 5px;" class="btn btn-warning" href=" {{ route('author.edit', $author) }} ">Editar</a>
                
                                        <form action=" {{ route('author.destroy', $author) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button style="margin: 5px" class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar a este autor?');">Eliminar</button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

             <footer class="footer">
                 <div class="container-fluid">
                     <nav>
                         <ul class="footer-menu">
                             <li>
                                 <a href="{{ route('user.index') }}">
                                     Inicio
                                 </a>
                             </li>
                             <li>
                                 <a href=" {{ route('book.index') }} ">
                                     Libros
                                 </a>
                             </li>
                             <li>
                                 <a href=" {{ route('author.index') }} ">
                                     Autores
                                 </a>
                             </li>
                             <li>
                                 <a href="https://github.com/mrchavaa">
                                     Mi GitHub
                                 </a>
                             </li>
                         </ul>
                         <p class="copyright text-center">
                             ©
                             <script>
                                 document.write(new Date().getFullYear())
                             </script>
                             <a href="https://github.com/mrchavaa">Chava Chavita</a>, Programación Para Internet
                         </p>
                     </nav>
                 </div>
             </footer>
         </div>
     </div>
     <!--   -->
     <!-- <div class="fixed-plugin">
     <div class="dropdown show-dropdown">
         <a href="#" data-toggle="dropdown">
             <i class="fa fa-cog fa-2x"> </i>
         </a>
 
         <ul class="dropdown-menu">
             <li class="header-title"> Sidebar Style</li>
             <li class="adjustments-line">
                 <a href="javascript:void(0)" class="switch-trigger">
                     <p>Background Image</p>
                     <label class="switch">
                         <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                     </label>
                     <div class="clearfix"></div>
                 </a>
             </li>
             <li class="adjustments-line">
                 <a href="javascript:void(0)" class="switch-trigger background-color">
                     <p>Filters</p>
                     <div class="pull-right">
                         <span class="badge filter badge-black" data-color="black"></span>
                         <span class="badge filter badge-azure" data-color="azure"></span>
                         <span class="badge filter badge-green" data-color="green"></span>
                         <span class="badge filter badge-orange" data-color="orange"></span>
                         <span class="badge filter badge-red" data-color="red"></span>
                         <span class="badge filter badge-purple active" data-color="purple"></span>
                     </div>
                     <div class="clearfix"></div>
                 </a>
             </li>
             <li class="header-title">Sidebar Images</li>
 
             <li class="active">
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="../assets/img/sidebar-1.jpg" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="../assets/img/sidebar-3.jpg" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="..//assets/img/sidebar-4.jpg" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="../assets/img/sidebar-5.jpg" alt="" />
                 </a>
             </li>
 
             <li class="button-container">
                 <div class="">
                     <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                 </div>
             </li>
 
             <li class="header-title pro-title text-center">Want more components?</li>
 
             <li class="button-container">
                 <div class="">
                     <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                 </div>
             </li>
 
             <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>
 
             <li class="button-container">
                 <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                 <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
             </li>
         </ul>
     </div>
 </div>
  -->
 </body>
 <!--   Core JS Files   -->
 <script src=" {{ asset('assets/js/core/jquery.3.2.1.min.js') }} " type="text/javascript"></script>
 <script src=" {{ asset('assets/js/core/popper.min.js') }} " type="text/javascript"></script>
 <script src=" {{ asset('assets/js/core/bootstrap.min.js') }} " type="text/javascript"></script>
 <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
 <script src=" {{ asset('assets/js/plugins/bootstrap-switch.js') }} "></script>
 <!--  Google Maps Plugin    -->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!--  Chartist Plugin  -->
 <script src=" {{ asset('assets/js/plugins/chartist.min.js') }} "></script>
 <!--  Notifications Plugin    -->
 <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
 <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
 <script src=" {{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.0') }} " type="text/javascript"></script>
 <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
 <script src=" {{ asset('assets/js/demo.js') }} "></script>
 <script type="text/javascript">
     $(document).ready(function() {
         // Javascript method's body can be found in assets/js/demos.js
         demo.initDashboardPageCharts();
 
         demo.showNotification();
 
     });
 </script>
 
 </html>
 