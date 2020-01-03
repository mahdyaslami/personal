<?php
require_once __DIR__ . '/php/requirement.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Presonal data</title>
  <!-- style sheets -->
  <?php
  add_style('css/index.css');
  get_default_styles();
  ?>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="m-time.php" target="content">M Time <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- content -->
  <div class="container-fluid content">
    <iframe name="content" src="m-time.php" class="content"></iframe>
  </div>

  <!-- scripts -->
  <?php
  get_default_scripts();
  ?>
</body>

</html>