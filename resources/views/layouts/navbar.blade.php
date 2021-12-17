<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Fixed top navbar example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/css/login.css">

    <link rel="stylesheet" href="/css/dashboard">
    <link rel="stylesheet" href="/js/dashboard">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        min-height: 75rem;
        padding-top: 4.5rem;
      }

            
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#bio">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#articles">Berita</a>
        </li>
      </ul>
      <ul class="navbar-nav me-2 mb-2 mb-md-0">
      @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selamat Datang,<strong> {{ auth()->user()->name }}</strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if ( auth()->user()->level == 1)
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-window-stack"></i> Dashboard</a></li>
            @endif
            @if ( auth()->user()->level == null || auth()->user()->level == 0  )
            <li><a class="dropdown-item" href="#"><i class="bi bi-window-stack"></i> Profile</a></li>
            @endif
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                </form>
            </li>
            </ul>
        </li>

        @else
            <li class="nav-item">
                <a class="nav-link active ms-auto" aria-current="page" href="{{ url('/login') }}">
                    <i class="bi bi-box-arrow-right"></i> Login</a>
            </li>
        @endauth
        </ul>

    </div>
  </div>
</nav>

    @yield('konten')

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
      // Automatic Slideshow - change image every 4 seconds
      var myIndex = 0;
      carousel();
      
      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 4000);    
      }
      
      // Used to toggle the menu on small screens when clicking on the menu button
      function myFunction() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else { 
          x.className = x.className.replace(" w3-show", "");
        }
      }
      
      // When the user clicks anywhere outside of the modal, close it
      var modal = document.getElementById('ticketModal');
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      })


      </script>
      

  </body>
</html>
