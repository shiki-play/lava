<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title','Sample App') - Laravel </title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
  <header class="navbar navbar-fixed-top navbat-inverse">
      <div class="container">
          <div class="col-md-offset-1 col-md-10">
              <a href="/" id="logo">Sampple App</a>
              <nav>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="/help">Help</a> </li>
                      <li><a href="#">login</a></li>
                  </ul>
              </nav>
          </div>
      </div>
  </header>
  <div class="container">
    @yield('content')
  </div>

  </body>
</html>