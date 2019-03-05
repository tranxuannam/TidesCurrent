<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class DbOperations{
	private $con; 
	function __construct(){
		require_once dirname(__FILE__) . '/DbConnect.php';
		$db = new DbConnect; 
		$this->con = $db->connect(); 
	}
	public function GetTideCurrentByDate($location, $date, $begin, $end){
	    $stmt = $this->con->prepare("SELECT * FROM tides_2018 WHERE location = ? AND date LIKE ? limit ?,?");
		$cond = "ssss";
		$date = "%".$date."%";
		$stmt->bind_param($cond, $location, $date, $begin, $end);
		if($stmt->execute())
		{
			$stmt->bind_result($id, $location, $date, $high1, $low1, $high2, $low2, $high3, $slack1, $flood1, $slack2, $ebb1, $slack3, $flood2, $slack4, $ebb2, $slack5, $flood3, $slack6, $moon, $sunrise, $sunset);
			$results = array(); 
			while($stmt->fetch()){ 
				$result = array(); 
				//$result['id'] = $id; 
				//$result['location']= $location; 
				//$result['date'] = $date; 
				
				if($flood2 == "")
				{
					$result['high1'] = $high1; 
					$result['low1'] = $low1; 
					$result['high2'] = $high2; 
					$result['low2'] = $low2; 
				}
				else
				{
					$result['slack1'] = $slack1; 
					$result['flood1'] = $flood1; 
					$result['slack2'] = $slack2; 
					$result['ebb1'] = $ebb1; 
					$result['slack3'] = $slack3; 
					$result['flood2'] = $flood2; 
					$result['slack4'] = $slack4; 
					$result['ebb2'] = $ebb2; 
					$result['slack5'] = $slack5; 
					$result['flood3'] = $flood3; 
					$result['slack6'] = $slack6; 
				}
				$result['moon'] = $moon; 
				$result['sunrise'] = $sunrise; 
				$result['sunset'] = $sunset; 
				$results[$date] = $result;
			}             
		}
		return $results;
	}
	
	public function GetLocation($lat, $long, $step){
		$where = "";		
		$where .= "(lat < ? AND lat > ?)";
		$where .= " AND ";
		$where .= "(long < ? AND long > ?)";
		
		$latPlus = $lat + $step;
		$latAbstract = $lat - $step;
		$longPlus = $long + $step;
		$longAbstract = $long - $step;		
		
	    $stmt = $this->con->prepare("SELECT id, location, name, latitude, longitude FROM locations_1 WHERE (latitude < ? AND latitude > ?) AND (longitude < ? AND longitude > ?)");
		$stmt->bind_param("dddd", $latPlus, $latAbstract, $longPlus, $longAbstract);
		
		if($stmt->execute())
		{
			$stmt->bind_result($id, $location, $name, $latitude, $longitude);
			$results = array(); 
			while($stmt->fetch()){ 
				$result = array(); 
				$result['id'] = $id; 
				$result['location']= $location; 
				$result['name'] = $name; 
				$result['latitude'] = $latitude; 
				$result['longitude'] = $longitude; 			
				array_push($results, $result);
			}             
		}
						print_r($results); exit;

		return $results;
	}
	
}