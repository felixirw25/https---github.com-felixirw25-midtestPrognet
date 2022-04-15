<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
          <h3 style="color:white; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">ICIPORT (Integrated Civil Report) Admin</h3>
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, {{ Auth::guard('admins')->user()->nama }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <form action="{{ route('admin-logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</li></button>
                  </form>
              </ul>
            </li>
          @else
          <li class="nav-item">
            <a class="btn btn-outline-primary btn-sm" aria-current="page" href="{{ route('admin-login') }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
        </ul>
        

      </div>
    </div>
  </nav>
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link @if($judul=='Admin Home') active @endif" aria-current="page" href="{{ route('admin-home') }}">Beranda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if($judul=='List Laporan') active @endif" href="{{ route('laporan-list') }}">List Laporan</a>
          </li>
        </ul>
      </div>
    </ul>
    </div>
  </nav>