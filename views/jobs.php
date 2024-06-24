<?php include("../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Posted Jobs";
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
              <div class="col-6 py-2">
                <?php
                $companyData = $helpers->select_all_individual("company", "id='$LOGIN_USER->company_id'");
                $companyVerification = $helpers->select_all_individual("verification", "id='$companyData->verification_id'");

                $disablePostNew = "disabled";
                if ($companyVerification) {
                  if ($companyVerification->status == "approved") {
                    $disablePostNew = "";
                  }
                }
                ?>
                <a href="<?= SERVER_NAME . "/views/post-job" ?>" class="btn btn-primary float-end <?= $disablePostNew ?>">
                  <i class='tf-icons bx bx-plus'></i> Post New
                </a>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table id="job-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Job Type</th>
                      <th class="text-start">Date Posted</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $jobs = $helpers->select_all_with_params("job", "company_id='$LOGIN_USER->company_id'");
                    if (count($jobs) > 0) :
                      foreach ($jobs as $job) :

                        $btnDropDownId = "btn-dropdown-$job->id";
                    ?>
                        <tr>
                          <td><?= $job->title ?></td>
                          <td><?= $job->type ?></td>
                          <td class="text-start"><?= date("Y-m-d H:i:s", strtotime($job->date_created)) ?></td>
                          <td><?= ucfirst($job->status) ?></td>
                          <td>
                            <div class="dropdown">

                              <button class="btn btn-default rounded-circle" type="button" id="<?= $btnDropDownId ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-dots-vertical-rounded' data-bs-toggle="tooltip" data-placement="top" title="More"></i>
                              </button>

                              <div class="dropdown-menu" aria-labelledby="<?= $btnDropDownId ?>" data-bs-popper="none">
                                <a class="dropdown-item" href="<?= SERVER_NAME . "/views/edit-job?id=$job->id" ?>">
                                  Edit Job Post
                                </a>
                                <button type="button" class="dropdown-item" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-job?id=$job->id" ?>`)'>
                                  Preview
                                </button>

                                <a href="<?= SERVER_NAME . "/views/candidates-list?id=$job->id" ?>" class="dropdown-item">
                                  List of Candidates
                                </a>

                                <?php if ($job->status == "active") : ?>
                                  <a class="dropdown-item" href="<?= SERVER_NAME . "/views/potential-candidates?id=$job->id" ?>">
                                    Show Potential Candidates
                                  </a>
                                  <button class="dropdown-item" type="button" onclick="handleSaveStatus('<?= $job->id ?>', 'inactive')">
                                    Set Inactive
                                  </button>
                                <?php else : ?>
                                  <button class="dropdown-item" type="button" onclick="handleSaveStatus('<?= $job->id ?>', 'active')">
                                    Set Active
                                  </button>
                                  <button class="dropdown-item" type="button" onclick="handleDeleteDraft('<?= $job->id ?>')">
                                    Delete Job Post
                                  </button>
                                <?php endif; ?>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>

                </table>
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

  <div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content" style="height:90vh">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3" style="height: 100%">
              <iframe src="" id="previewIframe" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%"></iframe>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

<?php include("../components/footer.php") ?>

<script>
  function handleOpenModal(src) {
    $("#previewIframe").attr("src", src)
    $("#modalPreview").modal("show")
  }

  function handleSaveStatus(jobId, action) {
    swal.showLoading()
    $.post("<?= SERVER_NAME . "/backend/nodes?action=job_status_save" ?>", {
      job_id: jobId,
      action: action
    }, (data, status) => {
      const resp = JSON.parse(data);
      if (!resp.success) {
        swal.fire({
          title: "Error!",
          html: resp.message,
          icon: "error",
        });
      } else {
        window.location.reload();
      }
    });
  }

  function handleDeleteDraft(jobId) {
    const confirmOptions = {
      title: "Are you sure you want to delete job?",
      text: "You can't undo this action after successful deactivation.",
      buttonText: "Delete",
      buttonColor: "#dc3545",
    }

    const postData = {
      table: "job",
      column: "id",
      val: jobId,
    }

    handleDelete("<?= SERVER_NAME . "/backend/nodes?action=delete_data" ?>", confirmOptions, postData);

  }

  const jobTableCols = [0, 1, 2, 3];
  const jobTable = $("#job-table").DataTable({
    paging: true,
    lengthChange: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
    language: {
      searchBuilder: {
        button: 'Filter',
      }
    },
    buttons: [{
        extend: 'print',
        title: '',
        exportOptions: {
          columns: jobTableCols
        },
        customize: function(win) {
          $(win.document.body)
            .css('font-size', '10pt')

          $(win.document.body)
            .find('table')
            .addClass('compact')
            .css('font-size', 'inherit');
        }
      },
      {
        extend: 'colvis',
        text: "Columns",
        columns: jobTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: jobTableCols
        }
      }
    ],
    dom: `
      <'row'
      <'col-md-4 d-flex my-2 justify-content-start'B>
      <'col-md-4 d-flex my-2 justify-content-center'l>
      <'col-md-4 d-flex my-2 justify-content-md-end justify-content-sm-center'f>
      >
      <'row'<'col-12'tr>>
      <'row'
      <'col-md-6 col-sm-12'i>
      <'col-md-6 col-sm-12 d-flex justify-content-end'p>
      >
      `,
  });
</script>

</html>