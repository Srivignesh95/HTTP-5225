<?php

	function restaurant_count(){
		$db = mysqli_select_db($conn,"restaurants");
		$restaurant_count = 0;
		$query = "select count(*) as restaurant_count from restaurants";
		$query_run = mysqli_query($conn,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$restaurant_count = $row['restaurant_count'];
		}
		return($restaurant_count);
	}
?>