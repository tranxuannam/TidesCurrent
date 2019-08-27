<?php

function create_table($year, $from, $to)
{
	$table = "CREATE TABLE tides_" . $year . "_" . $from . "_". $to . " (
  id bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  location bigint(20) UNSIGNED NOT NULL,
  date date NOT NULL,
  high1 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  low1 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  high2 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  low2 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  high3 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  low3 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  high4 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  low4 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  high5 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  low5 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slack1 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  flood1 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slack2 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ebb1 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slack3 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  flood2 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slack4 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ebb2 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slack5 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  flood3 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  slack6 varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  moon varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sunrise varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  sunset varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  moonrise varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  moonset varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

return $table;
}

function array_title($type, $year, $from, $to)
{
	$sql_insert = "INSERT INTO `tides_" . $year . "_" . $from . "_". $to . "`(`id`, `location`, `date`" ;	
	$flag = 1;
	$i = 1;
	$keys = array();
	
	for ($i; $i<sizeof($type); $i++)
	{
		if($type[$i]->nodeValue == 'Phase')
		{
			break;
		}	

		if(isset($keys[$type[$i]->nodeValue]))
		{
			$keys[$type[$i]->nodeValue] = $keys[$type[$i]->nodeValue] + 1;
		}
		else
		{
			$keys[$type[$i]->nodeValue] = 1;
		}
		$sql_insert .= strtolower(", `" . $type[$i]->nodeValue) . $keys[$type[$i]->nodeValue] . "`";
	}
	//print_r($sql_insert);exit;
	return array( "count" => $i - 1 , "query" => $sql_insert . ", `moon`, `sunrise`, `sunset`, `moonrise`, `moonset`)");
}

function InsertRecordsWithTypes($links, $type, $location, $year, $from, $to)
{
	$sql = "";
	$sql_value = "";
	$month = 1;
	$day = 1;
	$array = Array();
	$index = 0;
	$count = 1;
	
	$arr_title = array_title($type, $year, $from, $to);
	
	for ($i=0; $i<sizeof($links); $i++)
	{
		$sql_value = " VALUES ('', '$location', '$year-";
		$array[$index] = htmlentities($links[$i]->nodeValue);
		
		if($i>0 && $count%($arr_title["count"] + 6) == 0) //6 is `day`, `moon`, `sunrise`, `sunset`, `moonrise`, `moonset`
		{
			$sql_value .= "$month-$day'";	
			for ($k = 1; $k <= $arr_title["count"] + 5; $k++) // 5 is `moon`, `sunrise`, `sunset`, `moonrise`, `moonset`
			{
				$sql_value .= ",'$array[$k]'";			
			}
			$sql .= $arr_title["query"] . $sql_value . ");";// . "</br></br>";			
			unset($array);
			$index = 0;
			$day++;
		}
		else
			$index++;
		
		if($i>0 && $i%($arr_title["count"] + 6) == 0)
		{
			if(trim(substr($links[$i]->nodeValue, -2)) == "1")
			{
				$month++;
				$day = 1;
			}
		}
		$count++;
	}
	//print_r($sql);exit;
	return $sql;	
}

function execute_sql($sql_query)
{
	$con=mysqli_connect("localhost","root","","tides_current");
	//$con=mysqli_connect("103.77.167.17","usedb_tides","Tides@019","admin_tides");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	//print_r($sql_query);exit;
	// Execute multi query
	if (mysqli_multi_query($con, str_replace("&minus;", "-", $sql_query)))
	{
	  echo "Success", '<br>';
	}

	mysqli_close($con);
}

function execute_create_table($create_table)
{
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	$link = mysqli_connect("localhost","root","","tides_current");
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	} 

	if(mysqli_query($link, $create_table)){
		echo "Table created successfully.";
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	 
	// Close connection
	mysqli_close($link);
}

function get_data($year, $from, $to)
{
	$sql_query = "";
	$create_table = create_table($year, $from, $to);
	execute_create_table($create_table);
	
	for ($i=$from; $i<=$to; $i++)
	{
		$filename = "$year/".$i.'_'.$year.'.html';
		$html = file_get_contents($filename);
		echo $filename, '<br>';
		@$dom = DOMDocument::loadHTML($html); 
		$xpath = new DOMXpath($dom);		 
		$links = $xpath->query( '//table//tr//td//small' );
		$conds = $xpath->query( '//table//tr//th//small' );
		$sql_query = InsertRecordsWithTypes($links, $conds, $i, $year, $from, $to);
		
		//print_r( $sql_query); exit;
		
		execute_sql($sql_query);
		sleep(3);
	}
}
get_data(2019, $argv[1], $argv[2]);
?>
