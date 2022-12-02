<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href=
     "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
      
         <!-- Bootstrap Font Icon CSS -->
         <link rel="stylesheet" href=
     "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <title>{{ $title }}</title>
</head>
<body>
    
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2  min-vh-100">
                <span class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <i class="fs-4 bi bi-speedometer text-white"></i> <span class="ms-1 fs-5 d-none d-sm-inline">Dashboard</span>
                </span>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start border-top " id="menu">
                    <li class="nav-item">
                        <a href="{{ route('client.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi bi-people-fill text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Clients</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-building text-white"></i> <span class="ms-1 d-none d-sm-inline text-white">Companies</span></a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="{{ asset('images/profile.jpg') }}" alt="hugenerd" width="30" height="30" class="rounded-circle">  
                      <span class="d-none d-sm-inline mx-1">User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <main class="col py-3">
          {{ $slot }}
        </main>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>`
</body>
</html>