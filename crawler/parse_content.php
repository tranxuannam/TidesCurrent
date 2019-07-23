<?php
function array_title($type)
{
	$sql_insert = "INSERT INTO `tides_2019`(`id`, `location`, `date`" ;	
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

function InsertRecordsWithTypes($links, $type, $location)
{
	$sql = "";
	$sql_value = "";
	$month = 1;
	$day = 1;
	$array = Array();
	$index = 0;
	$count = 1;
	
	$arr_title = array_title($type);
	
	for ($i=0; $i<sizeof($links); $i++)
	{
		$sql_value = " VALUES ('', '$location', '2019-";
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

function get_data($year, $from, $to)
{
	$sql_query = "";
	for ($i=$from; $i<=$to; $i++)
	{
		$filename = "2019/".$i.'_'.$year.'.html';
		$html = file_get_contents($filename);
		echo $filename, '<br>';
		@$dom = DOMDocument::loadHTML($html); 
		$xpath = new DOMXpath($dom);		 
		$links = $xpath->query( '//table//tr//td//small' );
		$conds = $xpath->query( '//table//tr//th//small' );
		$sql_query = InsertRecordsWithTypes($links, $conds, $i);
		//print_r( $sql_query);
		execute_sql($sql_query);
		sleep(3);
	}
}

get_data(2019, 2548, 2548); //9001
?>
