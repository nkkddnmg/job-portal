<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Dashboard";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-free">

<?= head($pageName) ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include("../../components/sidebar.php") ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include("../../components/navbar.php") ?>
        <!-- / Navbar -->

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <div class="card-body">
                <div id="chart"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->

      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

<?php include("../../components/footer.php") ?>
<script src="<?= SERVER_NAME . "/assets/vendor/libs/apexcharts/apexcharts.js" ?>"></script>
<?php
$industries = $helpers->select_all("industries");

$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

$series = array();
if (count($industries) > 0) {

  foreach ($industries as $industry) {
    $seriesData = array(
      "name" => $industry->name,
      "data" => array()
    );

    for ($i = 1; $i <= 12; $i++) {
      $comm = $conn->query("SELECT 
                            j.title,
                            j.date_created,
                            c.industry_id,
                            c.name
                            FROM job j 
                            LEFT JOIN company c
                            ON c.id=j.company_id
                            WHERE MONTH(j.date_created)='$i'
                            AND c.industry_id='$industry->id'
                            ");

      array_push($seriesData["data"], $comm->num_rows);
    }

    array_push($series, $seriesData);
  }
}
?>
<script>
  const months = <?= json_encode($months) ?>;

  var options = {
    series: <?= json_encode($series) ?>,
    chart: {
      type: 'bar',
      height: 500,
      stacked: true,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    xaxis: {
      categories: months,
    },
    yaxis: {
      title: {
        text: 'Total Count'
      }
    },
    fill: {
      opacity: 1
    },
    tooltip: {
      y: {
        formatter: (val) => val
      }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>

</html>