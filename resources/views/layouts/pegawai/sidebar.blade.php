  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/mirana.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->namauser}}</p>
          <!-- Status -->
          <a href="{{url('/petugas/dashboard')}}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ url('petugas/dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <!-- <li><a href="{{ route('pegawai.index') }}"><i class="fa fa-male"></i> <span>Data Pegawai</span></a></li> -->
<!--         <li class="treeview">
          <a href="#"><i class="fa fa-pencil"></i> <span>Input Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('input.index') }}">SPD</a></li>
            <li><a href="{{ route('inputevent.index') }}">EVENT</a></li>
          </ul>
        </li> -->
        <li><a href="{{ route('b-spd_validasi.spd') }}"><i class="fa fa-edit"></i> <span>Data SPD Individu</span></a></li>
        <li><a href="{{ route('lihat-event_belum.event') }}"><i class="fa fa-edit"></i> <span>Data SPD Event</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cloud-download"></i> <span>Cetak Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('cetak.index') }}">SPD Individu</a></li>
            <li><a href="{{ route('cetakevent.index') }}">SPD Event</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
