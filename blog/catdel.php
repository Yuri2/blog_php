<meta charset="utf8">
<?php 
	$cat_id=$_GET['cat_id'];
	if(!is_numeric($cat_id)){
		echo '参数不合法';
		exit();
	}
	$conn=mysqli_connect('localhost','root','root','blog');
	mysqli_query($conn,'set names utf8');
	if(!$conn){
		die('连接错误: '.mysqli_query_error());
	}

	//栏目是否合法id
	$mysql="select * from cat where cat_id=$cat_id";
	$rs=mysqli_query($conn,$mysql);
	$result=mysqli_num_rows($rs);
	if($result<0){
		echo "栏目不存在";
		exit();
	}
	//栏目有文章
	$mysql="select * from art where cat_id=$cat_id";
	$rs=mysqli_query($conn,$mysql);
	$result=mysqli_num_rows($rs);
	if($result>0){
		echo "栏目有文章 请先删除";
		exit();
	}
	//删除数据
	$sql="delete from cat where cat_id=$cat_id";
	if(mysqli_query($conn,$sql)){
		echo "删除成功";
	}else{
		echo "删除失败";
	}
 ?>