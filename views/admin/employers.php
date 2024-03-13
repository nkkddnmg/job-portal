<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Employer Lists";
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-free">

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

            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light"><?= $pageName ?></span>
            </h4>

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
    buttons: ['print',
      {
        extend: 'colvis',
        text: "Columns",
        columns: [1, 2, 3]
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: [1, 2, 3]
        }
      }
    ],
    dom: `
      <'row'
      <'col-md-4 d-flex my-2 justify-content-start'B>
      <'col-md-4 d-flex my-2 justify-content-center'l>
      <'col-md-4 d-flex my-2 justify-content-end'f>
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