<nav class="navbar p-0 navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid p-2 navcolor">
    <a class="navbar-brand" href="index.html">FortressGuard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-md-9 collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="#">Contact Us</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="userDashboard.php">Dashboard</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " href="adminDashboard.php">Dashboard</a>
        </li> 
      </ul>
    </div>
    <div class="d-flex mx-3">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-target="btns" aria-expanded="false">
            Welcome <?php echo $_SESSION['username']; ?>
          </a>
          <div id="btns">
          <ul class="dropdown-menu">
            <li><a class="nav-link " href="logout.php">Logout</a></li>
          </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>