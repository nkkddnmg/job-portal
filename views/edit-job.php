<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Edit Job";
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
            </div>

            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-7">
                  <div class="card">
                    <div class="card-body">
                      <?php $job = $helpers->select_all_individual("job", "id='$_GET[id]'") ?>
                      <form id="update-job" method="POST">
                        <input type="text" name="job_id" value="<?= $_GET['id'] ?>" hidden readonly>

                        <div class="mb-3 form-group">
                          <label for="title" class="form-label">Job Title</label>
                          <input type="text" class="form-control" id="title" value="<?= $job->title ?>" name="title" required />
                        </div>

                        <div class="mb-3 form-group">
                          <label for="job_type" class="form-label">Job Type</label>
                          <select class="form-select" name="job_type" id="job_type" required>
                            <?php
                            $jobTypes = array(
                              "Full time",
                              "Part time",
                              "Contract",
                              "Temporary",
                              "Permanent"
                            );
                            foreach ($jobTypes as $jobType) :
                            ?>
                              <option value="<?= $jobType ?>" <?= $helpers->is_selected($jobType, $job->type) ?>>
                                <?= $jobType ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="experience_level" class="form-label">Experience level</label>
                          <select class="form-select" name="experience_level" id="experience_level" required>
                            <?php
                            $experienceLevels = array(
                              "No Experience needed",
                              "Under 1 year",
                              "1 year",
                              "2 years",
                              "3 years",
                              "4 years",
                              "5 years",
                              "6 years",
                              "7 years",
                              "8 years",
                              "9 years",
                              "10 years",
                              "11+ years",
                            );
                            foreach ($experienceLevels as $experienceLevel) :
                            ?>
                              <option value="<?= $experienceLevel ?>" <?= $helpers->is_selected($experienceLevel, $job->experience_level) ?>>
                                <?= $experienceLevel ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="location_type" class="form-label">Location Type</label>
                          <select name="location_type" id="location_type" class="form-select" required>
                            <?php
                            $locationTypes = array(
                              "On Site",
                              "Remote (WFH)",
                              "Hybrid",
                            );
                            foreach ($locationTypes as $locationType) :
                            ?>
                              <option value="<?= $locationType ?>" <?= $helpers->is_selected($locationType, $job->location_type) ?>>
                                <?= $locationType ?>
                              </option>
                            <?php endforeach; ?>

                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="schedule" class="form-label">Schedule</label>
                          <select class="form-select" name="schedule[]" id="schedule" multiple required>
                            <?php
                            $schedules = array(
                              "4 hour shift",
                              "8 hour shift",
                              "10 hour shift",
                              "12 hour shift",
                              "Monday to Friday",
                              "Day shift",
                              "Night shift",
                              "No Nights",
                              "Weekends only",
                              "On Call",
                              "No Weekends",
                            );
                            $post_schedule = json_decode($job->schedule, true);
                            foreach ($schedules as $schedule) :
                              $selectedSchedule = in_array($schedule, $post_schedule) ? "selected" : "";
                            ?>
                              <option value="<?= $schedule ?>" <?= $selectedSchedule ?>>
                                <?= $schedule ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="mb-3">
                          <?php
                          $payData = explode(" - ", $job->pay);
                          $payData2 = explode(" ", $payData[1]);

                          $min = $payData[0];
                          $max = $payData2[0];
                          $post_range = "$payData2[1] $payData2[2]";
                          ?>
                          <label for="title" class="form-label">Pay <span class="text-danger">*</span></label>

                          <div class="row">
                            <div class="col-md-4 col-sm-6">
                              <label class="form-label">Minimum</label>
                              <input type="text" name="min" id="min" class="form-control" value="<?= $min ?>" required>
                            </div>

                            <div class="col-md-4 col-sm-6">
                              <label class="form-label">Maximum</label>
                              <input type="text" name="max" id="max" class="form-control" value="<?= $max ?>" required>
                            </div>
                            <div class="col-md-4 col-sm-12">
                              <label class="form-label">Range</label>
                              <select class="form-select" name="range" id="range" required>
                                <?php
                                $ranges = array(
                                  "per hour",
                                  "per day",
                                  "per week",
                                  "per month",
                                  "per year",
                                );
                                foreach ($ranges as $range) :
                                ?>
                                  <option value="<?= $range ?>" <?= $helpers->is_selected($range, $post_range) ?>>
                                    <?= $range ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="benefits" class="form-label">Benefits</label>
                          <select class="form-select" name="benefits[]" id="benefits" multiple required>
                            <?php
                            $benefits = array(
                              "Health insurance",
                              "Paid time off",
                              "Dental insurance",
                              "Vision insurance",
                              "Flexible schedule",
                              "Life insurance",
                              "Retirement plan",
                              "Referral program",
                              "Employee discount",
                              "Health saving account",
                              "Relocation assistance",
                              "Professional development assistance",
                              "Employee assistance program",
                            );
                            $post_benefits = json_decode($job->benefits, true);
                            foreach ($benefits as $benefit) :
                              $selectedBenefits = in_array($benefit, $post_benefits) ? "selected" : "";
                            ?>
                              <option value="<?= $benefit ?>" <?= $selectedBenefits ?>>
                                <?= $benefit ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="qualifications" class="form-label">Qualifications</label>
                          <select class="form-select" name="qualifications[]" id="qualifications" multiple required>
                            <?php
                            $skills = $helpers->select_all("skills_list");
                            if (count($skills) > 0) :
                              $qualifications = json_decode($job->qualifications, true);
                              foreach ($skills as $skill) :
                                $selectedQualifications = in_array($skill->id, $qualifications) ? "selected" : "";
                            ?>
                                <option value="<?= $skill->id ?>" <?= $selectedQualifications ?>>
                                  <?= $skill->name ?>
                                </option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="description" class="form-label">Job Description</label>
                          <textarea name="description" id="description" class="form-control" cols="30" rows="10" required><?= nl2br($job->description) ?></textarea>
                        </div>

                        <div class="text-end">
                          <button type="submit" class="btn btn-primary me-2">Update</button>
                          <button type="button" class="btn btn-danger me-2" onclick="window.history.back()">Cancel</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
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

<script>
  $('#qualifications').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
    tags: true
  });

  $('#schedule').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
  });

  $('#benefits').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
  });

  $("#update-job").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=update_job" ?>",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        const resp = $.parseJSON(data)
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => resp.success ? window.location.href = `<?= SERVER_NAME . "/views/jobs" ?>` : undefined)
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

</html>