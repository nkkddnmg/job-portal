<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Hired Lists";
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
                <table id="hired-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Avatar</th>
                      <th>First name</th>
                      <th>Middle name</th>
                      <th>Last name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Date Created</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qStr = "SELECT 
                                u.*
                            FROM users u 
                            WHERE u.role = 'applicant'
                            AND u.id IN(SELECT c.user_id FROM candidates c WHERE c.status = 'Hired')";

                    $hired = $helpers->custom_query($qStr);

                    if (count($hired) > 0) :
                      foreach ($hired as $hire) :

                        $modal_id = "hire-img-modal_$hire->id";
                        $img_id = "hire-image_$hire->id";
                        $caption_id = "hire-caption_$hire->id";

                    ?>
                        <tr>
                          <td class="td-image">
                            <?= $helpers->generate_modal_click_avatar($helpers->get_avatar_link($hire->id), $modal_id, $img_id, $caption_id) ?>
                          </td>
                          <td><?= $hire->fname ?></td>
                          <td><?= empty($hire->mname) ? "<em class='text-muted'>N/A</em>" : $hire->mname ?></td>
                          <td><?= $hire->lname ?></td>
                          <td><?= $hire->district ?></td>
                          <td><?= $hire->email ?></td>
                          <td><?= date("m-d-Y", strtotime($hire->date_created)) ?></td>
                          <td>
                            <?php if ($hire->id != $LOGIN_USER->id) : ?>
                              <button type="button" class="btn btn-primary btn-sm" onclick='handleOpenModal(`<?= SERVER_NAME . "/public/views/preview-profile?id=$hire->id" ?>`)'>
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
  <div class="modal fade" id="modalPreview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
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

<?php include("../../components/footer.php") ?>

<script>
  const hiredTableCols = [1, 2, 3, 4, 5, 6];
  const hiredTable = $("#hired-table").DataTable({
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
          columns: hiredTableCols
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
        columns: hiredTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: hiredTableCols
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

  function handleOpenModal(src) {
    $("#previewIframe").attr("src", src)
    $("#modalPreview").modal("show")
  }
</script>

</html>