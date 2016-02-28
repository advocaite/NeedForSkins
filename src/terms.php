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
	<div id="content2">
	 <div class="title">TERMS OF SERVICE:</div>
	 <div style="padding:15px">

<?php 
$terms='Any inquiries about our ToS can be sent to: contact@needforskins.com

<b>Introduction:</b>
These terms and conditions govern your use of our website; by using our website, you acknowledge and agree with our terms and conditions in with and without reservation. If any disagreements with our terms and conditions or parts of the terms and conditions, you must discontinue usage, interaction and any association/affiliation with any direct or indirect linked systems. Those with connections to Valve corporation or Steam, or any connected platforms must automatically discontinued with this website in any form and/or their owners.
This document throughout refers the website as: www.needforskin.com, www.needforskins.com, N4S, NFS. Any other forms may be used throughout the website and the user acknowledges that in case of any confusions conflicting with our terms. 

We reserve the rights to change this document without notice. By using this website, you agree that any limitations set upon our terms and conditions are reasonable, otherwise must leave the site.

Users on this site must be at least 18/21 (EIGHTEEN/TWENTY-ONE) years of age. By using this website and by agreeing to these terms and conditions, you warrant and represent that you are at 18/21 years old depending on location. NFS has the rights to request identification of age in order to prevent under-aged gambling. We have the rights to temporarily freeze your account during this process.

<b>License of Usage:</b>
NFS and anything associated throughout the website owns the intellectual property and material rights published on this website unless otherwise stated. Distribution in any form without consent is prohibited.
Distribution includes: profiting, distribution, republishing, duplicating/editing any part or section of NFS without consent.
When consent is released for availability/distribution, the rights lie only for the organization and none else.

<b>Website Status:</b>
By using our service, you agree to the website status being “AS-IS” or “AS-AVAILABLE”. There are no guarantees for any activity that is promised on this site. We reserve the rights to change any aspect of the website or terms and conditions whenever and without consent.

<b>Acceptable Usage:</b>
You must not use any parts of this website that may or can cause damage or impairment of the availability or accessibility of NFS or in any way that is illegal, unlawful, fraudulent, harmful or in any connections or variations. This website must not be used to harm any users in any possible way through both malicious software and data mining/extraction or in any similar variations.

<b>User Privacy:</b>
Accounts that are logged through Steam platform (no associations) must be your own. User privacy is kept under confidentiality if provided, including all aspects of any jackpot logs and will not be distributed in any way or form externally. Any suspicions upon stolen accounts will be temporarily suspended without notice. All public information provided by the user might be used throughout the site (ex: Steam Name, Steam Picture, etc.)

<b>Limitations of liability:</b>
NFS will not be liable to the user (whether under the law of contract, law of torts or otherwise) in relation to the contents of, usage of, or any connection with this website. We are not responsible for any direct or indirect loss (including any business losses, revenue, income, profits or anticipated savings, loss of contracts or business relationships/reputation or goodwill, loss or corruption of info/data)

<b>Commission:</b>
This website takes 10% of overall commission (5% with needforskins.com) for the purpose of upkeep, advertising, promotions and more. We will never take more than the listed amount unless there is a mistake in our system. Users are guaranteed their deposit back without commission raking out of the pile. There is no arguing over commission. 

<b>Jackpot Conditions:</b>
Jackpot winners have up to 3 hours to retrieve their item when the offer is sent, to ensure bot availability. Users are dependent to know the round number to retrieve their lost jackpots or deposits through support. Missing items are kept up to 7 days. Any support may take up to 3-5 business days. By playing on our website, you understand that all jackpots and deposits are final. Users who abuse the support system or have lost on a ghost round of items are not ensured their items returned. Abusers of this website in any form will be frozen without any warning. We refuse the rights to fill your report if you do not provide us with sufficient evidence of your missing items upon our say.
Any personal attacks or threats in any way or form towards denaming NFS will get your account terminated/frozen without notice. A unban from our website would require a public apology set up by staff members of NFS upon further notice throughout contact.

<b>Price valuation:</b>
Skins deposited through NFS are valued by SteamAnalyst’s pricing database and the Steam Market. Prices are subjected to change at any time without warning or notice. 

<b>Losses:</b>
NFS is not liable for any losses. By playing this website, you acknowledge the risks and take responsibility for all losses subjected. You agree that your skins will be sent to other users if lost or otherwise stated. Bet responsibly and know the limits of betting. All skins deposited on this website are final.

<b>Accepted Skins:</b>
NFS currently only allow deposited from the game “Counter-Strike: Global Offensive” or “CS:GO” (no affiliations). Skins deposited must be of the depositor’s ownership. Souvenir weapons are not accepted unless otherwise stated. We are not responsible for losses of stickers that are already attached to skins.

<b>Indemnification:</b>
By using this website, you agree to defend NFS and any members associated against all and any claims, losses, obligations, costs and expenses (including legal expenses and any amounts paid to, by NFS to a third party settlement of a claim or dispute on the advice of NFS’ legal advisers) arisen from breaking any section of our terms and conditions or any claim that you have broken any provisions of our terms and conditions.

<b>Variations:</b>
www.NeedForSkins.com may transfer, sub-contract or change www.NeedForSkins.com’s rights and/or obligations under the terms and conditions on this page without consent or notice. By playing on this website, you agree to the latest updated terms and conditions without argument.

<b>Breach of terms and conditions:</b>
Any breach of terms and conditions will have your account associated terminated/frozen with any virtual skins/assets currently associated with our website without notice. This includes possible IP Address/MAC IP, prohibiting further access towards this website. We are allowed the rights to contact your internet provider to request they block access to this website and/or bring court proceedings against you or any associated.

<b>Affiliations:</b>
We are NOT affiliated in any way or form with the Valve corporation, Steam or Counter-Strike in any variation or form.

<b>Severability:</b>
If any provisions of these current/past terms and conditions associated with NFS is determined by any court or any competent authority to be unlawful or/and unenforceable, the other provisions will continue in effect. If any unlawful or/and unenforceable provisions would be lawful or enforceable if any part(s) were to be deleted, that part will be deemed to be deleted, and the remaining of the provision will continue in effect.

<b>Entire agreement:</b>
The terms and conditions stated on this page, together with NFS’ private policy constitute the entire agreement between you (the user) and NFS in relation to your usage of this website and future/past usage(s), and supersede all previous agreements in respect of your usage of this website.

<b>Laws and jurisdictions:</b>
Our terms and services will be governed by and construed in accordance with the laws of Portugal, and any disputes relating to these terms and conditions will be subject to the exclusive jurisdiction of the courts of Portugal.';

echo nl2br($terms);
?>

</div>

<?php

require 'include/footer.php';

?>