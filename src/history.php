<?php
$secured=true;
require 'include/config.php';
require 'include/functions.php';
require 'steamauth/steamauth.php';
if(isset($_SESSION['steamid'])) {
	require 'steamauth/userInfo.php'; //To access the $steamprofile array
}

$mysql=@new mysqli($db['host'],$db['user'],$db['pass'],$db['name']);
$mysql->set_charset('utf8mb4'); 

if($mysql->connect_errno)
{
	die('Database connection could not be established. Error number: '.$mysql->connect_errno);
}

require 'include/header.php';

?>
	<div id="content2">
	 <div class="title">ROUND HISTORY</div>
	 <div style="padding:15px">
        <?php

        $currentgame=$mysql->query('SELECT `value` FROM `info` WHERE `name`="current_game"')->fetch_assoc();
        $currentgame=(int)$currentgame['value'];

        $total=$mysql->query('SELECT * FROM `games` WHERE `id`<"'.$currentgame.'" AND `id`>1')->num_rows;

        $page=(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page']>0 && $_GET['page']<$total) ? (int)$_GET['page'] : 1;
        $perpage=15;
        $roundq=$mysql->query('SELECT * FROM `games` WHERE `id`<"'.$currentgame.'" AND `id`>1 ORDER BY `id` DESC LIMIT '.(($page-1)*$perpage).','.$perpage);


        //http://mis-algoritmos.com/digg-style-pagination-class
        $p = new pagination;
        $p->Items($total);
        $p->limit($perpage);
        $p->currentPage($page);
        $p->nextLabel('');//removing next text
        $p->prevLabel('');//removing previous text
        $p->nextIcon('&#9658;');//Changing the next icon
        $p->prevIcon('&#9668;');//Changing the previous icon

        $p->show();

        echo'<table>';
        while($round=$roundq->fetch_assoc()){
            if($round['totalvalue']>0){
                echo'<tr><td><br/><b>Round ID #'.$round['id'].'</b></td></tr>';
                if(!$winnerinfo=$mysql->query('SELECT * FROM `users` WHERE `steamid`="'.$round['winneruserid'].'"')->fetch_assoc()){
                    $winnerinfo['name']=empty($winnerinfo['name']) ? $round['winneruserid'] : $winnerinfo['name'];
                    $winnerinfo['avatar']=$site['static'].'/img/defaultavatar.jpg';
                }
                $deposit=$mysql->query('SELECT SUM(`value`) AS `total` FROM `'.$prf.$round['id'].'` WHERE `userid`="'.$round['winneruserid'].'"')->fetch_assoc();
                $deposit=$deposit['total'];
                $chance=$deposit/$round['totalvalue']*100;

                echo'<tr>';
                    echo'<td><img src="'.$winnerinfo['avatar'].'" alt="." style="height:120px;width:120px"/></td>';
                    echo'<td>';
                    echo'<table>';
                    echo'<tr><td><b><a href="http://steamcommunity.com/profiles/'.$round['winneruserid'].'" target="_blank">'.htmlspecialchars(antispam($winnerinfo['name'])).cc($winnerinfo['steamid']).'</a></b></td></tr>';
                    echo'<tr><td>Won <b>$'.myround($round['totalvalue']).'</b> with a $'.myround($deposit).' deposit ('.myround($chance).'% chance)</td></tr>';
                    echo'<tr>';
                    echo'<td style="color:lightgray;">hash: '.$round['hash'].'<br/>secret: '.$round['secret'].'<br/>winning ticket at: '.$round['winnerpercent'].'%<br/>winning ticket: '.floor((floor((float)$round['winnerticket'] * 100) / 100)*100).' (<a href="provablyfair.php?hash='.$round['hash'].'&amp;secret='.$round['secret'].'&amp;roundwinpercentage='.$round['winnerpercent'].'&amp;totaltickets='.$round['totalvalue'].'" target="_blank">√</a>)</td>';
                    echo'</tr>';
                    echo'</table>';
                    echo'</td>';
                    echo'<td style="padding-left:10px;font-size:80%;border-left:1px solid lightgray">';

                    $items=$mysql->query('SELECT * FROM `'.$prf.$round['id'].'` ORDER BY `id` ASC');
                    $itemsnum=$items->num_rows;

                    echo $itemsnum.' items deposited (items with a gray background were deposited by the winner):<br/>';

                    while($item=$items->fetch_assoc()){
                        $countitems=$countitems+1;
                        echo'<img src="http://steamcommunity-a.akamaihd.net/economy/image/'.$item['image'].'/105fx98f" title="$'.$item['value'].'<br/>'.str_replace('?','&#9733;',$item['item']).'" style="max-width:70px;cursor:hand;'.(($item['userid']==$round['winneruserid']) ? 'background-color:lightgray;' : '').'"/>';
                        if(in_array($countitems, array(8,16,24,32,40,48))){
                            echo'<br/>';
                        }
                    }
                    $countitems=0;

                    echo'</td>';
                echo'</tr>';
            }else{
            }

        }
        echo'</table>';

        $p->show();

        ?>
    </div>
</div>

<?php

require 'include/footer.php';

?>