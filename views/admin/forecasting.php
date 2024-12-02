<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Forecasting";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

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
              <div class="col-6">
                <h4 class="fw-bold py-3 mb-4">
                  <span class="text-muted fw-light"><?= $pageName ?></span>
                </h4>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table id="forecasting-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Company name</th>
                      <th>Vacancies</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $forecastStr = "SELECT 
                                      com.name as 'company_name',
                                      COUNT(com.name) as 'count',
                                      c.date_separated
                                    FROM users u 
                                    INNER JOIN candidates c
                                    ON c.user_id = u.id
                                    LEFT JOIN job j
                                    ON j.id = c.job_id
                                    INNER JOIN company com
                                    ON com.id = j.company_id
                                    WHERE u.role = 'applicant'
                                    AND c.status = 'Resigned'
                                    GROUP BY com.name
                                    ORDER BY COUNT(com.name) DESC, c.date_separated DESC";

                    $forecastQ = $conn->query($forecastStr);
                    while ($row = $forecastQ->fetch_object()):
                    ?>
                      <tr>
                        <td><?= $row->company_name ?></td>
                        <td>
                          <strong>
                            <?= $row->count ?>
                          </strong>
                          in the next few weeks/months
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>

                </table>
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

<script>
  const forecastingTable = $("#forecasting-table").DataTable({
    paging: true,
    lengthChange: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
    columns: [{
      width: "50%"
    }, {
      width: "50%"
    }]
  });
</script>

</html>