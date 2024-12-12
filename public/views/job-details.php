<?php include("../../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
$LOGIN_USER = null;
if (isset($_SESSION["id"])) {
  $LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
}
?>
<!doctype html>
<html lang="en">

<?= head("Job Portal") ?>

<body id="top">

  <?= loadingEl() ?>

  <div class="site-wrap">

    <?php include("../components/navbar.php") ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>'); height: 20vh !important" id="home-section">
      <div class="container">
        <div class="row pt-0">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Job Details</h1>
          </div>
        </div>
      </div>
    </section>

    <?php
    $job = $helpers->select_all_individual("job", "id=$_GET[id]");
    $company = $helpers->select_all_individual("company", "id=$job->company_id");

    $user_id = $LOGIN_USER ? $LOGIN_USER->id : null;

    $candidateData = $helpers->select_all_individual("candidates", "user_id='$user_id' AND job_id='$job->id' ORDER BY id DESC LIMIT 1");

    $checkFullTime = $helpers->select_all_with_params("candidates", "user_id='$user_id'");
    $toDisable = false;

    foreach ($checkFullTime as $stat) {
      $jobData = $helpers->select_all_individual("job", "id=$stat->job_id");

      if ($stat->status == "Hired" && $jobData->type == "Full time") {
        $toDisable = true;
      }
    }

    $disableApplyButton = ($candidateData && $candidateData->status != "Withdrawn") || $toDisable ? "disabled" : "";
    ?>
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="<?= $helpers->get_company_logo_link($company->id) ?>" style="width: 120px" alt="Image">
              </div>
              <div>
                <h2><?= $job->title ?></h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?= $company->name ?></span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?= $company->district ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?= $job->type ?></span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row justify-content-end">
              <div class="col-6">
                <button type="button" class="btn btn-block btn-primary btn-md" onclick="handleApply('<?= $LOGIN_USER ? $LOGIN_USER->id : null ?>', '<?= $job->id ?>')" <?= $disableApplyButton ?>>
                  <?php
                  if ($candidateData && $candidateData->status != "Withdrawn") {
                    echo "Applied";
                  } else {
                    echo "Apply Now";
                  }
                  ?>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">

              <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                <span class="icon-align-left mr-3"></span>
                Job Description
              </h3>
              <p>
                <?= $job->description ?>
              </p>

            </div>

            <?php
            $schedules = json_decode($job->schedule, true);
            if ($schedules) :
            ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                  <span class="icon-clock-o mr-3"></span>
                  Schedule
                </h3>
                <ul class="list-unstyled m-0 p-0">
                  <?php
                  foreach ($schedules as $schedule) :
                  ?>
                    <li class="d-flex align-items-start mb-2">
                      <span class="icon-check_circle mr-2 text-muted"></span>
                      <span>
                        <?= $schedule ?>
                      </span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <?php
            $qualifications = json_decode($job->qualifications, true);
            if (count($qualifications) > 0) :
            ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                  <span class="icon-rocket mr-3"></span>
                  Qualifications
                </h3>
                <ul class="list-unstyled m-0 p-0">
                  <?php
                  foreach ($qualifications as $qualification) :
                    $skill = $helpers->select_all_individual("skills_list", "id=$qualification");
                    if ($skill) :
                  ?>
                      <li class="d-flex align-items-start mb-2">
                        <span class="icon-check_circle mr-2 text-muted"></span>
                        <span>
                          <?= $skill->name ?>
                        </span>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <?php
            $experiences = json_decode($job->experience, true);
            if ($experiences) :
            ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                  <span class="icon-book mr-3"></span>
                  Experience
                </h3>
                <ul class="list-unstyled m-0 p-0">
                  <?php
                  foreach ($experiences as $experience_id) :
                    $experience = $helpers->select_all_individual("experience_list", "id=$experience_id");
                  ?>
                    <li class="d-flex align-items-start mb-2">
                      <span class="icon-check_circle mr-2 text-muted"></span>
                      <span>
                        <?= $experience->name ?>
                      </span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <?php
            $benefits = json_decode($job->benefits, true);
            if ($benefits) :
            ?>
              <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary">
                  <span class="icon-turned_in mr-3"></span>
                  Benefits
                </h3>
                <ul class="list-unstyled m-0 p-0">
                  <?php
                  foreach ($benefits as $benefit) :
                  ?>
                    <li class="d-flex align-items-start mb-2">
                      <span class="icon-check_circle mr-2 text-muted"></span>
                      <span>
                        <?= $benefit ?>
                      </span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>

          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong><?= date("M d, Y", strtotime($job->date_created)) ?></li>
                <li class="mb-2"><strong class="text-black">Work Type:</strong> <?= $job->type ?></li>
                <li class="mb-2"><strong class="text-black">Experience Level:</strong> <?= $job->experience_level ?></li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> <?= $company->district ?></li>
                <li class="mb-2"><strong class="text-black">Work Setup:</strong> <?= $job->location_type ?></li>
                <li class="mb-2"><strong class="text-black">Salary:</strong> <?= $job->pay ?></li>

                <?php
                if ($job->industries) :
                  $industry_ids = json_decode($job->industries, true);
                ?>
                  <li class="mb-2">
                    <strong class="text-black"><?= count($industry_ids) > 1 ? "Industries:" : "Industry" ?></strong>
                    <ul class="px-4">
                      <?php
                      foreach ($industry_ids as $industry_id):
                        $industry_data = $helpers->select_all_individual("industries", "id = '$industry_id'");
                      ?>
                        <li>
                          <?= $industry_data->name ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                <?php endif; ?>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded mb-4 d-none" id="mapFrame"></div>
          </div>
        </div>
      </div>
    </section>

  </div>

  <!-- SCRIPTS -->
  <?php include("../components/footer.php") ?>
</body>
<script>
  $(document).ready(function() {
    const mapFrame = `<?= $company->map_frame ? $company->map_frame : "" ?>`;
    displayMap(mapFrame)
  });

  function displayMap(val) {
    if (val) {
      $("#mapFrame").html("")
      $("#mapFrame").append(val)
      $("#mapFrame").removeClass("d-none")

      const iframe = $("#mapFrame").find("iframe")
      if (iframe.length) {
        $(iframe).css({
          "border": "0",
          "width": "100%",
          "height": "250px"
        })
      }
    } else {
      $("#mapFrame").html("")
      $("#mapFrame").addClass("d-none")
    }
  }

  function handleApply(userId, jobId) {
    if (!userId) {
      swal.fire({
        title: "Warning",
        html: "You need to login before applying for a job",
        icon: "warning",
        confirmButtonText: "Login",
        showCancelButton: true
      }).then((res) => {
        if (res.isConfirmed) {
          sessionStorage.setItem("referer", encodeURIComponent(window.location.href));
          window.location.href = `<?= SERVER_NAME . "/views/sign-in" ?>`
        }
      })
    } else {
      $.post("<?= SERVER_NAME . "/backend/nodes?action=applicant_apply" ?>", {
        job_id: jobId,
        user_id: userId
      }, (data, status) => {
        const resp = JSON.parse(data);
        swal.fire({
          title: resp.success ? "Success" : "Error!",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => resp.success ? window.location.reload() : undefined);

      })
    }
  }
</script>

</html>