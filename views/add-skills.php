<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<?= head("Add Skills") ?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">

            <div class="text-center">
              <h4 class="mb-2">What are some of your skills?</h4>
              <p>We recommend adding at least 6 skills</p>
            </div>

            <?php
            $id = $helpers->decrypt($_GET['t']);
            $applicant_skills = $helpers->select_all_with_params("applicant_skills", "user_id='$id'");

            $skillsIds = array();

            if (count($applicant_skills) > 0) :
              foreach ($applicant_skills as $skill) :
                $skillData = $helpers->select_all_individual("skills_list", "id='$skill->skill_id'");
                array_push($skillsIds, $skill->skill_id);

            ?>
                <div class="card mb-3">
                  <div class="card-body py-2">
                    <div class="card-header p-0 position-relative">
                      <div class="position-absolute top-0 end-0">
                        <a href="javascript:void(0)" class="btn btn-default btn-sm p-0" onclick="handleRemoveSkills(`<?= $skill->id ?>`)">
                          <i class='bx bxs-trash h4'></i>
                        </a>
                      </div>
                    </div>
                    <p class="m-0" style="color: #697a8d">
                      <?= $skillData->name ?>
                    </p>
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
              <input type="text" name="token" value="<?= $_GET['t'] ?>" hidden readonly>
              <input type="text" name="skill_id" hidden readonly>

              <div class="mb-3 form-group ">
                <label class="form-label">Skills</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="skill">
                  <button class="btn btn-primary" type="button" onclick="btnAddSkill(`<?= $_GET['t'] ?>`)">Add</button>
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
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="handleAddSkill(`<?= $skill->id ?>`, `<?= $_GET['t'] ?>`)">
                      <p class="m-0">
                        <i class="bx bx-plus mx-2"></i>
                        <span class="align-middle mx-1"><?= $skill->name ?></span>
                      </p>
                      <!-- <span class="badge bg-primary rounded-pill">14</span> -->
                    </a>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              <div class="row mt-3">
                <div class="col-md-6 mt-2">
                  <a href="javascript:void(0)" onclick="handleOnclickFinish()" class="btn  btn-primary d-grid w-100">
                    Finish
                  </a>
                </div>
                <div class="col-md-6 mt-2">
                  <button type="button" class="btn btn-secondary d-grid w-100" onclick="handleCancel()">
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
  function handleOnclickFinish() {
    if (sessionStorage.getItem("referer")) {
      window.location.href = decodeURIComponent(sessionStorage.getItem("referer"))
    } else {
      window.location.href = "<?= SERVER_NAME . "/public/views/home" ?>"
    }
  }
  
  const handleCancel = () => window.location.href = "<?= SERVER_NAME . "/backend/nodes?action=logout" ?>";

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
</script>

</html>