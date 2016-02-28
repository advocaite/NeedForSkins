<?php
$secured=true;
require 'include/config.php';
require 'include/functions.php';
require 'steamauth/steamauth.php';
if(isset($_SESSION['steamid'])) {
	require 'steamauth/userInfo.php'; //To access the $steamprofile array
}

$mysql=@new mysqli($db['host'],$db['user'],$db['pass'],$db['name']);

if($mysql->connect_errno)
{
	die('Database connection could not be established. Error number: '.$mysql->connect_errno);
}

require 'include/header.php';

?>
<style type="text/css">
.partnerimg {
		max-width: 160px;

	}
.flagimg {
	display:inline-block;
	height:22px;
	width:22px;
}
</style>
	<div id="content2">
	 <div class="title">PARTNERS</div>
	 <div style="padding:15px">
		<h1>Youtube/Twitch partners:</h1>
		<?php

foreach($ccs as $ccid=>$cc){
	$basetemplate='<a href="'.$cc['url'].'" target="_blank"><img src="'.$cc['icon'].'" alt=""/> '.$cc['title'].'</a>'.(isset($cc['desc']) ? ' <small>'.$cc['desc'].'</small>' :'');

	//var_dump($cc);
	if($cc['type']=='twitch' && ($twitchinfo = json_decode(@file_get_contents('https://api.twitch.tv/kraken/streams?channel=' . $cc['tname']), true))!==null && !empty($twitchinfo['streams'][0]['preview']['small'])){
		echo'<table><tr>';
		echo'<td>';
		echo'<img src="'.$twitchinfo['streams'][0]['preview']['small'].'" alt="" style="height:36px"/>';
		echo'</td><td>';
		echo $basetemplate;
		echo'&nbsp;<small><b style="color:red;">LIVE</b></small><br/><small>'.$twitchinfo['streams'][0]['viewers'].' viewers</small>';
		echo'</td>';
		echo'</tr></table><br/>';
	}else{
		$collect.=$basetemplate.'<br/><br/>';
	}
}
	echo $collect;
		?>
		<br/>
		<h1>We previously worked with teams like:</h1>
		<table>
			<tr>
				<td align="center">
					<img src="<?=$site['static']?>/img/partners/Germany.png" class="flagimg" alt=""/> <b>EYES ON U</b><br/>
					<img src="<?=$site['static']?>/img/partners/eou.png" class="partnerimg" alt=""/>
				</td>
				<td align="center">
					<img src="<?=$site['static']?>/img/partners/Estonia.png" class="flagimg" alt=""/> <b>HD4R</b><br/>
					<img src="<?=$site['static']?>/img/partners/hd4r.png" class="partnerimg" alt=""/>
				</td>
				<td align="center">
					<img src="<?=$site['static']?>/img/partners/Portugal.png" class="flagimg" alt=""/> <b>offSystem</b><br/>
					<img src="http://i.imgur.com/tcEdeTl.jpg" class="partnerimg" alt=""/>
				</td>
			</tr>
		</table>

		<br/>
		</div><div class="title">How do I get partnered/sponsored?</div><div style="padding:15px">

		<h1>Partnership</h1>
		If you are a content creator (youtuber/twitch streamer) we can promote your channel on this page and in the site's sidebar (main page) in exchange for promoting our website (<?=$site['name']?>) on your channel. For more information about this contact us by <a href="https://needforskinscom.freshdesk.com/support/tickets/new">opening a ticket</a>.<br/><br/>

		<h1>Sponsorship</h1>
		If you are in charge of a CS:GO team and you are interested in getting sponsored, contact us at <u>contact@needforskins.com</u>
	 </div>
	</div>

<?php

require 'include/footer.php';

?>