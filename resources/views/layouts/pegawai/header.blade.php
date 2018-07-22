  <!-- Main Header -->
@if (Auth::user()->role == '2')

  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/petugas/dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img src="{{ asset('images/img-04.png') }}" alt="IMG" width="45px" height="">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img src="{{ asset('images/img-03.png') }}" alt="IMG" width="200px" height="">
      </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li>
          @if (Auth::guest())
                  <a href="{{ route('login') }}">Login</a>
             @else
                  <a class="fa fa-power-off" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Keluar
                  </a>
              @endif
        </li>
      </ul>
    </div>
  </nav>
  </header>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
   </form>

   @else
   <?php 
   echo ("<SCRIPT LANGUAGE='JavaScript'>
           window.alert('Anda Harus Login Sebagai Petugas!')
           window.location.href='/sinanda/public/admin/dashboard';
       </SCRIPT>");
  ?>
@endif
