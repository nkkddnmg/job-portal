<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Add Job";
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
                      <form id="add-job" method="POST">
                        <input type="text" name="company_id" value="<?= $LOGIN_USER->company_id ?>" hidden readonly>

                        <div class="mb-3 form-group">
                          <label for="title" class="form-label">Job Title</label>
                          <input type="text" class="form-control" id="title" name="title" required />
                        </div>

                        <div class="mb-3 form-group">
                          <label for="job_type" class="form-label">Job Type</label>
                          <select class="form-select" name="job_type" id="job_type" required>
                            <option value=""></option>
                            <option value="Full time">Full time</option>
                            <option value="Part time">Part time</option>
                            <option value="Contract">Contract</option>
                            <option value="Temporary">Temporary</option>
                            <option value="Permanent">Permanent</option>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="experience_level" class="form-label">Experience level</label>
                          <select class="form-select" name="experience_level" id="experience_level" required>
                            <option value="" selected disabled></option>
                            <option value="No experience needed">No Experience needed</option>
                            <option value="Under 1 year">Under 1 year</option>
                            <option value="1 year">1 year</option>
                            <option value="2 years">2 years</option>
                            <option value="3 years">3 years</option>
                            <option value="4 years">4 years</option>
                            <option value="5 years">5 years</option>
                            <option value="6 years">6 years</option>
                            <option value="7 years">7 years</option>
                            <option value="8 years">8 years</option>
                            <option value="9 years">9 years</option>
                            <option value="10 years">10 years</option>
                            <option value="11+ years">11+ years</option>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="location_type" class="form-label">Location Type</label>
                          <select name="location_type" id="location_type" class="form-select" required>
                            <option value="" selected disabled></option>
                            <option value="On Site">On Site</option>
                            <option value="Remote (WFH)">Remote (WFH)</option>
                            <option value="Hybrid">Hybrid</option>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="schedule" class="form-label">Schedule</label>
                          <select class="form-select" name="schedule[]" id="schedule" multiple required>
                            <option value="4 hour shift">4 hour shift</option>
                            <option value="8 hour shift">8 hour shift</option>
                            <option value="10 hour shift">10 hour shift</option>
                            <option value="12 hour shift">12 hour shift</option>
                            <option value="Monday to Friday">Monday to Friday</option>
                            <option value="Day shift">Day shift</option>
                            <option value="Night shift">Night shift</option>
                            <option value="No Nights">No Nights</option>
                            <option value="Weekends only">Weekends only</option>
                            <option value="On Call">On Call</option>
                            <option value="No Weekends">No Weekends</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="title" class="form-label">Pay <span class="text-danger">*</span></label>

                          <div class="row">
                            <div class="col-md-4 col-sm-6">
                              <label class="form-label">Minimum</label>
                              <input type="text" name="min" id="min" class="form-control" required>
                            </div>

                            <div class="col-md-4 col-sm-6">
                              <label class="form-label">Maximum</label>
                              <input type="text" name="max" id="max" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-sm-12">
                              <label class="form-label">Range</label>
                              <select class="form-select" name="range" id="range" required>
                                <option value="" selected disabled></option>
                                <option value="per hour">per hour</option>
                                <option value="per day">per day</option>
                                <option value="per week">per week</option>
                                <option value="per month">per month</option>
                                <option value="per year">per year</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="benefits" class="form-label">Benefits</label>
                          <select class="form-select" name="benefits[]" id="benefits" multiple required>
                            <option value="Health insurance">Health insurance</option>
                            <option value="Paid time off">Paid time off</option>
                            <option value="Dental insurance">Dental insurance</option>
                            <option value="Vision insurance">Vision insurance</option>
                            <option value="Flexible schedule">Flexible schedule</option>
                            <option value="Life insurance">Life insurance</option>
                            <option value="Retirement plan">Retirement plan</option>
                            <option value="Referral program">Referral program</option>
                            <option value="Employee discount">Employee discount</option>
                            <option value="Health saving account">Health saving account</option>
                            <option value="Relocation assistance">Relocation assistance</option>
                            <option value="Professional development assistance">Professional development assistance</option>
                            <option value="Employee assistance program">Employee assistance program</option>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="qualifications" class="form-label">Qualifications</label>
                          <select class="form-select" name="qualifications[]" id="qualifications" multiple required>
                            <?php
                            $skills = $helpers->select_all("skills_list");
                            if (count($skills) > 0) :
                              foreach ($skills as $skill) :
                            ?>
                                <option value="<?= $skill->id ?>"><?= $skill->name ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="experience" class="form-label">Experience</label>
                          <select class="form-select" name="experience[]" id="experience" multiple required>
                            <option value="No Experience Needed">No Experience Needed</option>
                            <?php
                            $experience_lists = $helpers->select_all_with_params("experience_list", "name <> 'No Experience Needed'");
                            if (count($experience_lists) > 0) :
                              foreach ($experience_lists as $experience) :
                            ?>
                                <option value="<?= $experience->id ?>"><?= $experience->name ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="industry" class="form-label">Job Industry</label>
                          <select class="form-select" name="industry[]" id="industry" multiple required>
                            <?php
                            $industry_list = $helpers->select_all_with_params("industries", "name <> ''");
                            if (count($industry_list) > 0) :
                              foreach ($industry_list as $industry) :
                            ?>
                                <option value="<?= $industry->id ?>"><?= $industry->name ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>

                        <div class="mb-3 form-group">
                          <label for="description" class="form-label">Job Description</label>
                          <textarea name="description" id="description" class="form-control" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="text-end">
                          <button type="submit" class="btn btn-primary me-2">Submit</button>
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
  $('#experience, #industry, #qualifications, #schedule, #benefits').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: true,
    tags: true
  });

  $("#add-job").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_job" ?>",
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