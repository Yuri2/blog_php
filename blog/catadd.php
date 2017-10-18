<?php 
require('./lib/init.php');
if(empty($_POST)) {
	include(ROOT.'/view/admin/catadd.html');
} else {
	$cat['catname']=trim($_POST['catname']);
	if (empty($cat['catname'])) {
		echo '栏目不能为空';
		exit();
	}
	$sql="select count(*) from cat where catname='$cat[catname]'";
	$rs=mQuery($sql);
	if(mysqli_fetch_row($rs)[0] != 0){
		echo '栏目已存在';
		exit();
	}
	//$sql="insert into cat (catname) value ('$cat[catname]')";
	if(mExec('cat',$cat)){
		echo '栏目插入成功';
	}else{
		echo '栏目插入失败';

	}
}
?>