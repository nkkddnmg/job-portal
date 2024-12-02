<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Dashboard";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?= head($pageName) ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include("../components/sidebar.php") ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include("../components/navbar.php") ?>
        <!-- / Navbar -->

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/jobs" ?>">
                  <div class="card">
                    <div class="card-body">
                      <?php $jobs =  $helpers->select_all_with_params("job", "company_id='$LOGIN_USER->company_id' and status <> 'inactive'"); ?>
                      <span class="fw-semibold d-block mb-1">Posted Jobs</span>
                      <h3 class="card-title mb-2 text-center"><?= $jobs ? count($jobs) : 0 ?></h3>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/jobs" ?>">
                  <div class="card">
                    <div class="card-body px-3">
                      <?php
                      $candidateStr = "SELECT 
                                        c.*,
                                        j.*
                                        FROM job j
                                        LEFT JOIN candidates c
                                        ON j.id = c.job_id
                                        WHERE 
                                        c.status = 'Applied' AND
                                        j.company_id = '$LOGIN_USER->company_id'";

                      $candidateQ = $conn->query($candidateStr);
                      ?>
                      <span class="fw-semibold d-block mb-1">Candidates</span>
                      <h3 class="card-title mb-2 text-center"><?= $candidateQ->num_rows ?></h3>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/interviews" ?>">
                  <div class="card">
                    <div class="card-body">
                      <?php
                      $interviewsStr = "SELECT 
                                        c.*,
                                        j.*
                                        FROM job j
                                        LEFT JOIN candidates c
                                        ON j.id = c.job_id
                                        WHERE 
                                        c.status = 'Hired' AND
                                        c.invitation_confirmation = 'yes' AND
                                        j.company_id = '$LOGIN_USER->company_id'";

                      $interviewsQ = $conn->query($interviewsStr);
                      ?>
                      <span class="fw-semibold d-block mb-1">Pending Interviews</span>
                      <h3 class="card-title mb-2 text-center"><?= $interviewsQ->num_rows ?></h3>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-3">
                <a href="<?= SERVER_NAME . "/views/employees" ?>">
                  <div class="card">
                    <div class="card-body">
                      <?php
                      $employeeStr = "SELECT 
                                        c.*,
                                        j.*
                                        FROM job j
                                        LEFT JOIN candidates c
                                        ON j.id = c.job_id
                                        WHERE 
                                        c.status = 'Hired' AND
                                        j.company_id = '$LOGIN_USER->company_id'";

                      $employeeStrQ = $conn->query($employeeStr);
                      ?>
                      <span class="fw-semibold d-block mb-1">Employees</span>
                      <h3 class="card-title mb-2 text-center"><?= $employeeStrQ->num_rows ?></h3>
                    </div>
                  </div>
                </a>
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

<?php include("../components/footer.php") ?>

</html>