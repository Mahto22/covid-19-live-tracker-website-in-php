<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <?php include 'link/links.php' ; ?>
  <?php include 'css/style.php'; ?>
 
</head>
<body onload="fetch()">

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


<!-- corona latest updates  using api-->
<section class="corona_update container-fluid">
  <div class="mb-3">
    
<h3 class="text-uppercase text-center">covid-19 live updates of the world</h3>
  </div>

  <div class="table table-responsive">
    <table class="table-bordered table-striped text-center table table-responsive table-hover w-100 d-block d-md-table justify-content-center align-items-center" id="tbvalue">
      <thead>
      <tr>
        <th>Country</th>
        <th>TotalConfirmed</th>
        <th>TotalRecovered</th>
        <th>TotalDeaths</th>
        <th>NewConfirmed</th>
        <th>NewRecovered</th>
        <th>NewDeaths</th>
      </tr>
    </thead>
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

// countries covid data api fetch
function fetch(){
  $.get("https://api.covid19api.com/summary",
    function(data){
      //console.log(data['Countries'].length);
      var tbvalue = document.getElementById('tbvalue');
      for(var i=1; i<data['Countries'].length; i++){
        var x = tbvalue.insertRow();
        x.insertCell(0);
        tbvalue.rows[i].cells[0].innerHTML= data['Countries'][i-1]['Country'];
        tbvalue.rows[i].cells[0].style.background ='#7a4a91';
        tbvalue.rows[i].cells[0].style.color ='#fff';

                x.insertCell(1);
        tbvalue.rows[i].cells[1].innerHTML= data['Countries'][i-1]['TotalConfirmed'];
        tbvalue.rows[i].cells[1].style.background ='#4bb7d8';


         x.insertCell(2);
        tbvalue.rows[i].cells[2].innerHTML= data['Countries'][i-1]['TotalRecovered'];
        tbvalue.rows[i].cells[2].style.background ='#4bb7d8';

        x.insertCell(3);
        tbvalue.rows[i].cells[3].innerHTML= data['Countries'][i-1]['TotalDeaths'];
        tbvalue.rows[i].cells[3].style.background ='#f36e23';


                 x.insertCell(4);
        tbvalue.rows[i].cells[4].innerHTML= data['Countries'][i-1]['NewConfirmed'];
        tbvalue.rows[i].cells[4].style.background ='#4bb7d8';


        x.insertCell(5);
        tbvalue.rows[i].cells[5].innerHTML= data['Countries'][i-1]['NewRecovered'];
        tbvalue.rows[i].cells[5].style.background ='#9cc850';

        x.insertCell(6);
        tbvalue.rows[i].cells[6].innerHTML= data['Countries'][i-1]['NewDeaths'];
        tbvalue.rows[i].cells[6].style.background ='#f36e23';
      }

    }
    );
}
</script>

</body>
</html>