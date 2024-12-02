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
    <?php
    $job = $helpers->select_all_individual("job", "id=$_GET[id]");
    $company = $helpers->select_all_individual("company", "id=$job->company_id");

    $user_id = $LOGIN_USER ? $LOGIN_USER->id : null;
    ?>
    <section class="site-section p-0">
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
                  <span class="m-2"><span class="icon-room mr-2"></span><?= "$company->address $company->district" ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?= $job->type ?></span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row justify-content-end">
              <div class="col-6">
                <button type="button" class="btn btn-block btn-primary btn-md" disabled>
                  Apply Now
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
                  ?>
                    <li class="d-flex align-items-start mb-2">
                      <span class="icon-check_circle mr-2 text-muted"></span>
                      <span>
                        <?= $skill->name ?>
                      </span>
                    </li>
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

  $(".site-footer").hide()
</script>

</html>