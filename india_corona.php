<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include 'link/links.php' ; ?>
  <?php include 'css/style.php'; ?>
 
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg nav_style p-3">
  <a class="navbar-brand pl-5 corona_rotate" href="#"><img src="images/navcorona.png" class="img-responsive" width="30">&nbsp;COVID-19</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-5 text-capitalize">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#aboutid">About</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#sympid">Symptoms</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#preventid">Prevention</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="global_corona.php">WorldCrona Live</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="india_corona.php">IndiaCorona Live</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="india_api.php">IndiaDayWiseCorona Live</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#contactid">Contact</a>
      </li>

    
    </ul>
    
  </div>
</nav>


<!-- corona india latest updates  using api-->
<section class="corona_update container-fluid">
  <div class="my-5">
    
<h3 class="text-uppercase text-center">covid-19 live updates of the india</h3>
  </div>

  <div class="table table-responsive">
    <table class="table-bordered table-striped text-center table table-responsive table-hover w-100 d-block d-md-table justify-content-center align-items-center">
      <thead>
      <tr>
        <th class="text-capitalize">Country</th>
        <th class="text-capitalize">State</th>
        <th class="text-capitalize">Confirmed</th>
        <th class="text-capitalize">Active</th>
        <th class="text-capitalize">Recovered</th>
        <th class="text-capitalize">Deaths</th>
      </tr>
    </thead>

    <?php 

$data = file_get_contents('https://api.covid19india.org/data.json');

$coronalive = json_decode($data ,true);

//echo "<pre>";

//print_r($coronalive);
//echo count($coronalive['statewise']);
$states_count =count($coronalive['statewise']);
//echo $coronalive ['statewise'][1]['state'];

$i =1;
while ($i < $states_count) 
{
  ?>
<tbody>
  <tr>
    <td><?php echo $coronalive['statewise'][$i]['lastupdatedtime']  ; ?></td>

    <td><?php echo $coronalive['statewise'][$i]['state']  ; ?></td>

    <td><?php echo $coronalive['statewise'][$i]['confirmed']  ; ?></td>

    <td><?php echo $coronalive['statewise'][$i]['active']  ; ?></td>

    <td><?php echo $coronalive['statewise'][$i]['recovered']  ; ?></td>

    <td><?php echo $coronalive['statewise'][$i]['deaths']  ; ?></td>
  </tbody>
  </tr>

<?php
  $i++;
}

?>
    </table>
  </div>
</section>

<!-- top cursor -->

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

<!-- footer -->
<footer class="mt-5">
<div class="footer_style text-white text-center container-fluid">
  <p>&copy; Copyright <?php echo date("Y"); ?> by RekhaTechnical</p>
</div>  

</footer>

<!-- javascript script for top cursor -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$('.count').each(function() {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 5000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });
});

jQuery(document).ready(function($) {
    
    setInterval(function() {
        updateValue();
    }, 6000);

});
</script>