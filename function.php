<?php
include 'api_key.php';
include 'region.php';

//get summoner name from form
$summoner_name = $_POST['summonername'];

//converts summoner name into summoner ID
	//get api packet for summoner ID
	$summoner_id_url = "https://na.api.pvp.net/api/lol/$region/v1.4/summoner/by-name/$summoner_name?api_key=$api_key";
	//convert json to php
	$response_summoner_id = file_get_contents($summoner_id_url, true);
	//parse it
	$parsed_summoner_id = json_decode($response_summoner_id);
	//get summoner ID from packet
	$summoner_id = $parsed_summoner_id->$summoner_name->id;

//test summoner name has been converted to ID
echo "$summoner_id<br><br>";

//gets current match data
	//get api packet for current match
	$current_match_url = "https://na.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/NA1/$summoner_id?api_key=$api_key";
	//convery json to php
	$response_current_match = file_get_contents($current_match_url, true);
	//parse it
	$parsed_current_match = json_decode($response_current_match);
	//session storage array
	$match_players = array();
	//store summoner name, summoner ID, and champ into session storage array
	foreach ($parsed_current_match->participants as $k) {
		$match_players['$k'] = array("Name"=>$k['summonerName'], "ID"=>$k['summonerId'], "Champion"=>$k['championId']);
	};
