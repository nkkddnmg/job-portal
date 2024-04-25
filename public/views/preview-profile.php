<?php include("../../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php

$user = $helpers->get_user_by_id($_GET["id"]);
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

    <section class="site-section pt-0" id="next-section">
      <div class="container-fluid">

        <ul class="nav nav-pills container-xl mt-4" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="account-details-tab" data-toggle="tab" href="#account-details" type="button" role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" type="button" role="tab" aria-controls="education" aria-selected="false">Education</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="work-exp-tab" data-toggle="tab" href="#work-exp" type="button" role="tab" aria-controls="work-exp" aria-selected="false">Work Experience</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" type="button" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
          </li>
        </ul>
        <hr>

        <div class="tab-content mt-4" id="myTabContent">

          <div class="tab-pane fade show active" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
            <div class="card mb-4">
              <h5 class="card-header">Profile Details</h5>

              <!-- Account -->
              <?= $helpers->generate_avatar(false, $helpers->get_avatar_link($user->id), $user->id, false); ?>

              <div class="card-body p-4">
                <form id="form-update-profile" method="POST">
                  <input type="text" name="id" value="<?= $user->id ?>" readonly hidden>
                  <div class="row">
                    <div class="form-group mb-3 col-md-6">
                      <label for="fname" class="form-label">First Name</label>
                      <input class="form-control" type="text" id="fname" name="fname" value="<?= $user->fname ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="mname" class="form-label">Middle Name</label>
                      <input class="form-control" type="text" name="mname" id="mname" value="<?= $user->mname ?>" />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="lname" class="form-label">Last Name</label>
                      <input class="form-control" type="text" name="lname" id="lname" value="<?= $user->lname ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="contact" class="form-label">Contact</label>
                      <input class="form-control" type="text" name="contact" id="contact" value="<?= $user->contact ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="email" class="form-label">E-mail</label>
                      <input class="form-control" type="text" id="email" name="email" value="<?= $user->email ?>" required />
                    </div>
                    <div class="form-group mb-3 col-md-6">
                      <label for="address" class="form-label">Address</label>

                      <select class="form-control" name="address" id="address" required>
                        <option value="">-- select address --</option>
                        <?php foreach ($helpers->addressList as $add) : ?>
                          <option value="<?= $add ?>" <?= $helpers->is_selected($add, $user->address) ?>><?= $add ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /Account -->
            </div>
          </div>

          <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <?php
                $educations = $helpers->select_all_with_params("education", "user_id='$user->id'");

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
                            echo " in $education->course";
                          }
                          ?>
                        </h5>
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
                $work_experience = $helpers->select_all_with_params("work_experience", "user_id='$user->id'");

                if (count($work_experience) > 0) :
                  foreach ($work_experience as $exp) :
                    $companyData = $helpers->select_all_individual("company", "id='$exp->company_id'");
                ?>
                    <div class="card mb-3">
                      <div class="card-header position-relative">
                        <h5 class="text-dark"><?= $exp->job_title ?></h5>
                      </div>
                      <div class="card-body">
                        <p class=" text-dark">
                          <?= $companyData->name ?> <br>
                          <?= $exp->work_from ?> to <?= $exp->work_to ?>
                        </p>
                      </div>
                    </div>
                  <?php endforeach; ?>
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
                      <h4 class="mb-2">Skills</h4>
                    </div>

                    <?php
                    $applicant_skills = $helpers->select_all_with_params("applicant_skills", "user_id='$user->id'");

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
                          </div>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
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
</body>
<script>
  $(".site-footer").hide()
</script>

</html>