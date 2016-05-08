<?php
include 'api_key.php';
include 'region.php';
include 'get_api_function.php';

//get summoner name from form
$summoner_name_encoded = rawurlencode($_POST['summonername']);
$summoner_name = str_replace(" ", "", $_POST['summonername']);
$summoner_name = strtolower($summoner_name);

//convert summoner name into summoner ID
	$parsed_summoner_id = get_api("https://na.api.pvp.net/api/lol/$region/v1.4/summoner/by-name/" . $summoner_name . "?api_key=" . $api_key_mike);
	$summoner_id = $parsed_summoner_id->$summoner_name->id;

//get current match data
	$parsed_current_match = get_api("https://na.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/NA1/" . $summoner_id . "?api_key=" . $api_key_mike);
	//store summoner name, summoner ID, and champ into storage $match_players
	foreach ($parsed_current_match->participants as $data) {
		$match_players[$data->summonerId] = array(
		  "Name"        => $data->summonerName, 
		  "ID"          => $data->summonerId, 
		  "Champion"    => $data->championId,
		  "Team"		=> $data->teamId,
		  );
	};

//gets champion mastery data for all players
foreach ($match_players as $player) {
	$player_id = key($match_players);
	$parsed_champion_mastery = get_api("https://na.api.pvp.net/championmastery/location/NA1/player/" . $player_id . "/champions?api_key=" . $api_key_tony);
	//create array of player's champion masteries 
	$mastery_array = array();
	//store champion masteries {championId => championPoints} into $mastery_array
	foreach ($parsed_champion_mastery as $champ) {
		$mastery_array[$champ->championId] = $champ->championPoints;
	};
	//add to storage $match_players
	array_push($match_players[$player_id], $mastery_array);
};
