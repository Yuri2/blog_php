<?php 
	require('./lib/init.php');
	$sql="select art_id,title,pubtime,comm,cat.catname from art left join cat on art.cat_id=cat.cat_id";
	$arts=mGtall($sql);
	include(ROOT.'/view/admin/artlist.html');
?>