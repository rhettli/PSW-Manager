<?php

header("Content-type: text/html; charset=gbk");

//or die(‘Unable to connect, please check connection paremeters');

// $time_=$_GET["timehash"];
// if($time_-time()>30 && $time_-time()<0){

	// die("ERROR:not do cheet!");

// }


if(!isset($_GET["op"])){

	die(date("Y-m-d H:i:s" ,time()));

}

$op=$_GET["op"];


//$db = mysql_connect('localhost', 'root', 'root');
//mysql_select_db('othertest',$db);
$db = mysql_connect('localhost', 'user_name', 'psw@123');
mysql_select_db('pswm',$db);

if($db){
	if($op=="getlist"){

		$where='';
		if(isset($_GET["where"])){
			$where=" where ".base64_decode($_GET["where"]);
		}

		$query = 'SELECT * FROM P_content '.$where.' limit 30';
		//echo $query;
		$result = mysql_query($query, $db);
		//echo mysql_error($db);
		//or die(mysql_error($db));
		//echo mysql_fetch_row($result)[0];//

		echo '[';
		$i=0;
		$rows=mysql_num_rows($result);
		while ($row=mysql_fetch_array($result))
		{	$i++;
			echo '{"id":"'.$row['Id'].'","title":"'.base64_encode($row['title']).'","pswtext":"'.$row['pswtext'].'","remark":"'.base64_encode($row['remark']).'","createdatetime":"'.$row['createdatetime'].'","modifydatetime":"'.$row['modifydatetime'].'"}';
			if($i<$rows){
				echo ',';

			}

		}
		echo ']';
		mysql_close($db);
		return;
	}
	if($op=="delete"){
		$ids=$_GET["ids"];
		$query = "delete from  P_content where Id in (".$ids.")";
		//echo $query;
		$result = mysql_query($query, $db);
		echo "OK";
		mysql_close($db);
		return;
	}

	$title=base64_decode($_GET["title"]);
	$pswtext=$_GET["pswtext"];
	$remark=base64_decode($_GET["remark"]);

	if($op=="add"){

		$query = "insert into P_content(title,pswtext,remark,createdatetime)values('".$title."','".$pswtext."','".$remark."','".date("Y-m-d H:i:s" ,time())."')";
		//echo $query;
		//mysql_get_last_error
		$result = mysql_query($query, $db);
		if(!$result){echo $query;}else{

			echo "OK";
		}


	}else if($op=="modify"){
		$id=$_GET["id"];
		$query = "update P_content set title='".$title."',pswtext='".$pswtext."',remark='".$remark."',modifydatetime='".date("Y-m-d H:i:s" ,time())."' where id=".$id;
		//echo $query;
		$result = mysql_query($query, $db);
		echo "OK";


	}

mysql_close($db);
}else
{
	echo "ERROR:Can't connect database！";
}
