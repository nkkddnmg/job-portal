<?php
function head(string $title)
{
  $serverName = SERVER_NAME;
  return "
    <head>
      <meta charset='utf-8' />
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0' />

      <title>$title</title>

      <meta name='description' content='' />

      <link rel='icon' type='image/x-icon' href='' />

      <link rel='preconnect' href='https://fonts.googleapis.com' />
      <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
      <link href='https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap' rel='stylesheet' />

      <link rel='stylesheet' href='$serverName/public/assets/css/custom-bs.css'>
      <link rel='stylesheet' href='$serverName/public/assets/css/jquery.fancybox.min.css'>
      <link rel='stylesheet' href='$serverName/public/assets/css/bootstrap-select.min.css'>
      <link rel='stylesheet' href='$serverName/public/assets/fonts/icomoon/style.css'>
      <link rel='stylesheet' href='$serverName/public/assets/fonts/line-icons/style.css'>
      <link rel='stylesheet' href='$serverName/public/assets/css/owl.carousel.min.css'>
      <link rel='stylesheet' href='$serverName/public/assets/css/animate.min.css'>

      <link rel='stylesheet' href='$serverName/assets/vendor/fonts/boxicons.css' />
      
      <!-- MAIN CSS -->
      <link rel='stylesheet' href='$serverName/public/assets/css/style.css'>

      <link rel='stylesheet' href='$serverName/custom-assets/css/custom.css'>
    </head>
  ";
}

function loadingEl()
{
  return "
      <div id='overlayer'></div>
      <div class='loader'>
        <div class='spinner-border text-primary' role='status'>
          <span class='sr-only'>Loading...</span>
        </div>
      </div>
  ";
}
