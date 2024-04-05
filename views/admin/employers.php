<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Employer Lists";
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
                <table id="employer-table" class="table table-striped nowrap">
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
                    $employers = $helpers->select_all_with_params("users", "role='employer'");

                    if (count($employers) > 0) :
                      foreach ($employers as $employer) :

                        $modal_id = "employer-img-modal_$employer->id";
                        $img_id = "employer-image_$employer->id";
                        $caption_id = "employer-caption_$employer->id";

                    ?>
                        <tr>
                          <td class="td-image">
                            <?= $helpers->generate_modal_click_avatar($helpers->get_avatar_link($employer->id), $modal_id, $img_id, $caption_id) ?>
                          </td>
                          <td><?= $employer->fname ?></td>
                          <td><?= empty($employer->mname) ? "<em class='text-muted'>N/A</em>" : $employer->mname ?></td>
                          <td><?= $employer->lname ?></td>
                          <td><?= $employer->address ?></td>
                          <td><?= $employer->email ?></td>
                          <td><?= date("m-d-Y", strtotime($employer->date_created)) ?></td>
                          <td>
                            <?php if ($employer->id != $LOGIN_USER->id) : ?>
                              <button type="button" class="btn btn-primary btn-sm" onclick='return window.location.href =`<?= SERVER_NAME . "/views/profile?id=$employer->id" ?>`'>
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
  const employerTableCols = [1, 2, 3, 4, 5, 6];
  const employerTable = $("#employer-table").DataTable({
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
          columns: employerTableCols
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
        columns: employerTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: employerTableCols
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