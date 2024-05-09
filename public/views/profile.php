<?php include("../../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
$LOGIN_USER = null;
if (isset($_SESSION["id"])) {
  $LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
} else {
  header("Location: ./home");
}
?>
<!doctype html>
<html lang="en">

<?= head("Job Portal") ?>
<style>
  .button-wrapper {
    margin-left: 20px;
  }
</style>

<body id="top">

  <?= loadingEl() ?>

  <div class="site-wrap">
    <?php include("../components/navbar.php") ?>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');height: 20vh !important" id="home-section">
      <div class="container">
        <div class="row pt-0">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">My Profile</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section pt-0" id="next-section">
      <div class="container">

        <ul class="nav nav-pills container-xl mt-4" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="account-details-tab" data-toggle="tab" href="#account-details" type="button" role="tab" aria-controls="account-details" aria-selected="false">
              Account Details
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="job-preference-tab" data-toggle="tab" href="#job-preference" type="button" role="tab" aria-controls="job-preference" aria-selected="false">
              Job Preference
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" type="button" role="tab" aria-controls="education" aria-selected="false">
              Education
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="work-exp-tab" data-toggle="tab" href="#work-exp" type="button" role="tab" aria-controls="work-exp" aria-selected="false">
              Work Experience
            </a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" type="button" role="tab" aria-controls="skills" aria-selected="false">
              Skills
            </a>
          </li>
          <?php if (!isset($_GET["id"])) : ?>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="change-pass-tab" data-toggle="tab" href="#change-pass" type="button" role="tab" aria-controls="change-pass" aria-selected="false">
                Change Password
              </a>
            </li>
          <?php endif; ?>
        </ul>
        <hr>

        <div class="tab-content mt-4" id="myTabContent">

          <div class="tab-pane fade show active" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
            <div class="card mb-4">
              <h5 class="card-header">Profile Details</h5>

              <!-- Account -->
              <?= $helpers->generate_avatar(true, $helpers->get_avatar_link($LOGIN_USER->id), $LOGIN_USER->id, false); ?>

              <div class="card-body p-4">
                <form id="form-update-profile" method="POST">
                  <input type="text" name="id" value="<?= $LOGIN_USER->id ?>" readonly hidden>
                  <div class="row">
                    <div class="form-group mb-3 col-md-6">
                      <label for="fname" class="form-label">First Name</label>
                      <input class="form-control" type="text" id="fname" name="fname" value="<?= $LOGIN_USER->fname ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="mname" class="form-label">Middle Name</label>
                      <input class="form-control" type="text" name="mname" id="mname" value="<?= $LOGIN_USER->mname ?>" />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="lname" class="form-label">Last Name</label>
                      <input class="form-control" type="text" name="lname" id="lname" value="<?= $LOGIN_USER->lname ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="contact" class="form-label">Contact</label>
                      <input class="form-control" type="text" name="contact" id="contact" value="<?= $LOGIN_USER->contact ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="email" class="form-label">E-mail</label>
                      <input class="form-control" type="text" id="email" name="email" value="<?= $LOGIN_USER->email ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="address" class="form-label">Address</label>
                      <input class="form-control" type="text" id="address" name="address" value="<?= $LOGIN_USER->address ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="district" class="form-label">District</label>

                      <select class="form-control" name="district" id="district" required>
                        <option value="">-- select district --</option>
                        <?php foreach ($helpers->districtList as $district) : ?>
                          <option value="<?= $district ?>" <?= $helpers->is_selected($district, $LOGIN_USER->district) ?>><?= $district ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="w-100 d-flex justify-content-end px-3">
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2 float-end">Save changes</button>
                      </div>
                    </div>

                  </div>
                </form>
              </div>

              <?php include("../components/ratings.php"); ?>
            </div>
          </div>

          <div class="tab-pane fade" id="job-preference" role="tabpanel" aria-labelledby="job-preference-tab">
            <div class="row d-flex justify-content-center">
              <div class="col-md-6">
                <div class="card mb-4">
                  <?php $job_preference = $helpers->select_all_individual("job_preference", " user_id='$LOGIN_USER->id'"); ?>
                  <div class="card-header position-relative">
                    <h5 class="card-title text-dark">Job Preference</h5>
                    <?php if ($job_preference) : ?>
                      <div class="position-absolute m-2" style="top:0; right:0;">
                        <a href="<?= SERVER_NAME . "/views/job-preference?t=" . $helpers->encrypt($LOGIN_USER->id) ?>" class="btn btn-default btn-sm p-0">
                          <i class='bx bxs-edit h4'></i>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="card-body">
                    <?php if ($job_preference) : ?>
                      <?php include("../../components/form-job-preference.php") ?>
                    <?php else : ?>
                      <h3>
                        No job preference yet
                        <a href="<?= SERVER_NAME . "/views/job-preference?t=" . $helpers->encrypt($LOGIN_USER->id) ?>" class="btn btn-primary btn-sm ml-2">Add here</a>
                      </h3>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <?php
                $educations = $helpers->select_all_with_params("education", "user_id='$LOGIN_USER->id'");

                if (count($educations) > 0) :
                  foreach ($educations as $education) :
                    $education_attainment = $helpers->select_all_individual("educational_attainment", "id='$education->attainment_id'");
                ?>
                    <div class="card mb-3">
                      <div class="card-header position-relative">
                        <h5 class="text-dark">
                          <?php
                          echo $education_attainment->name;
                          if ($education->course) {
                            echo "in $education->course";
                          }
                          ?>
                        </h5>
                        <div class="position-absolute m-2" style="top:0; right:0;">
                          <a href="<?= SERVER_NAME . "/views/edit-education?t=" . $helpers->encrypt($LOGIN_USER->id) . "&&id=$education->id" ?>" class="btn btn-default btn-sm p-0">
                            <i class='bx bxs-edit h4'></i>
                          </a>
                          <?php if (count($educations) > 1) : ?>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm p-0" onclick="handleRemoveEducation(`<?= $education->id ?>`)">
                              <i class='bx bxs-trash h4'></i>
                            </a>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="card-body">
                        <p class=" text-dark">
                          <?= "School: " . $education->school_name ?> <br>
                          <?= "SY: " . $education->sy ?>
                        </p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="work-exp" role="tabpanel" aria-labelledby="work-exp-tab">
            <div class="row d-flex justify-content-center">
              <div class="col-md-7">
                <?php
                $work_experience = $helpers->select_all_with_params("work_experience", "user_id='$LOGIN_USER->id'");

                if (count($work_experience) > 0) :
                  foreach ($work_experience as $exp) :
                    $companyData = $helpers->select_all_individual("company", "id='$exp->company_id'");
                    $industryData = $helpers->select_all_individual("industries", "id='$exp->industry_id'");
                ?>
                    <div class="card mb-3">
                      <div class="card-header position-relative">
                        <h5 class="text-dark"><?= $exp->job_title ?></h5>
                        <div class="position-absolute m-2" style="top:0; right:0;">
                          <a href="<?= SERVER_NAME . "/views/edit-work-experience?t=" . $helpers->encrypt($LOGIN_USER->id) . "&&id=$exp->id" ?>" class="btn btn-default btn-sm p-0">
                            <i class='bx bxs-edit h4'></i>
                          </a>

                          <?php if (count($work_experience) > 1) : ?>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm p-0" onclick="handleWorkExperienceDelete(`<?= $exp->id ?>`)">
                              <i class='bx bxs-trash h4'></i>
                            </a>
                          <?php endif; ?>

                        </div>
                      </div>
                      <div class="card-body">
                        <p class=" text-dark">
                          <?= $companyData->name ?> <br>
                          <?= $industryData->name ?> <br>
                          <?= $exp->work_from ?> to <?= $exp->work_to ?>
                        </p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <h3>
                    No Work Experience
                    <a href="<?= SERVER_NAME . "/views/work-experience?t=" . $helpers->encrypt($LOGIN_USER->id) . "&&from=profile" ?>" class="btn btn-primary btn-sm ml-2">Add here</a>
                  </h3>

                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
            <div class="row d-flex justify-content-center">
              <div class="col-md-7">
                <div class="card">
                  <div class="card-body">

                    <div class="text-center">
                      <h4 class="mb-2">Skills Added</h4>
                    </div>

                    <?php
                    $applicant_skills = $helpers->select_all_with_params("applicant_skills", "user_id='$LOGIN_USER->id'");

                    $skillsIds = array();

                    if (count($applicant_skills) > 0) :
                      foreach ($applicant_skills as $skill) :
                        $skillData = $helpers->select_all_individual("skills_list", "id='$skill->skill_id'");
                        array_push($skillsIds, $skill->skill_id);

                    ?>
                        <div class="card mb-3">
                          <div class="card-body py-2">
                            <span class="m-0" style="color: #697a8d">
                              <?= $skillData->name ?>
                            </span>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm p-0" style="float:right" onclick="handleRemoveSkills(`<?= $skill->id ?>`)">
                              <i class='bx bxs-trash h4'></i>
                            </a>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <div class="card">
                        <div class="card-body">
                          Your skills will appear here
                        </div>
                      </div>
                    <?php endif; ?>
                    <hr>
                    <form id="form-add-work-experience" class="mb-3" method="POST">
                      <input type="text" name="token" value="<?= $helpers->encrypt($LOGIN_USER->id) ?>" hidden readonly>
                      <input type="text" name="skill_id" hidden readonly>

                      <div class="mb-3 form-group ">
                        <label class="form-label">Skills</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="skill">
                          <button class="btn btn-primary" type="button" onclick="btnAddSkill(`<?= $helpers->encrypt($LOGIN_USER->id) ?>`)">Add</button>
                        </div>
                      </div>
                      <?php
                      $params = count($skillsIds) > 0 ? "NOT IN(" . (implode(', ', $skillsIds)) . ")"  : "IS NOT NULL";
                      $skills_list = $helpers->select_all_with_params("skills_list", "id $params ORDER BY RAND() LIMIT 7");
                      if (count($skills_list) > 0) :
                      ?>
                        <h6> Do you want to add any of these skills? </h6>
                        <ul class="list-group">
                          <?php foreach ($skills_list as $skill) : ?>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="handleAddSkill(`<?= $skill->id ?>`, `<?= $helpers->encrypt($LOGIN_USER->id) ?>`)">
                              <p class="m-0">
                                <i class="bx bx-plus mx-2"></i>
                                <span class="align-middle mx-1"><?= $skill->name ?></span>
                              </p>
                              <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                            </a>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif; ?>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="change-pass" role="tabpanel" aria-labelledby="change-pass-tab">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <div class="card">
                  <h5 class="card-header">Change Password</h5>
                  <div class="card-body">

                    <form id="form-change-password" method="POST">
                      <input type="text" name="id" value="<?= $LOGIN_USER->id ?>" readonly hidden>

                      <div class="form-group form-password-toggle">
                        <label for="address" class="form-label">Current Password</label>
                        <input type="password" id="current_password" class="form-control" name="current_password" aria-describedby="current_password" required />
                      </div>

                      <div class="form-group form-password-toggle">
                        <label for="address" class="form-label">New Password</label>
                        <input type="password" id="new_password" class="form-control" name="new_password" aria-describedby="new_password" required />
                      </div>

                      <div class="form-group form-password-toggle">
                        <label for="address" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" name="confirm_password" aria-describedby="confirm_password" required />
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="show_password">
                        <label class="form-check-label">
                          Show Password
                        </label>
                      </div>

                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">
                          Submit
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- SCRIPTS -->
  <?php include("../components/footer.php") ?>
  <script>
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      sessionStorage.setItem('lastTab', $(this).attr('href'));
    });
    let lastTab = sessionStorage.getItem('lastTab');
    if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
    }

    function handleRemoveEducation(id) {
      const postData = {
        table: "education",
        column: "id",
        val: id,
      }

      swal.showLoading();
      handleDelete("<?= SERVER_NAME . "/backend/nodes?action=delete_data" ?>", undefined, postData);
    }

    function handleAddSkill(skillId, token) {
      let formData = new FormData();
      formData.append("skill_id", skillId)
      formData.append("token", token)

      saveSkills(formData);
    }

    function btnAddSkill(token) {
      let formData = new FormData();
      formData.append("token", token)
      formData.append("skill_name", $("input[name='skill']").val())

      saveSkills(formData);
    }

    function saveSkills(formData) {
      swal.showLoading()

      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=add_skills" ?>",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          const resp = $.parseJSON(data)

          if (!resp.success) {
            swal.fire({
              title: "Error",
              html: resp.message,
              icon: "error",
            })
          } else {
            window.location.reload()
          }

        },
        error: function(data) {
          swal.fire({
            title: 'Oops...',
            text: 'Something went wrong.',
            icon: 'error',
          })
        }
      });
    }

    const handleRemoveSkills = (id) => {
      const postData = {
        table: "applicant_skills",
        column: "id",
        val: id,
      }

      handleDeleteNoConfirm("<?= SERVER_NAME . "/backend/nodes?action=delete_data" ?>", postData);
    }

    $("input[name='skill']").on("input", function() {
      $("input[name='skill_id']").val("");
    })

    $("input[name='skill']").autocomplete({
      paramName: 's',
      dataType: 'JSON',
      serviceUrl: '<?= SERVER_NAME . "/backend/nodes?action=get_all_skills" ?>',
      transformResult: function(response) {
        return {
          suggestions: response.map((dataItem, index) => {
            return {
              value: dataItem.name,
              id: dataItem.id,
            }
          })
        };
      },
      onSelect: function(suggestion) {
        $("input[name='skill_id']").val(suggestion.id)
        $("input[name='skill']").val(suggestion.value)
      },
    });

    $("#form-change-password").on("submit", function(e) {
      e.preventDefault();

      const current_password = $("#current_password").val();
      const new_password = $("#new_password").val();
      const confirm_password = $("#confirm_password").val();

      if (current_password && new_password && confirm_password) {
        if (current_password.toLowerCase() === new_password.toLowerCase()) {
          swal.fire({
            title: "Error",
            html: "Current password and New password should not match!",
            icon: "error",
          });
        } else if (new_password.toLowerCase() === confirm_password.toLowerCase()) {
          swal.showLoading();

          $.ajax({
            url: "<?= SERVER_NAME . "/backend/nodes?action=change_password" ?>",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
              const resp = $.parseJSON(data);
              swal.fire({
                title: resp.success ? "" : "",
                html: resp.message,
                icon: resp.success ? "success" : "error"
              }).then((e) => resp.success ? window.location.reload() : undefined)
            },
            error: function(data) {
              swal.fire({
                title: "Oops...",
                html: "Something went wrong.",
                icon: "error",
              });
            },
          });
        } else {
          swal.fire({
            title: "Error",
            html: "New password and Confirm password not match",
            icon: "error",
          });
        }
      } else {
        swal.fire({
          title: "Error",
          html: "All fields are required",
          icon: "error",
        });
      }
    })

    $("#show_password").on("click", function(e) {
      if ($(this).is(":checked")) {
        $("#current_password").prop("type", "text")
        $("#new_password").prop("type", "text")
        $("#confirm_password").prop("type", "text")
      } else {
        $("#current_password").prop("type", "password")
        $("#new_password").prop("type", "password")
        $("#confirm_password").prop("type", "password")
      }
    })

    $("#form-update-profile").on("submit", function(e) {
      e.preventDefault()
      swal.showLoading()

      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=profile_save" ?>",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          const resp = $.parseJSON(data);
          swal.fire({
            title: resp.success ? "" : "",
            html: resp.message,
            icon: resp.success ? "success" : "error"
          }).then((e) => resp.success ? window.location.reload() : undefined)
        },
        error: function(data) {
          swal.fire({
            title: "Oops...",
            html: "Something went wrong.",
            icon: "error",
          });
        },
      });
    })
  </script>
</body>

</html>