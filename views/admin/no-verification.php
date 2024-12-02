<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../sign-in");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Company Verification";
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
                <table id="company-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Company Logo</th>
                      <th>Name</th>
                      <th>Industry</th>
                      <th>Address</th>
                      <th>Date Created</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $companies = $helpers->select_all("company");

                    if (count($companies) > 0) :
                      foreach ($companies as $company) :
                        $verificationData = $helpers->select_all_individual("verification", "id='$company->verification_id'");

                        if ($verificationData) continue;

                        $modal_id = "company-img-modal_$company->id";
                        $img_id = "company-image_$company->id";
                        $caption_id = "company-caption_$company->id";

                        $NA = "<em class='text-muted'>N/A</em>";
                        $industryData = $helpers->select_all_individual("industries", "id='$company->industry_id'");

                    ?>
                        <tr>
                          <td class="td-image text-center">
                            <?= $helpers->generate_modal_click_avatar($helpers->get_company_logo_link($company->id), $modal_id, $img_id, $caption_id) ?>
                          </td>
                          <td><?= $company->name ?></td>
                          <td><?= $industryData ? $industryData->name : $NA ?></td>
                          <td><?= $company->district ?></td>
                          <td><?= date("m-d-Y", strtotime($company->date_created)) ?></td>
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
  const companyTableCols = [1, 2, 3, 4, 5];
  const companyTable = $("#company-table").DataTable({
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
          columns: companyTableCols
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
        columns: companyTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: companyTableCols
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