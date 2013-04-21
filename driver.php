<?php

class dbDriver{

	private $conexion;
	
	function __construct(){
	    $this->conexion = mysql_connect("127.0.0.1:3306", "root", "") or die("fallo");
		mysql_select_db("energiarenovable");
	}
	
	function __destruct(){
		mysql_close($this->conexion);
	}
	
	function getRanking(){
		$query = mysql_query("SELECT distinct wind.state_code state_code, log(wind.total) / log(100000000) windData, log(solar.total_energy) / log(100000000) solarData, log(geo.total_energy) / log(100000000) geoData  FROM 
								wind2 wind natural join 
								solar2 solar left outer join 
								geo2 geo on geo.state_code = wind.state_code ");
		$result = "";
		$result .= '{"values":[';
		while($row=mysql_fetch_array($query)){
			$result .=  '{"name":"'.$row['state_code'].'"'.",";
			$result .=  '"geo":"'.$row['geoData'].'"'.",";
			$result .=  '"solar":"'.$row['solarData'].'"'.",";
			$result .=  '"wind":"'.$row['windData'].'"';
			$result .=  "}, ";
		}
		
		$result = substr($result, 0, -2);
		
		$result .=  "]}";
		echo $result;
	}

	function getStateSolar($name){
		$query = mysql_query("SELECT distinct *  FROM 
								solar2 solar  where state_code='$name'") or die (mysql_error());
		$result="";
		$result .= '{';
		while($row=mysql_fetch_array($query)){
			$result .=  '"urban":"'.$row['urban_utility'].'"'.",";
			$result .=  '"rural":"'.$row['rural_utility'].'"'.",";
			$result .=  '"rooftop":"'.$row['rooftop_utility'].'"'.",";
			$result .=  '"total":"'.$row['total_energy'].'"';
			$result .=  "}";
		}
				
		return $result;
	}
	
	function getStateWind($name){
		$query = mysql_query("SELECT distinct *  FROM 
								wind2 wind  where state_code='$name'") or die (mysql_error());
		$result="";
		$result .= '{';
		while($row=mysql_fetch_array($query)){
			$result .=  '"onshore":"'.$row['onshore'].'"'.",";
			$result .=  '"offshore":"'.$row['offshore'].'"'.",";
			$result .=  '"total":"'.$row['total'].'"';
			$result .=  "}";
		}
				
		return $result;
	}
	
	function getStateGeo($name){
		$query = mysql_query("SELECT distinct *  FROM 
								geo2 geo  where state_code='$name'") or die (mysql_error());
		$result="";
		$result .= '{';
		while($row=mysql_fetch_array($query)){
			$result .=  '"hydro":"'.$row['hydrothermal'].'"'.",";
			$result .=  '"enhanced":"'.$row['enhanced'].'"'.",";
			$result .=  '"total":"'.$row['total_energy'].'"';
			$result .=  "}";
		}
				
		return $result;
	}
	
	function getState($name){
		$result = "";
		$result .=  '{"name":"'.$name.'"'.",";
		$result .= '"solar":'.$this->getStateSolar($name).",";
		$result .= '"wind":'.$this->getStateWind($name).",";
		$result .= '"geo":'.$this->getStateGeo($name)."}";
		echo $result;
	}
}	
?>