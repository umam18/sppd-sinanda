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
          <a href="{{url('/admin/dashboard')}}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
<!--         <li class="treeview">
          <a href="#"><i class="fa fa-pencil"></i> <span>Input Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('input-data.index') }}">SPD</a></li>
            <li><a href="{{ route('event.index') }}">EVENT</a></li>
          </ul>
        </li> -->
        <li class="treeview">
          <a href="#"><i class="fa fa-folder-open-o"></i> <span>Validasi Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-link"></i> <span>Data SPD Individu</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span></a>
              <ul class="treeview-menu">
                <li><a href="{{ route('b_validasi.spd') }}">Belum Divaldiasi</a></li>
                <li><a href="{{ route('s_validasi.spd') }}">Sudah Divalidasi</a></li>
              </ul>
            </li>
              <li><a href="#"><i class="fa fa-link"></i> <span>Data SPD Event</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span></a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('lihat_belum.event') }}">Belum Divaldiasi</a></li>
                  <li><a href="{{ route('lihat_sudah.event') }}">Sudah Divalidasi</a></li>
                </ul>
              </li>
          </ul>
        </li>
        <li><a href="{{ route('admin.report') }}"><i class="fa fa-edit"></i> <span>Report</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-pencil"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user-management.index') }}"><i class="fa fa-user"></i> <span>User Management</span></a></li>
            <li><a href="{{ route('data-pegawai.index') }}"><i class="fa fa-male"></i> <span>Data Pegawai</span></a></li>
            <li><a href="{{ route('permenkeu.index') }}"><i class="fa fa-dollar"></i> <span>Permenkeu</span></a></li>
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-wrench"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-sticky-note-o"></i> <span>Template Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span></a>
              <ul class="treeview-menu">
                <li><a href="#">SPPD</a></li>
                <li><a href="#">Rincian Biaya</a></li>
                <li><a href="#">Transport</a></li>
                <li><a href="#">Kwitansi</a></li>
              </ul>
            </li>
            <li><a class="fa fa-institution"  href="#">&nbsp;&nbsp; PERMENKEU</a></li>
            <li><a class="fa fa-asterisk" href="{{ route('jabatan.index') }}">&nbsp;&nbsp; Kode Jabatan</a></li>
            <li><a class="fa fa-cube" href="{{ route('pembebanan.index') }}">&nbsp;&nbsp; Kode Pembebanan</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
