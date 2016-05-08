<?php
function get_mastery_function($summonerId) {
	$parsed_champion_mastery = get_api("https://na.api.pvp.net/championmastery/location/NA1/player/" . $summonerId . "/champions?api_key=5e54590d-31c4-4339-ab8f-dc872fd9dffe");
	//create array of particular player's champion masteries 
	$mastery_array = array();
	//store champion masteries into $mastery_array {championId => championPoints} 
	foreach ($parsed_champion_mastery as $champ) {
		$mastery_array[$champ->championId] = $champ->championPoints;
	};
	return $mastery_array;
};