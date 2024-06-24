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
              <h4 class="mb-2">Work Experience</h4>
            </div>

            <?php
            $id = $helpers->decrypt($_GET['t']);
            $work_experience = $helpers->select_all_with_params("work_experience", "user_id='$id'");

            if (count($work_experience) > 0) :
              foreach ($work_experience as $exp) :
                $companyData = $helpers->select_all_individual("company", "id='$exp->company_id'");
                $industryData = $helpers->select_all_individual("industries", "id='$exp->industry_id'");
            ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="card-header p-0 position-relative">
                      <h5><?= $exp->job_title ?></h5>
                      <div class="position-absolute top-0 end-0">
                        <a href="edit-work-experience?t=<?= $_GET['t'] ?>&&id=<?= $exp->id ?>" class="btn btn-default btn-sm p-0">
                          <i class='bx bxs-edit h4'></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-default btn-sm p-0" onclick="handleWorkExperienceDelete(`<?= $exp->id ?>`)">
                          <i class='bx bxs-trash h4'></i>
                        </a>
                      </div>
                    </div>
                    <p class=" text-muted">
                      <?= $companyData->name ?> <br>
                      <?= $industryData->name ?>
                      <?= $exp->work_from ?> to <?= $exp->work_to ?>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>


            <form id="form-add-work-experience" class="mb-3" method="POST">

              <input type="text" name="token" value="<?= $_GET['t'] ?>" hidden readonly>

              <div class="mb-3 form-group ">
                <label class="form-label">Job Title</label>
                <input type="text" class="form-control" name="job_title" required />
              </div>

              <input type="text" name="company_id" hidden readonly>

              <div class="mb-3 form-group">
                <label for="companyName" class="form-label">Company name</label>
                <input class="form-control" type="text" id="companyName" name="company_name" required>
              </div>

              <div class="mb-3 form-group">
                <label for="industry" class="form-label">Industry</label>
                <select name="industry_id" class="form-select" required>
                  <option value="" selected disabled>--</option>
                  <?php
                  $industries = $helpers->select_all("industries");
                  foreach ($industries as $industry) :
                  ?>
                    <option value="<?= $industry->id ?>">
                      <?= $industry->name ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="currently_working" value="Present" id="checkboxCurrentlyWork">
                <label class="form-check-label" for="checkboxCurrentlyWork">
                  I Currently work here
                </label>
              </div>

              <div class="mb-3">
                <label for="schoolName" class="form-label">
                  Work From
                  <span class="text-danger">*</span>
                </label>

                <div class="row">
                  <div class="col-md-6">
                    <select name="work_from_month" class="form-select" required>
                      <option value="" selected disabled></option>
                      <?php
                      for ($month = 1; $month <= 12; $month++) :
                        $monthName = date("F", mktime(0, 0, 0, $month, 1));
                      ?>
                        <option value='<?= $monthName ?>'><?= $monthName ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select name="work_from_year" class="form-select" required>
                      <option value="" selected disabled></option>
                      <?php
                      for ($year = date("Y"); $year >= 1960; $year--) :
                      ?>
                        <option value='<?= $year ?>'><?= $year ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="mb-3 d-block" id="divWorkTo">
                <label for="schoolName" class="form-label">
                  Work To
                  <span class="text-danger">*</span>
                </label>

                <div class="row">
                  <div class="col-md-6">
                    <select name="work_to_month" class="form-select" required>
                      <option value="" selected disabled></option>
                      <?php
                      for ($month = 1; $month <= 12; $month++) :
                        $monthName = date("F", mktime(0, 0, 0, $month, 1));
                      ?>
                        <option value='<?= $monthName ?>'><?= $monthName ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select name="work_to_year" class="form-select" required>
                      <option value="" selected disabled></option>
                      <?php
                      for ($year = date("Y"); $year >= 1960; $year--) :
                      ?>
                        <option value='<?= $year ?>'><?= $year ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
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

                <?php if (!isset($_GET["ref"])) : ?>
                  <div class="col-md-12 mt-2">
                    <a href="<?= isset($_GET["from"]) ? (SERVER_NAME . "/public/views/profile") : (SERVER_NAME . "/views/add-skills?t=$_GET[t]") ?>" class="btn btn-secondary d-grid w-100">
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
  const handleCancel = () => {
    const searchParams = new URLSearchParams(window.location.search);

    let location = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

    if (searchParams.has("ref")) {
      location = searchParams.get("ref")
    }
    
    window.location.href = location
  };

  const handleWorkExperienceDelete = (id) => {
    const postData = {
      table: "work_experience",
      column: "id",
      val: id,
    }

    const confirmOptions = {
      title: "Are you sure you want to delete this work experience?",
      text: undefined,
      buttonText: "Delete",
      buttonColor: "#dc3545",
    }

    swal.showLoading();
    handleDelete("<?= SERVER_NAME . "/backend/nodes?action=delete_data" ?>", confirmOptions, postData);
  }

  $("#checkboxCurrentlyWork").on("click", function() {
    if ($(this).is(":checked")) {
      $("#divWorkTo").addClass("d-none").removeClass("d-block")

      $("select[name='work_to_month']").prop("required", false)
      $("select[name='work_to_year']").prop("required", false)
    } else {
      $("#divWorkTo").addClass("d-block").removeClass("d-none")

      $("select[name='work_to_month']").prop("required", true)
      $("select[name='work_to_year']").prop("required", true)
    }
  });

  $("#companyName").on("input", function() {
    $("input[name='company_id']").val("");
  })

  $('#companyName').autocomplete({
    paramName: 's',
    dataType: 'JSON',
    formatResult: function(suggestion) {
      return `
        <li class="list-group-item d-flex justify-content-between align-items-center border-0">
          ${suggestion.value}
          <div class="image-parent">
              <img src="${suggestion.data.company_logo}" class="img-thumbnail rounded autocomplete-img" />
          </div>
        </li>
      `;
    },
    transformResult: function(response) {
      return {
        suggestions: response.map((dataItem, index) => {
          return {
            value: dataItem.name,
            data: dataItem,
          }
        })
      };
    },
    serviceUrl: '<?= SERVER_NAME . "/backend/nodes?action=get_all_companies" ?>',
    onSelect: function(suggestion) {
      $("input[name='company_id']").val(suggestion.data.id)
      $("#companyName").val(suggestion.data.name)
    },
  });

  $("#form-add-work-experience").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=add_work_experience" ?>",
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
        }).then(() => resp.success ? window.location.reload() : undefined)
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