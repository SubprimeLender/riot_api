<!DOCTYPE html>
<html>

<head>
<title>Champselect.info</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class ="jumbotron jumbotron-fluid">
	<div class ="container text-center">
		<h1>Current Game</h1>
	</div>
</div>
<div class="container">
	<div class="row text-center">
		<div id="top-team" class="col-lg-12 col-md-12 hidden-sm hidden-xs">
			<table class="table">
			<tbody>
				<tr>
					<?php
					foreach($match_teams[0] as $k) {
						echo "<td><img src='http://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $champion_reference[$k["Champion"]] . "_0.jpg' height='270' width='150'></td>";	
					};
					?>
				</tr>
				<tr>
				<?php
					foreach($match_teams[0] as $k) {
						echo "<td>" . $k['Name'] . "</td>";	
					};
					?>
				</tr>
			</tbody>
			</table>
		</div>
		<div id="bottom-team" class="col-lg-12 col-md-12 hidden-sm hidden-xs">
			<table class="table">
			<tbody>
				<tr>
					<?php
					foreach($match_teams[1] as $k) {
						echo "<td>" . $k['Name'] . "</td>";	
					};
					?>
				</tr>
				<tr>
					<?php
					foreach($match_teams[1] as $k) {
						echo "<td><img src='http://ddragon.leagueoflegends.com/cdn/img/champion/loading/" . $champion_reference[$k["Champion"]] . "_0.jpg' height='270' width='150'></td>";	
					};
					?>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>
