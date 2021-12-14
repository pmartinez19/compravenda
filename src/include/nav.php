<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/compravende/index.php">Compravende</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/compravende/src/app/home.php">Inicio</a>
        </li>
        <li class="nav-item">
          <?php if(isset($_SESSION['login_user'])){
            echo '<a class="nav-link" href="/compravende/src/class/logout.php">Cerrar Sesión</a>';
            }else{
              echo '<a class="nav-link" href="/compravende/src/app/login.php">Iniciar Sesión</a>';
            }            
            ?>
        </li>
        <?php if(isset($_SESSION['login_user'])){
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="/compravende/src/app/user.php">'.$_SESSION["login_user"].'</a>';
            echo '</li>';

            }else{
              echo '<a class="nav-link" href="#">Invitado</a>';
            }            
            ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>