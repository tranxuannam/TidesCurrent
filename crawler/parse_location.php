<?php

$html = file_get_contents("location_name.txt");

//Parse it. Here we use loadHTML as a static method
//to parse the HTML and create the DOM object in one go.
@$dom = DOMDocument::loadHTML($html);
 
//Init the XPath object
$xpath = new DOMXpath($dom);
 
//Query the DOM
$links = $xpath->query( '//tr//td' );
 
//Display the results as in the previous example
foreach($links as $link){
    //echo $link->getAttribute('href'), '<br>';
	//echo $link->nodeValue, '<br>';
}

function InsertRecordsWithoutHigh($links)
{
	$sql = "";
	$j = 0;
	$array = Array();
	$index = 0;
	$count = 1;
	for ($i=0; $i<sizeof($links); $i++)
	{
		$array[$index] = $links[$i]->nodeValue;
		
		if($i>0 && $count%3 == 0) //get 3
		{
			//print_r($array);			
			
			$N="";$W="";$S="";$E="";
			
			if($array[2] != "NULL")
			{			
				$coords = explode(",", $array[2]);
				
				if(strpos($coords[0], "N") !== false)
				{
					$N = explode("°", $coords[0])[0];
				}
				if(strpos($coords[0], "W") !== false)
				{
					$W = explode("°", $coords[0])[0];
				}
				if(strpos($coords[1], "N") !== false)
				{
					$N = explode("°", $coords[1])[0];
				}
				if(strpos($coords[1], "W") !== false)
				{
					$W = explode("°", $coords[1])[0];
				}
				
				if(strpos($coords[0], "S") !== false)
				{
					$S = explode("°", $coords[0])[0];
				}
				if(strpos($coords[0], "E") !== false)
				{
					$E = explode("°", $coords[0])[0];
				}
				if(strpos($coords[1], "S") !== false)
				{
					$S = explode("°", $coords[1])[0];
				}
				if(strpos($coords[1], "E") !== false)
				{
					$E = explode("°", $coords[1])[0];
				}
			}
			$location_name = str_replace("'","\'",$array[0]);
			$sql .= "INSERT INTO `locations`(`id`, `location`, `name`, `file`, `coordinate_n`, `coordinate_w`, `coordinate_s`, `coordinate_e`) 
			VALUES ('','$j','$location_name','$array[1]','$N','$W','$S','$E');";	
			
			//$sql .= 'INSERT INTO `locations`(`id`, `location`, `name`, `file`, `coordinate_n`, `coordinate_w`, `coordinate_s`, `coordinate_e`) 
			//VALUES ("","'.$j.'","'.$location_name.'","'.$array[1].'","'.$N.'","'.$W.'","'.$S.'","'.$E.'");';	
			unset($array);
			$index = 0;			
			$j++;
		}
		else
			$index++;		
		
		$count++;
	}
	return $sql;	
}
//echo InsertRecordsWithoutHigh($links);

function InsertRecordsWithoutHighByLatLong($links)
{
	$sql = "";
	$j = 0;
	$array = Array();
	$index = 0;
	$count = 1;
	for ($i=0; $i<sizeof($links); $i++)
	{
		$array[$index] = $links[$i]->nodeValue;
		
		if($i>0 && $count%2 == 0) //get 3
		{
			//print_r($array);			
			
			$N="";$W="";$S="";$E="";
			
			if($array[1] != "NULL")
			{			
				$coords = explode(",", $array[1]);
				//print_r($coords);exit;
				
				if(strpos($coords[0], "N") !== false)
				{
					$N = explode("°", $coords[0])[0];
				}
				if(strpos($coords[0], "W") !== false)
				{
					$W = explode("°", $coords[0])[0];
				}
				if(strpos($coords[1], "N") !== false)
				{
					$N = explode("°", $coords[1])[0];
				}
				if(strpos($coords[1], "W") !== false)
				{
					$W = explode("°", $coords[1])[0];
				}
				
				if(strpos($coords[0], "S") !== false)
				{
					$S = explode("°", $coords[0])[0];
				}
				if(strpos($coords[0], "E") !== false)
				{
					$E = explode("°", $coords[0])[0];
				}
				if(strpos($coords[1], "S") !== false)
				{
					$S = explode("°", $coords[1])[0];
				}
				if(strpos($coords[1], "E") !== false)
				{
					$E = explode("°", $coords[1])[0];
				}
			}
			$location_name = str_replace("'","\'",$array[0]);
			
			if($N == "") $lat = "-" . trim($S);
			else $lat = trim($N);
			
			if($E == "") $long = "-" . trim($W);
			else $long = trim($E);
			
			$sql .= "INSERT INTO `locations`(`id`, `location`, `name`, `latitude`, `longitude`) 
			VALUES ('','$j','$location_name','$lat','$long');";		
			unset($array);
			$index = 0;			
			$j++;
		}
		else
			$index++;		
		
		$count++;
	}
	return $sql;	
}
echo InsertRecordsWithoutHighByLatLong($links);
?>
