<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>

<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?= head("Company Details") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y row">
      <div class="col-sm-12 col-md-5 col-5">
        <div class="authentication-inner" style="max-width: 100%;">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">

              <div class="text-center">
                <h4 class="mb-2">Company Details</h4>
              </div>
              <hr>
              <form id="form-company-details" class="mb-3" method="POST" enctype="multipart/form-data">
                <input type="text" name="token" value="<?= $_GET["t"] ?>" hidden readonly>
                <input type="text" name="company_id" hidden readonly>

                <div class="mb-3 form-group">
                  <label for="companyName" class="form-label">Company name</label>
                  <input class="form-control" type="text" id="companyName" name="company_name" required>
                </div>

                <div class="mb-3 form-group">
                  <?= $helpers->generate_image_upload(
                    "divCompanyLogo",
                    "<label class='form-label'>Company Logo </label>",
                    "input_company_logo",
                    "url_company_logo"
                  ) ?>
                </div>

                <div class="mb-3 form-group">
                  <label for="address" class="form-label">Address</label>
                  <select class="form-select" name="address" id="address" required>
                    <option value="">-- select address --</option>
                    <?php foreach ($helpers->districtList as $district) : ?>
                      <option value="<?= $district ?>"><?= $district ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3 form-group">
                  <label for="industry" class="form-label">Industry</label>
                  <select class="form-select" name="industry" id="industry" required>
                    <option value="" selected disabled>Select an option</option>
                    <?php
                    $industries = $helpers->select_all("industries");

                    foreach ($industries as $industry) :
                    ?>
                      <option value="<?= $industry->id ?>"><?= $industry->name ?></option>
                    <?php
                    endforeach;
                    ?>
                  </select>

                </div>

                <div class="mb-3 form-group">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3 form-group">
                  <?= $helpers->generate_image_upload(
                    "divBusinessPermit",
                    "<label class='form-label'>Business Permit  <span class='text-danger'>*</span></label> ",
                    "input_business_permit",
                    "url_business_permit"
                  ) ?>
                </div>

                <div class="row">
                  <div class="col-md-6 mt-2">
                    <button type="submit" class="btn btn-primary d-grid w-100">Submit</button>
                  </div>
                  <div class="col-md-6 mt-2">
                    <button type="button" class="btn btn-danger d-grid w-100" onclick="handleCancel()">Cancel</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
  </div>
</body>
<?php include("../components/footer.php") ?>
<script>
  const handleCancel = () => window.location.href = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

  $("#companyName").on("input", function() {
    updateForm();
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
      updateForm(suggestion.data)
    },
  });

  function updateForm(data = null) {
    if (data) {
      $("input[name='company_id']").val(data.id)
      $("select[name='address']").val(data.address)
      $("select[name='industry']").val(data.industry_id)
      $("textarea[name='description']").val(data.description)

      $("#divCompanyLogo").hide()
      $("#divBusinessPermit").hide()
    } else {
      $("input[name='company_id']").val("")
      $("select[name='address']").val("")
      $("select[name='industry']").val("")
      $("textarea[name='description']").val("")

      $("#divCompanyLogo").show()
      $("#divBusinessPermit").show()
    }
  }

  $("#divCompanyLogo").imageupload()
  $("#divBusinessPermit").imageupload()

  $("#form-company-details").on("submit", function(e) {
    e.preventDefault()

    const input_business_permit = $("input[name='input_business_permit']").val()
    const url_business_permit = $("input[name='url_business_permit']").val()

    if (!input_business_permit && !url_business_permit && $("#divBusinessPermit").is(":visible")) {
      swal.fire({
        title: "Error",
        html: "Business Permit is required",
        icon: "error"
      })
    } else {
      swal.showLoading()

      $.ajax({
        url: "<?= SERVER_NAME . "/backend/nodes?action=register_company" ?>",
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
              window.location.replace("<?= SERVER_NAME . "/views/profile" ?>");
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
    }

  })
</script>

</html>