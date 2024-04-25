<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<?= head("Work Experience") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">

            <div class="text-center">
              <h4 class="mb-2">Edit Education</h4>
            </div>

            <?php
            $education = $helpers->select_all_individual("education", "id='$_GET[id]'");
            ?>
            <form id="form-edit-education" class="mb-3" method="POST">
              <input type="text" name="token" value="<?= $_GET['t'] ?>" hidden readonly>
              <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden readonly>

              <div class="mb-3 form-group">
                <label for="attainment" class="form-label">Educational Attainment</label>
                <select name="attainment" class="form-select" id="attainment" required>
                  <option value="" selected disabled></option>
                  <?php
                  $attainments = $helpers->select_all("educational_attainment");
                  foreach ($attainments as $attainment) :
                  ?>
                    <option value="<?= $attainment->id ?>" <?= $helpers->is_selected($attainment->id, $education->attainment_id) ?>><?= $attainment->name ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
              <div class="mb-3 form-group <?= empty($education->course) ? "d-none" : "d-block" ?>" id="divCourse">
                <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="course" name="course" value="<?= $education->course ?>" />
              </div>
              <div class="mb-3 form-group">
                <label for="schoolName" class="form-label">School name</label>
                <input type="text" class="form-control" id="schoolName" name="school_name" value="<?= $education->school_name ?>" required />
              </div>
              <div class="mb-3 form-group">
                <label for="schoolYear" class="form-label">
                  School Year
                  <small class="text-muted"> ex. <?= date("y", strtotime("-1 year")) . date("y") ?>
                  </small>
                </label>
                <input type="text" class="form-control" id="schoolYear" name="school_year" value="<?= $education->sy ?>" maxlength="4" required />
              </div>

              <div class="row">
                <div class="col-md-6 mt-2">
                  <button class="btn btn-primary d-grid w-100" type="submit">
                    Update
                  </button>
                </div>
                <div class="col-md-6 mt-2">
                  <button type="button" class="btn btn-secondary d-grid w-100" onclick="window.history.back()">
                    Cancel
                  </button>
                </div>
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
  $("#attainment").on("change", function(e) {
    const selectedOptionValue = $(this).children(':selected').attr('selected', true).text();

    if (selectedOptionValue.toLowerCase().includes("high school")) {
      $("#course").prop("required", false);
      $("#divCourse").addClass("d-none").removeClass("d-block");

      $("#course").val("")
    } else {
      $("#course").prop("required", true);
      $("#divCourse").removeClass("d-none").addClass("d-block");
    }
  })

  $("#form-edit-education").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=edit_education" ?>",
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
            window.history.back()
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