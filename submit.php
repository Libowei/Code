<?php
$link = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);


// 连从库
// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

if($link)
{
    $db_selected = mysql_select_db(SAE_MYSQL_DB,$link);
    if (!db_selected)
    {
    	die('Can\'t use SAE_MYSQL_DB:'.mysql_error());
    }
    else {

    	$month = $_POST['month'];
    	$day = $_POST['day'];
    	
        $query = "SELECT Feel FROM `$month` WHERE Day='$day'";
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);

        if(empty($row))//判断是否为空 
    		echo "null";
        else if($row['Feel'] === 'hot') {
        	$queryInfo = "SELECT Clothes FROM `Clothes` WHERE Feel='hot'";
        	$resultInfo = mysql_query($queryInfo);
			while ($clothes = mysql_fetch_array($resultInfo))
			{
				$arr[] = $clothes;
			}
            echo $row['Feel']."   ";
            foreach ($arr as $rs) {
            	echo $rs[0].'、';
            }
    	}
        
        else if($row['Feel'] === 'normal') {
            $queryInfo = "SELECT Clothes FROM `Clothes` WHERE Feel='normal'";
        	$resultInfo = mysql_query($queryInfo);
            while ($clothes = mysql_fetch_array($resultInfo))
			{
				$arr[] = $clothes;
			}
            echo $row['Feel'];
            foreach ($arr as $rs) {
            	echo $rs[0].'、';
            }
        }
        
        else if($row['Feel'] === 'cool') {
            $queryInfo = "SELECT Clothes FROM `Clothes` WHERE Feel='cool'";
        	$resultInfo = mysql_query($queryInfo);
           	while ($clothes = mysql_fetch_array($resultInfo))
			{
				$arr[] = $clothes;
			}
            echo $row['Feel']."  ";
            foreach ($arr as $rs) {
            	echo $rs[0].'、';
            }
        }
        
        else if($row['Feel'] === 'cold') {
            $queryInfo = "SELECT Clothes FROM `Clothes` WHERE Feel='cold'";
        	$resultInfo = mysql_query($queryInfo);
            $arr = array();
			while ($clothes = mysql_fetch_array($resultInfo))
			{
				$arr[] = $clothes;
			}
            echo $row['Feel']."  ";
            foreach ($arr as $rs) {
            	echo $rs[0].'、';
            }
        }
        
        /*if ($mysql->errno() != 0)
    	{
        	die("Error:" . $mysql->errmsg());
    	}*/   
    }
    mysql_close($link);
}

?>