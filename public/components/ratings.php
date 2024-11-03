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
    <div class="row">
      <div class="col-8">
        <div id="ratingChart" style="margin-top: -20px;"></div>
      </div>
      <div class="col-4">
        <span style="font-size: 20px; margin-right: 25px;">Ratings by Category</span><br>
        <div class="mt-2">
          <span id="soft"></span> Soft Skills <br>
          <span id="communication"></span> Communication <br>
          <span id="flexibility"></span> Flexibility
        </div>
      </div>
    </div>
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
        <div class="col-2 text-start pr-0">
          <div class="">
            <span style="font-size: 15px;">
              <?= $rating->soft_skills ?>
              <span class="bx bxs-star" style="margin-right: .5rem; color: orange;"></span>
              <strong>Soft Skills</strong>
            </span>
            <br>
            <span style="font-size: 15px;">
              <?= $rating->communication ?>
              <span class="bx bxs-star" style="margin-right: .5rem; color: orange;"></span>
              <strong>Communication</strong>
            </span>
            <br>
            <span style="font-size: 15px;">
              <?= $rating->flexibility ?>
              <span class="bx bxs-star" style="margin-right: .5rem; color: orange;"></span>
              <strong>Flexibility</strong>
            </span>
            <br>
          </div>
        </div>
        <div class="col-9">
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

      let rating = [
        resp.filter((d) => d.soft_skills == 1 || d.communication == 1 || d.flexibility == 1).length,
        resp.filter((d) => d.soft_skills == 2 || d.communication == 2 || d.flexibility == 2).length,
        resp.filter((d) => d.soft_skills == 3 || d.communication == 3 || d.flexibility == 3).length,
        resp.filter((d) => d.soft_skills == 4 || d.communication == 4 || d.flexibility == 4).length,
        resp.filter((d) => d.soft_skills == 5 || d.communication == 5 || d.flexibility == 5).length,
      ];

      let rate = rating.map((d, i) => d * (i + 1))

      let avg = Math.ceil(rate.reduce((a, b) => a + b, 0) / resp.length)
      let average = avg > 5 ? 5 : avg

      let outputRating = `<span style="font-size: 25px; margin-right: 25px;">Overall Ratings </span><br>`;

      outputRating += generateStar(average)

      $("#outputRating").html(outputRating);
      $("#average").html(`${isNaN(average) ? 0 : average} average based on ${resp.length} reviews.`)

      const softAvg = (resp.reduce((a, b) => a + Number(b.soft_skills), 0) / resp.length)
      const commAvg = (resp.reduce((a, b) => a + Number(b.communication), 0) / resp.length)
      const flexAvg = (resp.reduce((a, b) => a + Number(b.flexibility), 0) / resp.length)

      $("#soft").html(`${isNaN(softAvg) ? 0 : softAvg} <span class="bx bxs-star" style="font-size: 20px; margin-right: 10px;color: orange;"></span>`)
      $("#communication").html(`${isNaN(commAvg) ? 0 : commAvg} <span class="bx bxs-star" style="font-size: 20px; margin-right: 10px;color: orange;"></span>`)
      $("#flexibility").html(`${isNaN(flexAvg) ? 0 : flexAvg} <span class="bx bxs-star" style="font-size: 20px; margin-right: 10px;color: orange;"></span>`)


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
            "1 star",
            "2 stars",
            "3 stars",
            "4 stars",
            "5 stars",
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

  function generateStar(avg) {
    let output = "";
    for (let i = 0; i < 5; i++) {
      if (i < Math.ceil(Number(avg))) {
        output += (`<span class="bx bxs-star" style="font-size: 20px; margin-right: 10px;color: orange;"></span>`)
      } else {
        output += (`<span class="bx bx-star" style="font-size: 20px; margin-right: 10px;"></span>`)
      }
    }

    return output
  }
</script>