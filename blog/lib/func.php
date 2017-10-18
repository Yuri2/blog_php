<?php 
	function succ($res){
		$restul="succ";
		require(ROOT.'/view/admin/info.html');
		exit();
	}
	function danger($res){
		$restul="fail";
		require(ROOT.'/view/admin/info.html');
		exit();
	}
 ?>