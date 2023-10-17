<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand">
          <b>Bank Sampah</b>
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          @if (Auth::user())
          
          @else
          <li class="active">
            <a href="{{ url('/dashboard') }}"> 
              <i class="fa fa-dashboard"></i> Dashboard 
            </a>
          </li>
          <li>
            <a href="{{ url('/') }}">
              <i class="fa fa-plus"></i> Input Jenis Sampah
            </a>
          </li>
          @endif
          @can("admin")
          <li class="active">
            <a href="{{ url('/admin/dashboard') }}"> 
              <i class="fa fa-dashboard"></i> Dashboard 
            </a>
          </li>
          <li>
            <a href="{{ url('/admin/jenis_sampah') }}"> 
              <i class="fa fa-trash"></i> Jenis Sampah 
            </a>
          </li>
          <li>
            <a href="{{ url('/admin/transaksi') }}">
              <i class="fa fa-edit"></i> Transaksi
            </a>
          </li>
          @endcan
        </ul>
      </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              @if (Auth::user())
              <img src="{{ url('') }}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                @else
                
              @endif
              
              <span class="hidden-xs">
                {{ empty(Auth::user()->nama) ? '' :  Auth::user()->nama }}
              </span>
            </a>
            @if (empty(Auth::user()))
                
            @else
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->nama }} - 
                  @if (Auth::user()->role == "admin")
                      Administrator
                  @elseif(Auth::user()->role == "user")
                    User
                  @else
                    -
                  @endif
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a onclick="return confirm('Apakah Anda Ingin Keluar ?')" href="{{ url('/logout') }}" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>