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
	<div id="content2" style="display:block;">
	 <div class="title">RANKING</div>
	 <div style="padding:15px;">
        <?php
        $playerq=$mysql->query('SELECT * FROM `users` WHERE `wonp`>0 ORDER BY `wonp` DESC LIMIT 15');


        if(isset($_SESSION['steamid']) && !empty($_SESSION['steamid']))
        {
            $userinfoq=$mysql->query('SELECT * FROM `users` WHERE `steamid`="'.$mysql->real_escape_string($_SESSION['steamid']).'"');
            if($userinfoq->num_rows>0){
                $userinfo=$userinfoq->fetch_assoc();

                if(empty($userinfo['name'])){
                    $userinfo['name']=$userinfo['steamid'];
                }
                echo'<table width="100%" cellspacing="0">';
                echo'<tr style="background-color:#F7F7F7;">';
                            echo'<td style="text-align:right;width:5%;">';
                            echo'</td>';
                            echo'<td style="text-align:left;width:45%;">';
                            echo '<h1>YOUR STATS</h1>';
                            echo'</td>';

                            echo'<td style="text-align:right;font-weight:bold;width:40%;">';
                            echo'<h1>GAMES</h1>';
                            echo'</td>';
                            echo'<td style="text-align:center;font-weight:bold;width:10%;">';
                            echo'<h1>WON</h1>';
                            echo'</td>';
                echo'</tr>';
                echo'<tr style="background-color:#F7F7F7;">';
                    echo'<td style="text-align:right;width:5%;">';
                    echo'<img src="'.$userinfo['avatar'].'" style="width:50px;height:50px"/>';
                    echo'</td>';
                    echo'<td style="text-align:left;width:45%;">';
                    echo '<a href="http://steamcommunity.com/profiles/'.$userinfo['steamid'].'">'.htmlspecialchars(antispam($userinfo['name'])).cc($userinfo['steamid']).'</a>';
                    echo'</td>';
                    echo'<td style="text-align:right;font-weight:bold;width:40%;">';
                    echo myround($userinfo['games']);
                    echo'</td>';
                    echo'<td style="text-align:center;font-weight:bold;width:10%;">$';
                    echo myround($userinfo['wonp']);
                    echo'</td>';


                echo'</tr>';
                echo'<tr><td colspan="4"><br/></td></tr>';
                echo'</table>';
            }
        }

        echo'<table width="100%" cellspacing="0">';
        echo'<tr>';
                    echo'<td style="text-align:right;width:5%;">';
                    echo'</td>';
                    echo'<td style="text-align:left;width:45%;">';
                    echo '<h1>PLAYER</h1>';
                    echo'</td>';

                    echo'<td style="text-align:right;font-weight:bold;width:40%;">';
                    echo'<h1>GAMES</h1>';
                    echo'</td>';
                    echo'<td style="text-align:center;font-weight:bold;width:10%;">';
                    echo'<h1>WON</h1>';
                    echo'</td>';
        echo'</tr>';
        while($player=$playerq->fetch_assoc()){
                if(empty($player['name'])){
                    $player['name']=$player['steamid'];
                }

                echo'<tr>';
                    echo'<td style="text-align:right;width:5%;">';
                    echo'<img src="'.$player['avatar'].'" style="width:50px;height:50px"/>';
                    echo'</td>';
                    echo'<td style="text-align:left;width:45%;">';
                    echo '<a href="http://steamcommunity.com/profiles/'.$player['steamid'].'">'.htmlspecialchars(antispam($player['name'])).cc($player['steamid']).'</a>';
                    echo'</td>';
                    echo'<td style="text-align:right;font-weight:bold;width:40%;">';
                    echo myround($player['games']);
                    echo'</td>';
                    echo'<td style="text-align:center;font-weight:bold;width:10%;">$';
                    echo myround($player['wonp']);
                    echo'</td>';

                echo'</tr>';
        }
        echo'</table>';

        ?>
    </div>

<?php

require 'include/footer.php';

?>