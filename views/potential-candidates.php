<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Potential Candidates";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

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
              <div class="col-6">
                <h4 class="fw-bold py-3 mb-4">
                  <span class="text-muted fw-light"><?= $pageName ?></span>
                </h4>
              </div>
              <div class="col-6 d-flex justify-content-end align-items-center">
                <button type="button" class="btn btn-secondary" onclick="return window.history.back()" style="height: 38.94px;">
                  Go Back
                </button>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table id="potential-candidate-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $potentialUserIds = array();

                    $job = $helpers->select_all_individual("job", "id='$_GET[id]'");

                    $post_qualification = array();
                    $post_experience = array();

                    if ($job->qualifications) $post_qualification = json_decode($job->qualifications, true);
                    if ($job->experience) $post_experience = json_decode($job->experience, true);

                    $qualificationArray = array_merge($post_qualification, $post_experience);

                    $qualifications = array();

                    $job_qualifications = $helpers->select_all_with_params("experience_list", "id IN (" . (implode(', ', $qualificationArray)) . ")");

                    foreach ($job_qualifications as $job_qualification) {
                      array_push($qualifications, $job_qualification->name);
                    }

                    foreach ($qualifications as $qualification) {
                      if ($qualification == "No Experience Needed") {
                        $getUserNoExp = $helpers->custom_query("SELECT u.*, we.user_id FROM users u LEFT JOIN work_experience we ON we.user_id=u.id WHERE we.id IS NULL AND u.role = 'applicant'");

                        if (count($getUserNoExp) > 0) {
                          foreach ($getUserNoExp as $userNoExp) {
                            array_push($potentialUserIds, $userNoExp->id);
                          }
                        }
                      } else {
                        $potentialQ = $helpers->select_all_with_params("work_experience", "LOWER(job_title) LIKE LOWER('$qualification')");

                        foreach ($potentialQ as $potential) {
                          if (!in_array($potential->user_id, $potentialUserIds)) {
                            array_push($potentialUserIds, $potential->user_id);
                          }
                        }
                      }
                    }

                    $company = $helpers->select_all_individual("company", "id='$job->company_id'");

                    $userInSameDistricts = $helpers->select_all_with_params("users", "role = 'applicant' AND district LIKE '%$company->district%'");

                    if (count($userInSameDistricts) > 0) {
                      foreach ($userInSameDistricts as $userIsSameDistrict) {
                        array_push($potentialUserIds, $userIsSameDistrict->id);
                      }
                    }

                    $uniqueUserIds = array_unique($potentialUserIds);
                    foreach ($uniqueUserIds as $user_id) :
                    ?>
                      <tr>
                        <td><?= $helpers->get_full_name($user_id) ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-profile?id=$user_id" ?>`)'>
                            View Profile
                          </button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
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

  <div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content" style="height:90vh">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3" style="height: 100%">
              <iframe src="" id="previewIframe" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
</body>

<?php include("../components/footer.php") ?>

<script>
  function handleOpenModal(src) {
    $("#previewIframe").attr("src", src)
    $("#modalPreview").modal("show")
  }

  const potentialCandidateTableCols = [0];
  const potentialCandidateTable = $("#potential-candidate-table").DataTable({
    paging: true,
    lengthChange: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
    columns: [{
      width: '80%'
    }, {
      width: '20%'
    }]
  });
</script>

</html>