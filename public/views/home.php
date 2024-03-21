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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p>Find the perfect job that your deserved</p>
            </div>
            <form method="post" class="search-jobs-form">
              <div class="row mb-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" placeholder="Job">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type">
                    <option>Part Time</option>
                    <option>Full Time</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 popular-keywords">
                  <h3>Trending Keywords:</h3>
                  <ul class="keywords list-unstyled m-0 p-0">
                    <li><a href="#" class="">UI Designer</a></li>
                    <li><a href="#" class="">Python</a></li>
                    <li><a href="#" class="">Developer</a></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <a href="#howItWorks" class="scroll-button smoothscroll">
        <span class="icon-keyboard_arrow_down"></span>
      </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="howItWorks" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">How it Works?</h2>
            <p class="lead text-white">Fast and easy process</p>
          </div>
        </div>
        <div class="row pb-0 block__19738">

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/user.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">Create an Account</span>
          </div>

          <div class="col mb-5 mb-lg-0 d-flex align-items-center justify-content-center p-0">
            <span class="icon-arrow-right"></span>
          </div>

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/search.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">Find your job</span>
          </div>

          <div class="col mb-5 mb-lg-0 d-flex align-items-center justify-content-center p-0">
            <span class="icon-arrow-right"></span>
          </div>

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/file.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">CV/ Resume</span>
          </div>

          <div class="col mb-5 mb-lg-0 d-flex align-items-center justify-content-center p-0">
            <span class="icon-arrow-right"></span>
          </div>

          <div class="col mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <img src="<?= SERVER_NAME . "/public/assets/images/checked.png" ?>" class="img-thumbnail border-0 bg-transparent">
            </div>
            <span class="h5 text-white">Apply</span>
          </div>


        </div>
      </div>
    </section>

    <section class="site-section" id="jobPostings">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Newly Posted Jobs</h2>
          </div>
        </div>

        <ul class="job-listings mb-5">
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_1.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Adidas</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> New York, New York
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">Part Time</span>
              </div>
            </div>

          </li>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_2.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Digital Marketing Director</h2>
                <strong>Sprint</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Overland Park, Kansas
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_3.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Back-end Engineer (Python)</h2>
                <strong>Amazon</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Overland Park, Kansas
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_4.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Senior Art Director</h2>
                <strong>Microsoft</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Anywhere
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>

          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_5.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Puma</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> San Mateo, CA
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_1.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Product Designer</h2>
                <strong>Adidas</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> New York, New York
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-danger">Part Time</span>
              </div>
            </div>

          </li>
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="#"></a>
            <div class="job-listing-logo">
              <img src="<?= SERVER_NAME . "/public/assets/images/job_logo_2.jpg" ?>" alt="Free Website Template by Free-Template.co" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>Digital Marketing Director</h2>
                <strong>Sprint</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> Overland Park, Kansas
              </div>
              <div class="job-listing-meta">
                <span class="badge badge-success">Full Time</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <?php if (!$LOGIN_USER) : ?>
      <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('<?= SERVER_NAME . "/public/assets/images/hero_1.jpg" ?>');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h2 class="text-white">Looking For A Job?</h2>
              <p class="mb-0 text-white lead">We Help To Get The Best Job And Find A Talent.</p>
            </div>
            <div class="col-md-3 ml-auto">
              <a href="<?= SERVER_NAME . "/views/sign-up" ?>" class="btn btn-warning btn-block btn-lg">Sign Up</a>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <section class="site-section py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Company We've Helped</h2>
                <p class="lead">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</p>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
  </div>

  <!-- SCRIPTS -->
  <?php include("../components/footer.php") ?>
</body>

</html>