<?php include("../../backend/nodes.php"); ?>
<?php include("../components/function_components.php"); ?>
<?php
$LOGIN_USER = null;
if (isset($_SESSION["id"])) {
  $LOGIN_USER = $helpers->get_user_by_id($_SESSION["id"]);
}
?>
<!doctype html>
<html lang="en">

<?= head("Job Portal") ?>

<body id="top">

  <?= loadingEl() ?>

  <div class="site-wrap">

    <?php include("../components/navbar.php") ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>'); height: 20vh !important" id="home-section">
      <div class="container">
        <div class="row pt-0">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Trending Keywords</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section pt-4">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <table id="trending-table" class="table table-striped nowrap">
              <thead>
                <tr>
                  <th>Keywords</th>
                  <th class="text-center">Search Count</th>
                  <th>Last Search</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $trendingKeywords = $helpers->custom_query("SELECT 
                                                              keywords, 
                                                              COUNT(keywords) as search_count,  
                                                              date_created 
                                                            FROM search_keywords 
                                                            WHERE keywords <> '' 
                                                            GROUP BY keywords 
                                                            ORDER BY count(date_created) DESC");

                if (count($trendingKeywords) > 0) :
                  foreach ($trendingKeywords as $trending) :
                ?>
                    <tr>
                      <td><?= $trending->keywords ?></td>
                      <td class="text-center">
                        <span class="badge rounded-pill bg-success px-4 text-white">
                          <?= $trending->search_count ?>
                        </span>

                      </td>
                      <td><?= date("Y-m-d", strtotime($trending->date_created)) ?></td>
                    </tr>

                  <?php endforeach; ?>
                <?php endif;
                ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </section>

  </div>

  <!-- SCRIPTS -->
  <?php include("../components/footer.php") ?>
</body>
<script>
  const adminTableCols = [0, 1, 2];
  const adminTable = $("#trending-table").DataTable({
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
    buttons: [
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