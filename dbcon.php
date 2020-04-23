<?php

$server = 'localhost';
$user ='root';
$password = '';
$db = 'coronadb';

$conn = mysqli_connect($server ,$user ,$password ,$db);

if($conn){
	?>

	<script type="text/javascript">
		alert('connection successful');
	</script>

<?php }


else {
	?>
	<script type="text/javascript">
		alert('No Connection');
	</script>

	<?php
}
?>
	