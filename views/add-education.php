<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<?= head("Education") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">

            <div class="text-center">
              <h4 class="mb-2">Add Education</h4>
            </div>

            <?php
            $id = $helpers->decrypt($_GET['t']);
            $educations = $helpers->select_all_with_params("education", "user_id='$id'");

            if (count($educations) > 0) :
              foreach ($educations as $education) :
                $education_attainment = $helpers->select_all_individual("educational_attainment", "id='$education->attainment_id'");
            ?>
                <div class="card mb-3">
                  <div class="card-header position-relative">
                    <h5>
                      <?php
                      echo $education_attainment->name;
                      if ($education->course) {
                        echo " in $education->course";
                      }
                      ?>
                    </h5>
                    <div class="position-absolute m-2" style="top:0; right:0;">
                      <a href="<?= SERVER_NAME . "/views/edit-education?t=$_GET[t]&&id=$education->id" ?>" class="btn btn-default btn-sm p-0">
                        <i class='bx bxs-edit h4'></i>
                      </a>
                      <a href="javascript:void(0)" class="btn btn-default btn-sm p-0" onclick="handleRemoveEducation(`<?= $education->id ?>`)">
                        <i class='bx bxs-trash h4'></i>
                      </a>
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

            <form id="form-add-education" class="mb-3" method="POST">
              <input type="text" name="token" value="<?= $_GET['t'] ?>" hidden readonly>
              <div class="mb-3 form-group">
                <label for="attainment" class="form-label">Educational Attainment</label>
                <select name="attainment" class="form-select" id="attainment" required>
                  <option value="" selected disabled></option>
                  <?php
                  $attainments = $helpers->select_all("educational_attainment");
                  foreach ($attainments as $attainment) :
                  ?>
                    <option value="<?= $attainment->id ?>"><?= $attainment->name ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
              <div class="mb-3 form-group d-none" id="divCourse">
                <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="course" name="course" />
              </div>
              <div class="mb-3 form-group">
                <label for="schoolName" class="form-label">School name</label>
                <input type="text" class="form-control" id="schoolName" name="school_name" required />
              </div>
              <div class="mb-3 form-group">
                <label for="schoolYear" class="form-label">
                  School Year
                  <small class="text-muted"> ex. <?= date("y", strtotime("-1 year")) . date("y") ?>
                  </small>
                </label>
                <input type="text" class="form-control" id="schoolYear" name="school_year" maxlength="4" required />
              </div>

              <div class="row">
                <div class="col-md-6 mt-2">
                  <button class="btn btn-primary d-grid w-100" type="submit">
                    Submit
                  </button>
                </div>
                <div class="col-md-6 mt-2">
                  <button type="button" class="btn btn-danger d-grid w-100" onclick="handleCancel()">
                    Cancel
                  </button>
                </div>

                <?php if (count($educations) > 0) : ?>
                  <div class="col-md-12 mt-2">
                    <a href="<?= SERVER_NAME . "/views/work-experience?t=$_GET[t]" ?>" class="btn btn-secondary d-grid w-100">
                      Next
                    </a>
                  </div>
                <?php endif; ?>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<?php include("../components/footer.php") ?>

<script>
  const handleCancel = () => window.location.href = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

  function handleRemoveEducation(id) {
    const postData = {
      table: "education",
      column: "id",
      val: id,
    }

    swal.showLoading();
    handleDelete("<?= SERVER_NAME . "/backend/nodes?action=delete_data" ?>", undefined, postData);
  }

  $("#attainment").on("change", function(e) {
    const selectedOptionValue = $(this).children(':selected').attr('selected', true).text();

    if (selectedOptionValue.toLowerCase().includes("high school")) {
      $("#course").prop("required", false);
      $("#divCourse").addClass("d-none").removeClass("d-block");

    } else {
      $("#course").prop("required", true);
      $("#divCourse").removeClass("d-none").addClass("d-block");
    }
  })

  $("#form-add-education").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_education" ?>",
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
        }).then(() => {
          if (resp.success) {
            window.location.reload();
          }
        })
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