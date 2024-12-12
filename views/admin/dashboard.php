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
            <div class="row">
              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/admin/applicants" ?>">
                  <div class="card">
                    <div class="card-body">
                      <?php
                      $applicantStr = "SELECT 
                                        u.id,
                                        u.fname,
                                        u.lname
                                    FROM users u 
                                    WHERE u.role = 'applicant'
                                    AND u.id NOT IN(SELECT c.user_id FROM candidates c WHERE c.status = 'Hired')";

                      $applicantQ = $conn->query($applicantStr);
                      ?>
                      <span class="fw-semibold d-block mb-1">Applicants</span>
                      <h3 class="card-title mb-2 text-center"><?= $applicantQ->num_rows ?></h3>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/admin/employers" ?>">
                  <div class="card">
                    <div class="card-body">
                      <?php
                      $jobs = $helpers->select_all_with_params("job", "status <> 'inactive'");

                      $jobCount = $jobs ? count($jobs) : 0;
                      ?>
                      <span class="fw-semibold d-block mb-1">Available Jobs</span>
                      <h3 class="card-title mb-2 text-center"><?= $jobCount ?></h3>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/admin/companies" ?>">
                  <div class="card">
                    <div class="card-body">
                      <?php
                      $verifiedStr = "SELECT 
                                      c.verification_id,
                                      c.name,
                                      v.status
                                      FROM company c
                                      INNER JOIN verification v 
                                      ON c.verification_id = v.id
                                      WHERE v.status = 'approved'";

                      $verifiedCompany = $conn->query($verifiedStr);
                      ?>
                      <span class="fw-semibold d-block mb-1">Verified Companies</span>
                      <h3 class="card-title mb-2 text-center"><?= $verifiedCompany->num_rows ?></h3>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/admin/pending-verification" ?>">
                  <div class="card">
                    <div class="card-body px-3">
                      <?php
                      $pendingString = "SELECT 
                                      c.verification_id,
                                      c.name,
                                      v.status
                                      FROM company c
                                      INNER JOIN verification v 
                                      ON c.verification_id = v.id
                                      WHERE v.status = 'pending'";

                      $pendingCompany = $conn->query($pendingString);
                      ?>
                      <span class="fw-semibold d-block mb-1">Pending Company Verification</span>
                      <h3 class="card-title mb-2 text-center"><?= $pendingCompany->num_rows ?></h3>
                    </div>
                  </div>
                </a>
              </div>


            </div>

            <div class="card mt-2">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 d-flex justify-content-end">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Select Industries
                      </button>
                      <ul class="dropdown-menu scrollable-menu" data-popper-placement="bottom-start">
                        <?php
                        $industries = $helpers->custom_query("SELECT 
                                                                  i.name,
                                                                  COUNT(j.id) as 'count'
                                                              FROM industries i
                                                              LEFT JOIN company c
                                                              ON c.industry_id = i.id
                                                              LEFT JOIN job j
                                                              ON j.company_id = c.id
                                                              GROUP BY i.name
                                                              ORDER BY COUNT(j.id) DESC");
                        if (count($industries) > 0):
                          for ($i = 0; $i < count($industries) - 1; $i++):
                        ?>
                            <li>
                              <a href="javascript:void(0)" class="dropdown-item">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="industry_<?= $i ?>" value="<?= $industries[$i]->name ?>" <?= $i < 5 ? "checked" : "" ?>>
                                  <label class="form-check-label" for="industry_<?= $i ?>"> <?= $industries[$i]->name . " (" . ($industries[$i]->count) . ")" ?> </label>
                                </div>
                              </a>
                            </li>
                          <?php endfor; ?>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div id="chart" class="mt-4"></div>
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
                            j.date_created
                            FROM job j 
                            WHERE MONTH(j.date_created)='$i'
                            AND JSON_CONTAINS(j.industries, '$industry->id', '$')
                            AND j.status <> 'inactive'
                            ");

      array_push($seriesData["data"], $comm->num_rows);
    }

    array_push($series, $seriesData);
  }
}
?>
<script>
  const months = <?= json_encode($months) ?>;
  const series = <?= json_encode($series) ?>;

  let selectedIndustries = $(".form-check-input:checkbox:checked").map(function() {
    return $(this).val();
  }).get()

  var options = {
    series: series.filter((d) => selectedIndustries.includes(d.name)),
    chart: {
      type: 'bar',
      height: 500,
      stacked: true,
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
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

  $(".form-check-input").on("click", function() {
    selectedIndustries = $(".form-check-input:checkbox:checked").map(function() {
      return $(this).val();
    }).get()

    const newData = series.filter((d) => selectedIndustries.includes(d.name))

    chart.updateSeries(newData);
  })
</script>

</html>