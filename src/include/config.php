<?php
if(!isset($secured)){ die('Not authorized.'); }

$accesspassword='anythingyoudonthavetorememberthisshit'; //set this up in bot_source as well, for accessing /cost.php, /endgame.php

//** DATABASE **//
$db=array( //mysql credentials
			'host'		=>		'localhost',
			'user'		=>		'',
			'pass'		=>		'',
			'name'		=>		'',
	);

//** SITE DETAILS (URL/NAME/DESCRIPTION) **//
$site=array(
		'url'			=>			'http://needforskins.com',
		'static'		=>			'http://needforskins.com/static', //get a subdomain static.site.com with /static/ path to host static files like css,js,images - helps with loading times
		'name'			=>			'NeedForSkins.com',
		'sitenameinusername'	=>			'needforskins.com', //what people need to have in their steam name to get +5% to winnings (5% comission instead of 10)
		'description'		=>			$l->description,
		'depositlink'		=>			'https://steamcommunity.com/tradeoffer/new/?partner=171381862&token=K5V8nwrT',
		'maxitems'		=>			50, //max items in a round
		'minvalue'		=>			'0.50', // in $, float values supported. you need to edit this info in the bot_source as well.
		'maxbet'		=>			10, //max number of items a person can deposit in a round
		'gametime'		=>			75,
		'gamedbprefix'		=>			'z_round_',
	);

$adminslist=array(
		'76561198065442530', // people that can access /admin.php while logged in
		'76561198065442530', //
	);

header("Access-Control-Allow-Origin: ".$site['static']); //fonts from static. subdomain won't load without this

$prf=$site['gamedbprefix'];


$ccs=array( //content creators
	''=>array( //twitch template
		'type'=> '',
		'tname'=> '',

		//
		'title'=> '',
		'desc'=>  '',

		//for play sidebar
		'url'=> '',
		'icon'=> 'http://i.imgur.com/xup9Jyr.png',
	),

	''=>array( //yt template
		'type'=> 'youtube',

		'title'=> '',
		'desc'=>  '',

		//for play sidebar
		'url'=> '/',
		'icon'=> 'http://i.imgur.com/tKEcY5C.png',
	),
	
);


//dev
$allowips=array( //if you only want to allow certain ips to access the site (kinda like a developer mode), uncomment the line under this
	'127.0.0.1', //server
	'', //ads

	);
if(!in_array($_SERVER['REMOTE_ADDR'], $allowips)){
	//die('Coming soon...');

}
