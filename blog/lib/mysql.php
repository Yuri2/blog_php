<?php 
	function mConn(){
		static $conn=null;
		if($conn==null){
			$cfg=require(ROOT.'lib/config.php');
			$conn=mysqli_connect($cfg['host'],$cfg['user'],$cfg['pwd'],$cfg['db']);
			mysqli_query($conn,'set names '.$cfg['charset']);
		}
		if(!$conn){
			die('连接错误: '.mysqli_query_error());
		}
		return $conn;
	}
	function mQuery($sql){
		return mysqli_query(mConn(),$sql);
	}
	function mGtall($sql){
		$rs=mQuery($sql);
		if(!$rs){
			return false;
		}
		$data=array();
		while($row=mysqli_fetch_assoc($rs)){
			$data[]=$row;
		}
		return $data;
	}
	function mgetRow($sql){
		$rs=mQuery($sql);
		if(!$rs){
			return false;
		}
		return mysqli_fetch_assoc($rs);
	}
	function mgetOne(){
		$rs=mQuery($sql);
		if(!$rs){
			return false;
		}
		return mysqli_fetch_row($rs)[0];
	}
	function mExec($table,$data,$act='insert',$where=0){
		if($act=='insert'){
			$sql="insert into $table (";
			$sql.=implode(",",array_keys($data)).") values ('";
			$sql.=implode("','",array_values($data))."')";
			return mQuery($sql);
		}else if($act=='update'){
			$sql="update $table set ";
			foreach ($data as $key => $value) {
				$sql.=$key."='".$value."',";
			}
			$sql=rtrim($sql,",")." where $where";
			return mQuery($sql);
		}

	}

//$data = array('title'=>'今天的空气' , 'content'=>'空气质量优' , 'pubtime'=>12345678,'author'=>'baibai');
//insert into art (title,content,pubtime,author) values ('今天的空气','空气质量优','12345678','baibai');
//update art set title='今天的空气',conte='空气质量优',pubtime='12345678',author='baibai' where art_id=1;
//cho mExec('art' , $data , 'update' , 'art_id=1');;
//insert into cat (id,catname) values (5 , 'test');
 ?>