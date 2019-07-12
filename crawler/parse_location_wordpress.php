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

function GeraHash($qtd){ 
	//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
	$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
	$QuantidadeCaracteres = strlen($Caracteres); 
	$QuantidadeCaracteres--; 

	$Hash=NULL; 
		for($x=1;$x<=$qtd;$x++){ 
			$Posicao = rand(0,$QuantidadeCaracteres); 
			$Hash .= substr($Caracteres,$Posicao,1); 
		} 

	return $Hash; 
} 

function InsertRecordsWithoutHighByLatLong($links)
{
	$sql = "";
	$j = 0;
	$array = Array();
	$index = 0;
	$count = 1;
	$id = 67;
	$postmeta_id = 27699;//249;
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
			
			//$sql .= "INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
//($id, 1, '2019-06-17 04:43:10', '2019-06-17 04:43:10', '', '$location_name', '', 'publish', 'closed', 'closed', '', '$location_name', '', '', '2019-06-17 04:43:12', '2019-06-17 04:43:12', '', 0, 'http://localhost/wordpress/?p=$id', 0, 'post', '', 0);
//";
			//$sql .= "INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES(".($postmeta_id++).", $id, 'location', '$j');";
			//$postmeta_id++;
			//$sql .= "INSERT INTO `wp_cfs_values` (`id`, `field_id`, `meta_id`, `post_id`, `base_field_id`, `hierarchy`, `depth`, `weight`, `sub_weight`) VALUES('', 28, $postmeta_id, $id, 0, '', 0, 0, 0);";
			
			//$sql .= "INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES(".($postmeta_id++).", $id, 'latitude', '$lat');";
			//$postmeta_id++;
			//$sql .= "INSERT INTO `wp_cfs_values` (`id`, `field_id`, `meta_id`, `post_id`, `base_field_id`, `hierarchy`, `depth`, `weight`, `sub_weight`) VALUES('', 29, $postmeta_id, $id, 0, '', 0, 0, 0);";
			
			//$sql .= "INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES(".($postmeta_id++).", $id, 'longitude', '$long');";
			//$postmeta_id++;
			//$sql .= "INSERT INTO `wp_cfs_values` (`id`, `field_id`, `meta_id`, `post_id`, `base_field_id`, `hierarchy`, `depth`, `weight`, `sub_weight`) VALUES('', 30, $postmeta_id, $id, 0, '', 0, 0, 0);";
			
			$sql .= "INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES(".($postmeta_id).", $id, 'code', '".GeraHash(8)."');";
			$sql .= "INSERT INTO `wp_cfs_values` (`id`, `field_id`, `meta_id`, `post_id`, `base_field_id`, `hierarchy`, `depth`, `weight`, `sub_weight`) VALUES('', 31, $postmeta_id, $id, 0, '', 0, 0, 0);";
			$postmeta_id++;
			
			unset($array);
			$index = 0;			
			$j++;
			$id++;
		}
		else
			$index++;		
		
		$count++;
	}
	return $sql;	
}
echo InsertRecordsWithoutHighByLatLong($links);
?>
