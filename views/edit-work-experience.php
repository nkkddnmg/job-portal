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
              <h4 class="mb-2">Edit Work Experience</h4>
            </div>

            <?php
            $id = $_GET['id'];
            $work_experience = $helpers->select_all_individual("work_experience", "id='$id'");
            $companyData = $helpers->select_all_individual("company", "id='$work_experience->company_id'");

            $isCurrentlyWork = $work_experience->work_to == "Present" ? true : false;
            ?>
            <form id="form-edit-work-experience" class="mb-3" method="POST">

              <input type="text" name="token" value="<?= $_GET['t'] ?>" hidden readonly>
              <input type="text" name="company_id" value="<?= $companyData->id ?>" hidden readonly>
              <input type="text" name="work_experience_id" value="<?= $work_experience->id ?>" hidden readonly>

              <div class="mb-3 form-group ">
                <label class="form-label">Job Title</label>
                <input type="text" class="form-control" name="job_title" value="<?= $work_experience->job_title ?>" required />
              </div>

              <div class="mb-3 form-group">
                <label for="companyName" class="form-label">Company name</label>
                <input class="form-control" type="text" id="companyName" name="company_name" value="<?= $companyData->name ?>" required>
              </div>

              <div class="mb-3 form-group">
                <label for="industry" class="form-label">Industry</label>
                <select name="industry_id" class="form-select" required>
                  <option value="" selected disabled>--</option>
                  <?php
                  $industries = $helpers->select_all("industries");
                  foreach ($industries as $industry) :
                  ?>
                    <option value="<?= $industry->id ?>" <?= $helpers->is_selected($industry->id, $work_experience->industry_id) ?>>
                      <?= $industry->name ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="currently_working" value="Present" id="checkboxCurrentlyWork" <?= $isCurrentlyWork ? "checked" : "" ?>>
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
                      $workFrom = explode(" ", $work_experience->work_from);

                      $workFromMonth = $workFrom[0];

                      for ($month = 1; $month <= 12; $month++) :
                        $monthName = date("F", mktime(0, 0, 0, $month, 1));
                      ?>
                        <option value='<?= $monthName ?>' <?= $helpers->is_selected($monthName, $workFromMonth) ?>><?= $monthName ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select name="work_from_year" class="form-select" required>
                      <option value="" selected disabled></option>
                      <?php
                      $workFromYear = $workFrom[1];

                      for ($year = date("Y"); $year >= 1960; $year--) :
                      ?>
                        <option value='<?= $year ?>' <?= $helpers->is_selected($year, $workFromYear) ?>><?= $year ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="mb-3 <?= $isCurrentlyWork ? "d-none" : "d-block" ?> " id="divWorkTo">
                <label for="schoolName" class="form-label">
                  Work To
                  <span class="text-danger">*</span>
                </label>

                <div class="row">
                  <div class="col-md-6">
                    <select name="work_to_month" class="form-select" <?= $isCurrentlyWork ? "" : "required" ?>>
                      <option value="" selected disabled></option>
                      <?php

                      $workToMonth = "";
                      $workToYear = "";

                      if ($work_experience->work_to != "Present") {
                        $workTo = explode(" ", $work_experience->work_to);

                        $workToMonth = $workTo[0];
                        $workToYear = $workTo[1];
                      }

                      for ($month = 1; $month <= 12; $month++) :
                        $monthName = date("F", mktime(0, 0, 0, $month, 1));
                      ?>
                        <option value='<?= $monthName ?>' <?= $helpers->is_selected($workToMonth, $monthName) ?>><?= $monthName ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select name="work_to_year" class="form-select" <?= $isCurrentlyWork ? "" : "required" ?>>
                      <option value="" selected disabled></option>
                      <?php
                      for ($year = date("Y"); $year >= 1960; $year--) :
                      ?>
                        <option value='<?= $year ?>' <?= $helpers->is_selected($year, $workToYear) ?>><?= $year ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
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
  const handleCancel = () => window.location.href = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

  $("#checkboxCurrentlyWork").on("click", function() {
    if ($(this).is(":checked")) {
      $("#divWorkTo").addClass("d-none").removeClass("d-block")

      $("select[name='work_to_month']").prop("required", false)
      $("select[name='work_to_month']").prop("required", false)
    } else {
      $("#divWorkTo").addClass("d-block").removeClass("d-none")

      $("select[name='work_to_month']").prop("required", true)
      $("select[name='work_to_month']").prop("required", true)
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

  $("#form-edit-work-experience").on("submit", function(e) {
    e.preventDefault()
    swal.showLoading()

    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=edit_work_experience" ?>",
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
        }).then(() => resp.success ? window.history.back() : undefined)
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