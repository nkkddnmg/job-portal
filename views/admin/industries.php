<?php include("../../backend/nodes.php"); ?>
<?php include("../../components/function_components.php"); ?>
<?php
if (!isset($_SESSION["id"])) {
  header("location: ../");
}

$LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
$pageName = "Industry Lists";
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
                <button type="button" class="btn btn-primary float-end" id="btnAdd">
                  <i class='tf-icons bx bx-plus'></i> Add New
                </button>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table id="industry-table" class="table table-striped nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Date Created</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $industries = $helpers->select_all("industries");

                    if (count($industries) > 0) :
                      foreach ($industries as $industry) :
                    ?>
                        <tr>
                          <td><?= $industry->name ?></td>
                          <td><?= date("Y-m-d h:i A", strtotime($industry->date_created)) ?></td>
                          <td>
                            <button type="button" class="btn btn-warning btn-sm m-2" onclick="handleEditIndustry('<?= $industry->id ?>', '<?= $industry->name ?>')">
                              Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm m-2" onclick="handleIndustryDelete('<?= $industry->id ?>')">
                              Delete
                            </button>
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

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

</body>

<?php include("../../components/footer.php") ?>

<script>
  const handleIndustryDelete = (id) => {
    const postData = {
      table: "industries",
      column: "id",
      val: id,
    }
    swal.showLoading();
    handleDelete("<?= SERVER_NAME . "/backend/nodes?action=delete_data" ?>", undefined, postData);
  }

  const handleEditIndustry = (id, name) => {
    swal.fire({
      input: "text",
      inputLabel: "Industry name",
      inputValue: name,
      showCancelButton: true,
      inputValidator: (value) => {
        if (!value) {
          return "Input industry name";
        }
      }
    }).then((res) => {
      if (res.isConfirmed) {
        save({
          id: id,
          action: "update",
          name: res.value
        })
      }
    })
  }

  $("#btnAdd").on("click", function() {
    swal.fire({
      input: "text",
      inputLabel: "Industry name",
      showCancelButton: true,
      inputValidator: (value) => {
        if (!value) {
          return "Input industry name";
        }
      }
    }).then((res) => {
      if (res.isConfirmed) {
        save({
          action: "insert",
          name: res.value
        })
      }
    })
  })

  function save(formData) {
    swal.showLoading()
    $.ajax({
      url: "<?= SERVER_NAME . "/backend/nodes?action=save_industry" ?>",
      type: "POST",
      data: formData,
      cache: true,
      processData: true,
      success: function(data) {
        const resp = $.parseJSON(data)
        swal.fire({
          title: resp.success ? "Success" : "Error",
          html: resp.message,
          icon: resp.success ? "success" : "error",
        }).then(() => window.location.reload())
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

  const industryTableCols = [1, 2];
  const industryTable = $("#industry-table").DataTable({
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
          columns: industryTableCols
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
        columns: industryTableCols
      },
      {
        extend: 'searchBuilder',
        config: {
          columns: industryTableCols
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