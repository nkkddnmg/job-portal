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

    <link rel='stylesheet' href='$serverName/assets/vendor/fonts/boxicons.css' />

    <link rel='stylesheet' href='$serverName/assets/vendor/css/core.css' class='template-customizer-core-css' />
    <link rel='stylesheet' href='$serverName/assets/vendor/css/theme-default.css' class='template-customizer-theme-css' />

    <link rel='stylesheet' href='$serverName/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css' />
    <link rel='stylesheet' href='$serverName/assets/vendor/css/pages/page-auth.css' />
    
    <link rel='stylesheet' href='$serverName/custom-assets/css/custom.css' />
   
    <link rel='stylesheet' href='https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css' />
    <link rel='stylesheet' href='https://cdn.datatables.net/buttons/3.0.0/css/buttons.bootstrap5.css' />
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css' />

    <link rel='stylesheet' href='https://cdn.datatables.net/searchbuilder/1.7.0/css/searchBuilder.bootstrap5.css' />
    <link rel='stylesheet' href='https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css' />

  </head>
  ";
}
