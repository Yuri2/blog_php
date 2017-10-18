<meta charset="utf-8" >
<?php 
	$conn=mysqli_connect('localhost','root','root','blog');
	mysqli_query($conn,'set names utf8');
	if(!$conn){
		die('连接错误: '.mysqli_query_error());
	}
	$sql="select * from cat";
	$cat=array();
	$rs=mysqli_query($conn,$sql);
	while( $row = mysqli_fetch_assoc($rs) ){
		$cat[]=$row;
	}
	require('./view/admin/catlist.html');
?>