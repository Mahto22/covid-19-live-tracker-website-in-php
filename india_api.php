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
  <a class="navbar-brand pl-5 corona_rotate" href="#">
    <img src="images/navcorona.png" class="img-responsive" width="30">&nbsp;COVID-19
  </a>
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


<!-- corona state wise latest updates  using api-->
<section class="corona_update container-fluid">
	<div class="mb-3">
		
<h3 class="text-uppercase text-center">covid-19 live updates of the Day Wise</h3>
	</div>

	<div class=" table table-responsive">
		<table class="table-bordered table-striped text-center table table-responsive table-hover w-100 d-block d-md-table justify-content-center align-items-center" id="tbl">
          <tr>
        <th class="text-left" colspan="6">Date & Month</th>
      </tr>

          <?php

$data = file_get_contents('https://api.covid19india.org/data.json');

$daywise =json_decode($data ,true);

//echo "<pre>";
//print_r($daywise);

$total_count = count($daywise ['cases_time_series']);

$i=0;
while ($i < $total_count) {
?>

			<tr>
				<td class="text-left" colspan="6"><?php echo $daywise['cases_time_series'][$i]['date']. "<br>" ;?>
          
        </td>
			

			
				<tr class="text-capitalize text-white">
					<th style="color: #fff; background: #2196f3;">Total Confirmed</th>
					<th style="color: #fff; background: #ffc107;">Daily Confirmed</th>
					<th style="color: #fff; background: #008C76FF;">Daily Recovered</th>
					<th style="color: #fff; background: #e91e7f;">Daily Deceased</th>
					<th style="color: #fff; background: #4caf50;">Total Recovered</th>
					<th style="color: #fff; background: #EE2737FF;">Total Deceased</th>
				</tr>
			<tr class="mb-5">
				<td style="background: #bed2f3;"><?php echo $daywise['cases_time_series'][$i]['totalconfirmed']."<br>"; ?></td>

				<td style="background: #ffe493;"><?php echo $daywise['cases_time_series'][$i]['dailyconfirmed']."<br>"; ?></td>

				<td style="background: #9ED9CCff;"><?php echo $daywise['cases_time_series'][$i]['dailyrecovered']."<br>"; ?></td>

				<td style="background: #fc95c6;"><?php echo $daywise['cases_time_series'][$i]['dailydeceased']."<br>"; ?></td>

				<td style="background: #88d28b;"><?php echo $daywise['cases_time_series'][$i]['totalrecovered']."<br>"; ?></td>

				<td style="background: #ffb7c7;"><?php echo $daywise['cases_time_series'][$i]['totaldeceased']."<br>"; ?></td>
			</tr>
			<?php  $i++;  }  ?>


			<!-- passing  true as a second argument to json_decode()
			when you do this instead of object you will get associative arrays -array with strings for  again you can acces the elements therefor as usual. eg $array['key']-->
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

<script type="text/javascript">
	
	//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>

</body>
</html>