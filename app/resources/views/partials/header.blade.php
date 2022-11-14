<div class="container">
    <nav class="navbar navbar-expand-lg text-center">
      <a href="/" class="navbar-link text-decoration-none text-uppercase">Laravel 9 | Eloquent Sluggable</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hallo, User !
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/user"><i class="fa-solid fa-folder-open"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>  
                <li><a class="dropdown-item" href="/my-profile/"><i class="fa-solid fa-user"></i> My Profile</a></li>
                <li><hr class="dropdown-divider"></li>  
                {{-- berikan akses gerbang yang namanya admin --}}
                @can('owner')
                <li><a class="dropdown-item" href="/user/create"><i class="fa-solid fa-file-pen"></i> Buat Postingan</a></li>
                <li><hr class="dropdown-divider"></li>  
                @endcan 
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                  </form>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</div>