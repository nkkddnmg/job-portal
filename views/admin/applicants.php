<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Applicant Lists";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<?= head($pageName) ?>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include("../../components/sidebar.php") ?>

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include("../../components/navbar.php") ?>
        <!-- / Navbar -->

        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
              <div class="col-6">
                <h4 class="fw-bold py-3 mb-4">
                  <span class="text-muted fw-light"><?= $pageName ?></span>
                </h4>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table id="applicant-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Avatar</th>
                      <th>Full name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Date Created</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $applicants = $helpers->select_all_with_params("users", "role='applicant'");

                    if (count($applicants) > 0) :
                      foreach ($applicants as $applicant) :
                        $modal_id = "applicant-img-modal_$applicant->id";
                        $img_id = "applicant-image_$applicant->id";
                        $caption_id = "applicant-caption_$applicant->id";
                    ?>
                        <tr>
                          <td class="td-image">
                            <?= $helpers->generate_modal_click_avatar($helpers->get_avatar_link($applicant->id), $modal_id, $img_id, $caption_id) ?>
                          </td>
                          <td><?= $helpers->get_full_name($applicant->id, "with_middle") ?></td>
                          <td><?= $applicant->address ?></td>
                          <td><?= $applicant->email ?></td>
                          <td><?= date("m-d-Y", strtotime($applicant->date_created)) ?></td>
                          <td>
                            <?php if ($applicant->id != $LOGIN_USER->id) : ?>
                              <button type="button" class="btn btn-primary btn-sm" onclick='return window.location.href =`<?= SERVER_NAME . "/views/profile?id=$applicant->id" ?>`'>
                                View Profile
                              </button>
                            <?php else : ?>
                              ---
                            <?php endif; ?>
                          </td>
                        </tr>
                        <?= $helpers->generate_modal_img($modal_id, $img_id, $caption_id) ?>
                      <?php endforeach; ?>
                    <?php endif;
                    ?>
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

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

<?php include("../../components/footer.php") ?>

<script>
  const applicantTableCols = [1, 2, 3, 4, 5];
  const applicantTable = $("#applicant-table").DataTable({
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
          columns: applicantTableCols
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
        columns: applicantTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: applicantTableCols
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