<?php
$id = null;
if (isset($_GET["t"])) {
  $id = $helpers->decrypt($_GET["t"]);
} else if (isset($userData)) {
  $id = $userData->id;
} else {
  $id = $LOGIN_USER->id;
}
?>
<!-- <hr class="my-0"> -->
<div class="card-body p-4">
  <div class="divRating">
    <div id="outputRating"></div>
    <p id="average"></p>
    <div id="ratingChart" style="margin-top: -20px;"></div>
  </div>
</div>

<?php
$ratings = $helpers->select_all_with_params("ratings", "user_id='$id'");
if (count($ratings) > 0) :
?>
  <hr class="my-0">
  <div class="card-body p-4">
    <span style="font-size: 25px; margin-right: 25px;">Feedbacks </span>
    <p> <?= count($ratings) ?> total feedbacks </p>

    <?php foreach ($ratings as $rating) : ?>
      <div class="row mt-4">
        <div class="col-2 text-center">
          <h3><?= $rating->stars ?></h3>
          <?php for ($i = 1; $i <= 5; $i++) :
            if ($i <= $rating->stars) :
          ?>
              <span class="bx bxs-star" style="font-size: 15px;color: orange;"></span>
            <?php else : ?>
              <span class="bx bx-star" style="font-size: 15px;"></span>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
        <div class="col-10">
          <small>Anonymous Employer - <?= date("F m, Y", strtotime($rating->date_created)) ?></small>
          <p class="mt-2">
            <?= nl2br($rating->feedback) ?>
          </p>
        </div>
      </div>
      <?php if ($rating->id != $ratings[count($ratings) - 1]->id) : ?>
        <hr>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<script src="<?= SERVER_NAME . "/assets/vendor/libs/apexcharts/apexcharts.js" ?>"></script>
<script>
  $.post(
    "<?= SERVER_NAME . "/backend/nodes?action=get_all_ratings" ?>", {
      user_id: "<?= $id ?>"
    },
    (data, status) => {
      const resp = JSON.parse(data);

      let rating = [0, 0, 0, 0, 0]
      resp.forEach((e) => {
        switch (e.stars) {
          case "1":
            rating[0] += 1;
            break;
          case "2":
            rating[1] += 1;
            break;
          case "3":
            rating[2] += 1;
            break;
          case "4":
            rating[3] += 1;
            break;
          case "5":
            rating[4] += 1;
            break;
          default:
            null;
            break;
        }
      })

      let average = 0;
      for (let i = 0; i < rating.length; i++) {
        average += (i + 1) * rating[i];
      }

      let outputRating = `<span style="font-size: 25px; margin-right: 25px;">Ratings </span><br>`;

      for (let i = 0; i < 5; i++) {
        if (i < Math.ceil(Number(average))) {
          outputRating += (`<span class="bx bxs-star" style="font-size: 20px; margin-right: 10px;color: orange;"></span>`)
        } else {
          outputRating += (`<span class="bx bx-star" style="font-size: 20px; margin-right: 10px;"></span>`)
        }
      }

      $("#outputRating").html(outputRating)
      $("#average").html(`${average} average based on ${resp.length} reviews.`)

      var options = {
        series: [{
          data: rating
        }],
        chart: {
          type: 'bar',
          height: 300,
          width: "100%"
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        colors: [
          '#04AA6D',
          '#2196F3',
          '#00bcd4',
          '#ff9800',
          '#f44336'
        ],
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: [
            "5 stars",
            "4 stars",
            "3 stars",
            "2 stars",
            "1 star",
          ],
        },
        tooltip: {
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function() {
                return ''
              }
            }
          }
        }
      };

      var chart = new ApexCharts(document.querySelector("#ratingChart"), options);
      chart.render();
      $(".apexcharts-toolbar").hide();
    })
</script>