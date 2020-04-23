<?php

 include 'dbcon.php' ;

if(isset($_POST['submit'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$coronasym = $_POST ['coronasym'];
    $msg = $_POST['msg'];

    $chk = "";
    foreach ($coronasym as $chk1) {
    	$chk .= $chk1."," ;
    }


      $insertquery = " INSERT INTO corona_case (username,email,mobile,coronasym,msg) VALUES ('$username','$email','$mobile','$chk','$msg') ";

      $result = mysqli_query($conn ,$insertquery);
     if($result){
 	?>

 	<script type="text/javascript">
 		alert('inserted successful');
 	</script>

 <?php }


 else {
 	?>
 	<script type="text/javascript">
 		alert('No inserted');
 	</script>

 	<?php
 }
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include 'link/links.php' ; ?>
  <?php include 'css/style.php'; ?>
 <style type="text/css">
 	/* Google Fonts */
@import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);

/* Global */
.line-1{
    position: relative;
    margin: 0 auto;
    font-size: 180%;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    transform: translateY(-50%);    
}

/* Animation */
.anim-typewriter{
  animation: typewriter 4s steps(44) 1s 1 normal both,
             blinkTextCursor 500ms steps(44) infinite normal;
}
@keyframes typewriter{
  from{width: 0;}
  to{width: 24em;}
}
@keyframes blinkTextCursor{
  from{border-right-color: transparent;}
  to{border-right-color: transparent;}
}
 </style>

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


<div class="main_header">
	<div class="row w-100 h-100">
		<div class="col-lg-5 col-md-5 col-12 order-lg-1 order-2">
			
			<div class="leftside w-100 h-100 d-flex justify-content-center align-items-center">
				<img src="images/pic 1.png"width="300" height="300">
			</div>
		</div>

		<div class="col-lg-7 col-md-7 col-12 order-lg-2 order-1">
			<div class="rightside w-100 h-100 d-flex justify-content-center align-items-center">
				<h1>Let's Stray Safe & Fight Together Against Cor
					<span class="corona_rotate">
					<img src="images/corona.png" width="80" height="80">
				</span>
			na Virus</h1>
			</div>
		</div>

	</div>
</div>

<!-- corona latest updates  using api-->
<section class="corona_update container-fluid">
	<div class="mb-3">
		
<?php 

$data = file_get_contents('https://api.covid19india.org/data.json');

$coronalive = json_decode($data ,true);

$states_count =count($coronalive['statewise']);

$i =0;
while ($i < 1) 
{
  ?>

<h3 class="line-1 anim-typewriter text-uppercase text-center mb-5">covid-19 updates</h3>
<p class="text-center">
	<span class="fa fa-clock-o blinking" aria-hidden="true" style="font-size:20px;color:red">&nbsp;Last update&nbsp;<?php echo $coronalive['statewise'][$i]['lastupdatedtime']  ; ?></span>
</p>

<div class="d-flex justify-content-around align-items-center">

	<div class="">
		
		<h1 class="count text-danger"><?php echo $coronalive['statewise'][$i]['confirmed']  ; ?></h1>
		<p>Total Confirmed</p>
	</div>

	<div class="">
		<h1 class="count text-success"><?php echo $coronalive['statewise'][$i]['recovered']  ; ?></h1>
		<p>Total Recovered</p>
	</div>

	<div class="">
		<h1 class="count text-warning"><?php echo $coronalive['statewise'][$i]['deaths']  ; ?></h1>
		<p>Total Deaths</p>
	</div>

	<div class="">
		<h1 class="count text-primary"><?php echo $coronalive['statewise'][$i]['active']  ; ?></h1>
		<p>Total Active</p>
	</div>
</div>

<?php
  $i++;
}
?>
</section>

<!-- about section -->
<div class="container-fluid sub_section pt-5 pb-5" id="aboutid">
	
	<div class="section_header text-center mb-5 mt-4">
		<h1>About Covid-19</h1>
	</div>

	<div class="row pt-5">
		<div class="col-lg-5 col-md-6 col-12 ml-5 about_res">
			<img src="images/corona1.png" class="img-fluid">
		</div>
<div class="col-lg-6 col-md-6 col-12">
	<h2>What is COVID-19 (Corona Virus)</h2>
	<p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.

Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>
<p>The best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face.</p>
</div>

	</div>
</div>

           <!-- Cronovirus Symptoms section -->
           <div class="container-fluid pt-5 pb-5" id="sympid">
	
	<div class="section_header text-center mb-5 mt-4">
		<h1>Cronovirus Symptoms</h1>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-12 mt-5">
				<figure class="text-center">
				<img src="images/caugh.png" class="img-fluid" width="120" height="120">
				<figcaption>cough</figcaption>
			</figure>
			</div>

			<div class="col-lg-4 col-md-4 col-12 mt-5">
				<figure class="text-center">
				<img src="images/running nose.png" class="img-fluid" width="120" height="120">
				<figcaption>running nose</figcaption>
			</figure>
			</div>

			<div class="col-lg-4 col-md-4 col-12 mt-5">
				<figure class="text-center">
				<img src="images/fever.jpg" class="img-fluid" width="120" height="120">
				<figcaption>fever</figcaption>
			</figure>
			</div>

			<div class="col-lg-4 col-md-4 col-12 mt-5">
				<figure class="text-center">
				<img src="images/cold.jpg" class="img-fluid" width="120" height="120">
				<figcaption>cold</figcaption>
			</figure>
			</div>

			<div class="col-lg-4 col-md-4 col-12 mt-5">
				<figure class="text-center">
				<img src="images/tiredness.jpg" class="img-fluid" width="120" height="120">
				<figcaption>tiredness</figcaption>
			</figure>
			</div>

			<div class="col-lg-4 col-md-4 col-12 mt-5">
				<figure class="text-center">
				<img src="images/breathing.png" class="img-fluid" width="120" height="120">
				<figcaption>difficulty in breathing</figcaption>
			</figure>
			</div>

		</div>
	</div>
</div>


<!-- Prevention Against Cronovirus -->

           <div class="container-fluid sub_section pt-5 pb-5" id="preventid">
	
	<div class="section_header text-center mb-5 mt-4 mt-5">
		<h1> 6 Steps Prevention Against Cronovirus</h1>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-4 col-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<figure class="text-center">
				<img src="images/handwash.png" class="img-fluid" width="90" height="90">
				
			</figure>

					</div>

                     <div class="col-lg-8 col-md-8 col-12 mt-5">
                     	<p>Wash your hands regularly for 20 sec with soap and water or alcohol-based hand rub</p>
                     </div>

				</div>
			</div>

			<div class="col-lg-4 col-4 col-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<figure class="text-center">
				<img src="images/mask.jpeg" class="img-fluid" width="90" height="90">
				
			</figure>

					</div>

                     <div class="col-lg-8 col-md-8 col-12 mt-5">
                     	<p>Cover your nose and mouth with a disposable tissue or fixed elbow when you cough or sneeze</p>
                     </div>

				</div>
			</div>

			<div class="col-lg-4 col-4 col-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<figure class="text-center">
				<img src="images/distance.webp" class="img-fluid" width="90" height="90">
				
			</figure>

					</div>

                     <div class="col-lg-8 col-md-8 col-12 mt-5">
                     	<p>Avoid close contact(1 meter or 3 feet) with people who are unwell</p>
                     </div>

				</div>
			</div>

			<div class="col-lg-4 col-4 col-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<figure class="text-center">
				<img src="images/strayhome.png" class="img-fluid" width="90" height="90">
				
			</figure>

					</div>

                     <div class="col-lg-8 col-md-8 col-12 mt-5">
                     	<p>Stay home and self-isolated from others in the household if you feel unwell</p>
                     </div>

				</div>
			</div>

			<div class="col-lg-4 col-4 col-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<figure class="text-center">
				<img src="images/news.png" class="img-fluid" width="90" height="90">
				

			</figure>

					</div>

                     <div class="col-lg-8 col-md-8 col-12 mt-5">
                     	<p>Stay informed by watching news & follow the recommended practices</p>
                     </div>

				</div>
			</div>

			<div class="col-lg-4 col-4 col-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<figure class="text-center">
				<img src="images/feelingcold.jpg" class="img-fluid" width="90" height="90">
				
			</figure>

					</div>

                     <div class="col-lg-8 col-md-8 col-12 mt-5">
                     	<p>If you have fever,caugh and difficulty breathing, seek medical care early</p>
                     </div>

				</div>
			</div>


		</div>
	</div>
</div>

             <!-- contact us -->

<div class="container-fluid pt-5 pb-5" id="contactid">
	
	<div class="section_header text-center mb-5 mt-4">
		<h1> Contact Us Asap</h1>
	</div>

<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 col-12">
			
     <form method="post" action="">

      <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username" placeholder="Name" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email" placeholder="name@example.com" autocomplete="off" required>
  </div>
  
  
<div class="form-group">
    <label >Mobile</label>
    <input type="number" class="form-control" maxlength="10" name="mobile" placeholder="Mobile" autocomplete="off" required>
  </div>

  <div class="form-group">
  	<label>Select Symptoms</label><br>

  	<div class="custom-control custom-checkbox custom-control-inline text-capitalize">
  		<input type="checkbox" class="custom-control-input" id="customcheckbox1" name="coronasym[]" value="cold">
  		<label class="custom-control-label" for="customcheckbox1">Cold</label>
  	</div>


  	<div class="custom-control custom-checkbox custom-control-inline text-capitalize">
  		<input type="checkbox" class="custom-control-input" id="customcheckbox2" name="coronasym[]" value="fever">
  		<label class="custom-control-label" for="customcheckbox2">Fever</label>
  	</div>


  	<div class="custom-control custom-checkbox custom-control-inline text-capitalize">
  		<input type="checkbox" class="custom-control-input" id="customcheckbox3" name="coronasym[]" value="difficulty in breath">
  		<label class="custom-control-label" for="customcheckbox3">Difficulty In Breath</label>
  	</div>


  	<div class="custom-control custom-checkbox custom-control-inline text-capitalize">
  		<input type="checkbox" class="custom-control-input" id="customcheckbox4" name="coronasym[]" value="feeling weak">
  		<label class="custom-control-label" for="customcheckbox4">Feeling Weak</label>
  	</div>

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg" required></textarea>
  </div>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>

</form>

		</div>
	</div>
</div>

</div>

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