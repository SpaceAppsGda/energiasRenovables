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
		$query = mysql_query("SELECT wind.state_code State_Code, wind.total windData, solar.total_sun/100 solarData, coalesce(geo.identi_resources/6000, 0) geoData  FROM 
								wind2 wind natural join 
								solar2 solar left outer join 
								geo on geo.state_code = wind.state_code; ");
		echo '{"values":[';
		while($row=mysql_fetch_array($query)){
			echo '{"name":"'.$row['State_Code'].'"'.",";
			echo '"geo":"'.$row['geoData'].'"'.",";
			echo '"solar":"'.$row['solarData'].'"'.",";
			echo '"wind":"'.$row['windData'].'"';
			echo "}, ";
		}
		echo "]}";
	}
}	
?>