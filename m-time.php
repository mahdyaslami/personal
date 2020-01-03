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
  add_style('css/m-time.css');
  get_default_styles();
  ?>
</head>

<body>
  <!-- content -->
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex flex-column justify-content-center align-items-center">
        <div class="card calendar">
          <div class="card-header">
            <div class="row d-flex flex-row justify-content-between">
              <button id="next" class="btn btn-success">
                <img src="img/svg/next.svg">
              </button>

              <button id="current" class="btn btn-outline-primary" disabled> 12 / 12 / 1370</button>

              <button id="previous" class="btn btn-success">
                <img src="img/svg/previous.svg">
              </button>
            </div>

            <div class="row d-flex flex-row justify-content-between mt-2 rounded week-header">
              <span class="day">ش</span>
              <span class="day">ی</span>
              <span class="day">د</span>
              <span class="day">س</span>
              <span class="day">چ</span>
              <span class="day">پ</span>
              <span class="day">ج</span>
            </div>
          </div>

          <form id="calendar-days" class="card-body" onsubmit="return false;">
            <div class="row week">
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
            </div>

            <div class="row week">
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
            </div>

            <div class="row week">
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
            </div>

            <div class="row week">
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
            </div>

            <div class="row week">
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
            </div>

            <div class="row week">
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
              <button class="btn day"></button>
            </div>
          </form>

          <div class="card-footer text-muted">
            <a id="go-today" href="#">Go today</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- scripts -->
  <?php
  get_default_scripts();
  add_script('js/m-time.js');
  ?>
</body>

</html>