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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p>Find the perfect job that your deserved</p>
            </div>
            <form method="POST" id="form-search" class="search-jobs-form">
              <div class="row mb-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 mb-lg-0">
                  <input type="text" name="keyword" class="form-control form-control-lg" placeholder="Job">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" name="job_type" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option value="Full time">Full time</option>
                    <option value="Part time">Part time</option>
                    <option value="Contract">Contract</option>
                    <option value="Temporary">Temporary</option>
                    <option value="Permanent">Permanent</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>
              <?php
              $top5Keywords = $helpers->custom_query("SELECT keywords FROM search_keywords GROUP BY keywords ORDER BY count(*) DESC LIMIT 5");

              if (count($top5Keywords) > 0) :
              ?>
                <div class="row">
                  <div class="col-md-12 popular-keywords">
                    <h3>Trending Keywords:</h3>
                    <ul class="keywords list-unstyled m-0 p-0">
                      <?php foreach ($top5Keywords as $data) : ?>
                        <li>
                          <a href="<?= SERVER_NAME . "/public/views/job-listing?k=$data->keywords" ?>" class="">
                            <?= $data->keywords ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              <?php endif; ?>
            </form>
          </div>
        </div>
      </div>

      <a href="#howItWorks" class="scroll-button smoothscroll">
        <span class="icon-keyboard_arrow_down"></span>
      </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="howItWorks" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">How it Works?</h2>
            <p class="lead text-white">Fast and easy process</p>
          </div>
        </div>
        <div class="row pb-0 block__19738">

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/user.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">Create an Account</span>
          </div>

          <div class="col mb-5 mb-lg-0 d-flex align-items-center justify-content-center p-0">
            <span class="icon-arrow-right"></span>
          </div>

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/search.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">Find your job</span>
          </div>

          <div class="col mb-5 mb-lg-0 d-flex align-items-center justify-content-center p-0">
            <span class="icon-arrow-right"></span>
          </div>

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/file.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">CV/ Resume</span>
          </div>

          <div class="col mb-5 mb-lg-0 d-flex align-items-center justify-content-center p-0">
            <span class="icon-arrow-right"></span>
          </div>

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/checked.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">Apply</span>
          </div>


        </div>
      </div>
    </section>
    <?php if ($LOGIN_USER) : ?>
      <section class="site-section py-4" id="jobPostings">
        <div class="container">

          <?php
          $jobIds = array();

          function handleAddIds($jobs)
          {
            global $jobIds;

            if (count($jobs) > 0) {
              foreach ($jobs as $job) {
                array_push($jobIds, $job->id);
              }
            }
          }

          $jobList = $helpers->custom_query("SELECT j.*, c.district FROM job j LEFT JOIN company c ON c.id=j.company_id WHERE j.status <> 'inactive';");

          foreach ($jobList as $job) {
            if ($job->district == $LOGIN_USER->district) {
              array_push($jobIds, $job->id);
            }
          }

          $jobPreferences = $helpers->select_all_with_params("job_preference", "user_id='$LOGIN_USER->id'");

          foreach ($jobPreferences as $jobPreference) {

            if ($jobPreference->job_title) {
              foreach (json_decode($jobPreference->job_title, true) as $jobTitle) {
                $jobs = $helpers->select_all_with_params("job", "LOWER(title) LIKE LOWER('%$jobTitle%') AND status='active'");
                handleAddIds($jobs);
              }
            }

            if ($jobPreference->job_types) {
              foreach (json_decode($jobPreference->job_types, true) as $jobType) {
                $jobs = $helpers->select_all_with_params("job", "LOWER(type) LIKE LOWER('%$jobType%') AND status='active'");
                handleAddIds($jobs);
              }
            }

            if ($jobPreference->work_schedules) {
              $workSchedule = json_decode($jobPreference->work_schedules, true);

              $days = isset($workSchedule["days"]) ? $workSchedule["days"] : null;
              $shifts = isset($workSchedule["shifts"]) ? $workSchedule["shifts"] : null;
              $schedules = isset($workSchedule["schedules"]) ? $workSchedule["schedules"] : null;

              if ($days) {
                foreach ($days as $day) {
                  $jobs = $helpers->select_all_with_params("job", "LOWER(schedule) LIKE LOWER('%$day%') AND status='active'");
                  handleAddIds($jobs);
                }
              }

              if ($shifts) {
                foreach ($shifts as $shift) {
                  $jobs = $helpers->select_all_with_params("job", "LOWER(schedule) LIKE LOWER('%$shift%') AND status='active'");
                  handleAddIds($jobs);
                }
              }

              if ($schedules) {
                foreach ($schedules as $schedule) {
                  $jobs = $helpers->select_all_with_params("job", "LOWER(schedule) LIKE LOWER('%$schedule%') AND status='active'");
                  handleAddIds($jobs);
                }
              }
            }

            if ($jobPreference->location_type) {
              foreach (json_decode($jobPreference->location_type, true) as $locationType) {
                $jobs = $helpers->select_all_with_params("job", "LOWER(location_type) LIKE LOWER('%$locationType%') AND status='active'");
                handleAddIds($jobs);
              }
            }
          }

          $uniqueJobs = array_unique($jobIds);
          ?>
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">Recommended Jobs</h2>
            </div>
          </div>
          <?php if (count($uniqueJobs) > 0) : ?>
            <ul class="job-listings mb-5">
              <?php
              foreach ($uniqueJobs as $jobId) :
                $job = $helpers->select_all_individual("job", "id='$jobId'");
                $company = $helpers->select_all_individual("company", "id='$job->company_id'");
              ?>
                <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                  <a href="<?= SERVER_NAME . "/public/views/job-details?id=$job->id" ?>"></a>
                  <div class="job-listing-logo">
                    <img src="<?= $helpers->get_company_logo_link($company->id) ?>" class="img-fluid">
                  </div>

                  <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                    <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                      <h2><?= $job->title ?></h2>
                      <strong><?= $company->name ?></strong>
                    </div>
                    <div class="job-listing-location mb-3 mb-sm-0 custom-width w-50">
                      <span class="icon-room"></span> <?= $company->district . " - " . $job->location_type ?>
                    </div>
                    <div class="job-listing-meta">
                      <?php
                      $badgeColor = "";

                      if ($job->type == "Full time" || $job->type == "Full time") {
                        $badgeColor = "badge-success";
                      } else if ($job->type == "Part time" || $job->type == "Contract") {
                        $badgeColor = "badge-primary";
                      } else if ($job->type == "Temporary") {
                        $badgeColor = "badge-danger";
                      }

                      ?>
                      <span class="badge <?= $badgeColor ?>"><?= $job->type ?></span>
                    </div>
                  </div>

                </li>
              <?php endforeach; ?>
            </ul>
          <?php else : ?>
            <h3 class="text-center">No Recommended Job Posted Yet</h3>
          <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>

    <section class="site-section py-4" id="jobPostings">
      <div class="container">

        <?php
        $jobs = $helpers->select_all_with_params("job", "status <> 'inactive' ORDER BY id DESC LIMIT 6");
        if (count($jobs) > 0) :
        ?>
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2">Newly Posted Job</h2>
            </div>
          </div>

          <ul class="job-listings mb-5">
            <?php
            foreach ($jobs as $job) :
              $company = $helpers->select_all_individual("company", "id='$job->company_id'");
            ?>
              <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="<?= SERVER_NAME . "/public/views/job-details?id=$job->id" ?>"></a>
                <div class="job-listing-logo">
                  <img src="<?= $helpers->get_company_logo_link($company->id) ?>" class="img-fluid">
                </div>

                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                  <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                    <h2><?= $job->title ?></h2>
                    <strong><?= $company->name ?></strong>
                  </div>
                  <div class="job-listing-location mb-3 mb-sm-0 custom-width w-50">
                    <span class="icon-room"></span> <?= $company->district . " - " . $job->location_type ?>
                  </div>
                  <div class="job-listing-meta">
                    <?php
                    $badgeColor = "";

                    if ($job->type == "Full time" || $job->type == "Full time") {
                      $badgeColor = "badge-success";
                    } else if ($job->type == "Part time" || $job->type == "Contract") {
                      $badgeColor = "badge-primary";
                    } else if ($job->type == "Temporary") {
                      $badgeColor = "badge-danger";
                    }

                    ?>
                    <span class="badge <?= $badgeColor ?>"><?= $job->type ?></span>
                  </div>
                </div>

              </li>
            <?php endforeach; ?>
          </ul>

        <?php else : ?>
          <h3 class="text-center">No Job Posted Yet</h3>
        <?php endif; ?>

      </div>
    </section>

    <?php if (!$LOGIN_USER) : ?>
      <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h2 class="text-white">Looking For A Job?</h2>
              <p class="mb-0 text-white lead">We Help To Get The Best Job And Find A Talent.</p>
            </div>
            <div class="col-md-3 ml-auto">
              <a href="javascript:void(0)" onclick="navigateSIgnUp()" class="btn btn-warning btn-block btn-lg">Sign Up</a>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <section class="site-section py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Company We've Helped</h2>
                <p class="lead">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</p>
              </div>
            </div>
          </div>
          <?php
          $companies = $helpers->select_all_with_params("company", "id IS NOT NULL ORDER BY RAND() LIMIT 8");
          foreach ($companies as $company) :
          ?>
            <div class="col-6 col-lg-3 col-md-6 text-center">
              <img src="<?= $helpers->get_company_logo_link($company->id) ?>" alt="Image" class="img-fluid logo-1">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>

  <!-- SCRIPTS -->
  <?php include("../components/footer.php") ?>
  <script>
    $("#form-search").on("submit", function(e) {
      e.preventDefault()

      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=add_search_keyword" ?>",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          const resp = $.parseJSON(data)
          window.location.href = resp.link
        },
        error: function(data) {
          swal.fire({
            title: 'Oops...',
            text: 'Something went wrong.',
            icon: 'error',
          })
        }
      });
    })
  </script>
</body>

</html>