<?php 
	require('./lib/init.php');
	$sql="select * from cat";
	$cat_list=mGtall($sql);
	if(empty($_POST)){
		include(ROOT.'/view/admin/artadd.html');
	}else{
		$art['title']=trim($_POST['title']);
		if($art['title']==''){
			succ('标题不能为空');
			exit();
		}
		$art['cat_id']=$_POST['cat_id'];
		if(!is_numeric($art['cat_id'])){
			succ('栏目不合法');
			exit();
		}
		$art['content']=trim($_POST['content']);
		if($art['content']==''){
			succ('内容不能为空');
			exit();
		}
		$art['pubtime']=time();
		if(mExec('art',$art)){
			succ('提交成功');
		}else{
			succ('提交失败');
		}
	}
?>