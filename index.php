<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>



  <link rel="stylesheet" href="index.css">

  <title>Carbon FOOTPRINT</title>
</head>

<body>
  <?php
  include 'base.php';
  ?>


  <div class="image-container parallax">
    <div class="text">CARBON FOOTPRINT</div>
  </div>


  <br>
  <br>


  <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">



    <!-- The slideshow/carousel -->
    <div class="carousel-inner border border-dark rounded">
      <div class="carousel-item active">
        <div class="row g-0">
          <div class="col-md-6">
            <img src="https://source.unsplash.com/vouoK_daWL8/1600x900" class="img-fluid rounded">
          </div>
          <div class="col-md-6">
            <div class="card-body " >
              <h5 class="text-center">CARBON FOOTPRINT</h5>
              <hr>
              <br>
              <br>
              <p class=" card-text text-center fs-5 fw-bold ">
                “A carbon footprint is the total greenhouse gas (GHG) emissions caused by an individual, event, organization, service, place or product, expressed as carbon dioxide equivalent. Greenhouse gases, including the carbon-containing gases carbon dioxide and methane, can be emitted through the burning of fossil fuels, land clearance and the production and consumption of food, manufactured goods, materials, wood, roads, buildings, transportation and other services."
              </p>

            </div>
          </div>
        </div>
      </div>



      <div class="carousel-item ">
        <div class="row g-0">
          <div class="col-md-6">
            <img id="i" src="https://source.unsplash.com/12rtohgXu9I/1600x900" class="img-fluid rounded">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="text-center">CARBON FOOTPRINT</h5>
              <br>
              <br>
              <br>
              <p class="card-text text-center fs-5 fw-bold">
                “The term was popularized by a $250 million advertising campaign by the oil and gas company BP in an attempt to move public attention away from restricting the activities of fossil fuel companies and onto individual responsibility for solving climate change.”
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <!-- <button class="white carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <i class="fas fa-arrow-left"></i>
      </button>
      <button class="white carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <i class="fas fa-arrow-right" aria-hidden="true"></i>
      </button>  -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div> 
    

    <br>

    <div class="row small-cards">
      <div class="col-md-4  small-cards">
        <div class="card text-white bg-dark mb-4  w-100 p-3 h-100 d-inline-block  float-left" style="max-width: 30rem;">
          <div class="card-header">CARBON OFFSET</div>
          <div class="card-body">
            <h5 class="card-title">HOW TO REDUCE YOUR IMPACT</h5>
            <p class="card-text">
              Carbon offsets are a practical and effective way to address climate change and encourage the growth of renewable energy.
              With them, you can counteract your personal carbon emissions—your “carbon footprint”—while contributing to a more sustainable future.

            </p>
          </div>
        </div>
      </div>


      <div class="col-md-4 small-cards">
        <div class="card text-white bg-dark mb-4  w-100 p-3 h-100 d-inline-block " style="max-width: 30rem;">
          <div class="card-header">CARBON OFFSET</div>
          <div class="card-body">
            <h5 class="card-title">WHAT IS IT??</h5>
            <p class="card-text">
              “A carbon offset is a reduction in emissions of carbon dioxide or other greenhouse gases made in order to compensate for emissions made elsewhere. Offsets are measured in tonnes of carbon dioxide-equivalent.One tonne of carbon offset represents the reduction of one tonne of carbon dioxide or its equivalent in other greenhouse gases.”
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 small-cards">
        <div class="card text-white bg-dark mb-4   w-100 p-3 h-100 d-inline-block float-right" style="max-width: 30rem;">
          <div class="card-header">CARBON OFFSET</div>
          <div class="card-body">
            <h5 class="card-title">OFFSET SCHEMES</h5>
            <p class="card-text">
              Carbon offset schemes allow individuals and companies to invest in environmental projects around the world in order to balance out their own carbon footprints. The projects are usually based in developing countries and most commonly are designed to reduce future emissions. This might involve rolling out clean energy technologies or purchasing and ripping up carbon credits from an emissions trading scheme.

            </p>
          </div>
        </div>
      </div>

    </div>
    <br>

    <div class="card text-center calculate">
      <div class="card-body get-started">
        <h2 class="card-title">CALCULATE YOUR CARBON EMISSION</h2>
        <p class="card-text">Protect Nature, Reduce Your Carbon Footprint</p>
        <a href="signup.php" class="btn btn-success">GET STARTED</a>
      </div>
    </div>
    <br>
    <!-- Site footer -->
    <footer class="site-footer ">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">The carbon Footprint is currently 60 percent of humanity’s overall Ecological Footprint and its most rapidly growing component. Humanity’s carbon Footprint has increased 11-fold since 1961. Reducing humanity’s carbon Footprint is the most essential step we can take to end overshoot and live within the means of our planet.</p>
          </div>



          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="about.php">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>

            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
              <a href="#">IITE</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>






</body>

</html>