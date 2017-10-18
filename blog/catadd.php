<?php 
require('./lib/init.php');
if(empty($_POST)) {
	include(ROOT.'/view/admin/catadd.html');
} else {
	$cat['catname']=trim($_POST['catname']);
	if (empty($cat['catname'])) {
		succ('栏目不能为空');
		exit();
	}
	$sql="select count(*) from cat where catname='$cat[catname]'";
	$rs=mQuery($sql);
	if(mysqli_fetch_row($rs)[0] != 0){
		succ('栏目已存在');
		exit();
	}
	//$sql="insert into cat (catname) value ('$cat[catname]')";
	if(mExec('cat',$cat)){
		succ('栏目插入成功');
	}else{
		succ('栏目插入失败');

	}
}
?>