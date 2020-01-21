<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">My College Website</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faculty.php">Faculties</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Academics</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="dcs.php">Departments Of Computer Science</a>
          <a class="dropdown-item" href="dc.php">Departments Of Commerce</a>
          <a class="dropdown-item" href="da.php">Departments Of Arts</a>
        </div>
      </li>

    </ul>
    <!-- Links -->
    <!--
    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>
  -->
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->