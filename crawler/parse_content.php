<?php
function InsertRecordsWithHigh($links, $location)
{
	$sql = "";
	$month = 1;
	$day = 1;
	$array = Array();
	$index = 0;
	$count = 1;
	for ($i=0; $i<sizeof($links); $i++)
	{
		$array[$index] = htmlentities($links[$i]->nodeValue);
		
		if($i>0 && $count%11 == 0) //get 10
		{
			//print_r($array);
			$sql .= "INSERT INTO `tides_2019`(`id`, `location`, `date`, `high1`, `low1`, `high2`, `low2`, `high3`, `slack1`, `flood1`, `slack2`, `ebb1`, `slack3`, `flood2`, `slack4`, `ebb2`, `slack5`, `flood3`, `slack6`, `moon`, `sunrise`, `sunset`, `moonrise`, `moonset`) 
					VALUES ('', '$location', '2019-$month-$day', '$array[1]', '$array[2]', '$array[3]', '$array[4]', '$array[5]', '', '', '', '', '', '', '', '', '', '', '', '$array[6]', '$array[7]', '$array[8]', '$array[9]', '$array[10]');";	
			unset($array);
			$index = 0;
			$day++;
		}
		else
			$index++;
		
		if($i>0 && $i%11 == 0)
		{
			if(trim(substr($links[$i]->nodeValue, -2)) == "1")
			{
				$month++;
				$day = 1;
			}
		}
		$count++;
	}
	return $sql;	
}

function InsertRecordsWithoutHigh($links, $location)
{
	$sql = "";
	$month = 1;
	$day = 1;
	$array = Array();
	$index = 0;
	$count = 1;
	for ($i=0; $i<sizeof($links); $i++)
	{
		$array[$index] = htmlentities($links[$i]->nodeValue);
		
		if($i>0 && $count%17 == 0) //get 17
		{
			//print_r($array);
			$sql .= "INSERT INTO `tides_2019`(`id`, `location`, `date`, `high1`, `low1`, `high2`, `low2`, `high3`, `slack1`, `flood1`, `slack2`, `ebb1`, `slack3`, `flood2`, `slack4`, `ebb2`, `slack5`, `flood3`, `slack6`, `moon`, `sunrise`, `sunset`, `moonrise`, `moonset`) 
					VALUES ('', '$location', '2019-$month-$day', '', '', '', '', '', '$array[1]', '$array[2]', '$array[3]', '$array[4]', '$array[5]', '$array[6]', '$array[7]', '$array[8]', '$array[9]', '$array[10]', '$array[11]', '$array[12]', '$array[13]', '$array[14]', '$array[15]', '$array[16]');";	
			//print_r($sql);exit;
			unset($array);
			$index = 0;
			$day++;
		}
		else
			$index++;
		
		if($i>0 && $i%17 == 0)
		{
			if(trim(substr($links[$i]->nodeValue, -2)) == "1")
			{
				$month++;
				$day = 1;
			}
		}
		$count++;
	}
	return $sql;	
}

function InsertRecordsWithTypes($links, $type, $location)
{
	if(isset($type[1]->nodeValue))
	{
		if($type[1]->nodeValue == 'High')
		{
			return InsertRecordsWithHigh($links, $location);
		}
		else
		{
			return InsertRecordsWithoutHigh($links, $location);
		}
	}
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

/*
for($j=2018; $j<=2018; $j++)
{
	for ($i=0; $i<=7166; $i++)
	{
		$filename = $i.'_'.$j.'.txt';
		$html = file_get_contents($filename);
		@$dom = DOMDocument::loadHTML($html); 
		$xpath = new DOMXpath($dom);		 
		$links = $xpath->query( '//table//tr//td//small' );
		$conds = $xpath->query( '//table//tr//th//small' );
		InsertRecordsWithTypes($links, $conds, $i);
	}
}
*/
get_data(2019, 0, 2);


/*
$sql_query = get_data(2018, 501, 1000);
execute_sql($sql_query);

$sql_query = get_data(2018, 1001, 1500);
execute_sql($sql_query);

$sql_query = get_data(2018, 1501, 2000);
execute_sql($sql_query);

$sql_query = get_data(2018, 2001, 2500);
execute_sql($sql_query);

$sql_query = get_data(2018, 2501, 3000);
execute_sql($sql_query);

$sql_query = get_data(2018, 3001, 3500);
execute_sql($sql_query);

$sql_query = get_data(2018, 3501, 4000);
execute_sql($sql_query);

$sql_query = get_data(2018, 4001, 4500);
execute_sql($sql_query);

$sql_query = get_data(2018, 4501, 5000);
execute_sql($sql_query);

$sql_query = get_data(2018, 5001, 5500);
execute_sql($sql_query);

$sql_query = get_data(2018, 5501, 6000);
execute_sql($sql_query);

$sql_query = get_data(2018, 6001, 6500);
execute_sql($sql_query);

$sql_query = get_data(2018, 6501, 7000);
execute_sql($sql_query);

$sql_query = get_data(2018, 7001, 7166);
execute_sql($sql_query);
*/


?>
