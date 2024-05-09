<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<?= head("Job Preference") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner" style="max-width: 500px;">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <h4 class="mb-2">Job Preference</h4>
            </div>
            <?php include("../components/form-job-preference.php") ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<?php include("../components/footer.php") ?>
<?php include("../public/components/preference-modal.php") ?>

<script>
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