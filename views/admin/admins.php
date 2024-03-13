<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Admin Lists";
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
              <div class="col-6 py-2">
                <button type="button" class="btn btn-primary float-end" onclick='return window.location.href=`<?= SERVER_NAME . "/views/admin/add-admin" ?>`'>
                  <i class='tf-icons bx bx-plus'></i> Add New
                </button>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table id="admin-table" class="table table-striped nowrap">
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
                    $admins = $helpers->select_all_with_params("users", "role='admin'");
                    $modal_id = "admin-img-modal";
                    $img_id = "admin-image";
                    $caption_id = "admin-caption";
                    if (count($admins) > 0) :
                      foreach ($admins as $admin) :

                    ?>
                        <tr>
                          <td class="td-image">
                            <?= $helpers->generate_td_avatar($helpers->get_avatar_link($admin->id), $modal_id, $img_id, $caption_id) ?>
                          </td>
                          <td><?= $admin->fname ?></td>
                          <td><?= empty($admin->mname) ? "<em class='text-muted'>N/A</em>" : $admin->mname ?></td>
                          <td><?= $admin->lname ?></td>
                          <td><?= $admin->address ?></td>
                          <td><?= $admin->email ?></td>
                          <td><?= date("m-d-Y", strtotime($admin->date_created)) ?></td>
                          <td>
                            <?php if ($admin->id != $LOGIN_USER->id) : ?>
                              <button type="button" class="btn btn-primary" onclick='return window.location.href =`<?= SERVER_NAME . "/views/profile?id=$admin->id" ?>`'>
                                View Profile
                              </button>
                            <?php else : ?>
                              ---
                            <?php endif; ?>
                          </td>
                        </tr>

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
  <?= $helpers->generate_modal_img($modal_id, $img_id, $caption_id) ?>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

<?php include("../../components/footer.php") ?>

<script>
  const adminTableCols = [1, 2, 3, 4, 5];
  const adminTable = $("#admin-table").DataTable({
    paging: true,
    lengthChange: true,
    ordering: false,
    info: true,
    autoWidth: true,
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
          columns: adminTableCols
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
        columns: adminTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: adminTableCols
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