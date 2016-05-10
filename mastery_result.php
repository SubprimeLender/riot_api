<!DOCTYPE html>
<html>

<title>Champselect.info</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="custom_styles.css">
</head>

<body>
<?php
	include 'function.php';
	include 'ddragon_version_url.php';
	include 'champion_reference.php';
	//split $match_players into first 5 top team and last 5 bottom team
	$match_teams = array_chunk($match_players, 5);
?>
<!-- Top of page heading -->
<div id="logo" class ="container text-center">
	<a href="/kappa/"><img src="imgs/KappaLogo.png"></a>
</div>
<div class="container-fluid">
	<div class="row text-center">
		<div id="top-team" class="container center">
			<?php
			foreach($match_teams[0] as $k) {
				echo "<div class='champ-container col-lg-2 col-md-2' style='background-image:url(http://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $champion_reference[$k["Champion"]] . "_0.jpg)';></div>";	
				};
			foreach($match_teams[0] as $k) {
				echo "<div class='name-container well col-lg-2 col-md-2'><b>" . $k['Name'] . "</b></div>";	
				};
			?>
		</div>
		<hr>
		<div id="bottom-team" class="container center">
			<?php
			foreach($match_teams[1] as $k) {
				echo "<div class='name-container well col-lg-2 col-md-2'><b>" . $k['Name'] . "</b></div>";	
				};
			foreach($match_teams[1] as $k) {
				echo "<div class='champ-container col-lg-2 col-md-2' style='background-image:url(http://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $champion_reference[$k["Champion"]] . "_0.jpg)';></div>";	
				};
			?>
		</div>
	</div>
</div>

</body>
</html>
