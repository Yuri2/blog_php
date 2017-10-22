<?php 
	require('./lib/init.php');
	$art_id=$_GET['art_id'];

	if(!is_numeric($art_id)){
		succ('文章id不合法');
	}
	$sql="select * from art where art_id=$art_id";
	$rs=mgetRow($sql);
	if(!$rs){
		succ('文章不存在');
	}
	$sql="delete from art where art_id=$art_id";
	if(mQuery($sql)){
		header('location: artlist.php');
		//succ('删除成功');
	}else{
		succ('删除失败');
	}
?>