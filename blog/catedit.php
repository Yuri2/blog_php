<meta charset="utf8">
<?php 
	$cat_id=$_GET['cat_id'];
	$conn=mysqli_connect('localhost','root','root','blog');
	mysqli_query($conn,'set names utf8');
	if(!$conn){
		die('连接错误: '.mysqli_query_error());
	}
	if(empty($_POST)){
		$sql="select catname from cat where cat_id=$cat_id";
		$rs=mysqli_query($conn,$sql);
		$cat=mysqli_fetch_array($rs);
		if($cat!=''){
			require("./view/admin/catedit.html");
		}
	}else{
		$sql="update cat set catname='$_POST[catname]' where cat_id=$cat_id";
		if(mysqli_query($conn,$sql)){
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}
 ?>