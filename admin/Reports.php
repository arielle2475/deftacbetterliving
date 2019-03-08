<?php 

class Reports{

	static function get_yearly_sales(){
		//Require database header
		require 'connect.php';

		$sql = "SELECT YEAR(appDate) as SalesYear,
       				   MONTHNAME(STR_TO_DATE(MONTH(appDate), '%m')) as SalesMonth,
       				   SUM(payment) AS TotalPrice
    			FROM transhistory
				WHERE appDate >= DATE_SUB(NOW(),INTERVAL 1 YEAR)
				GROUP BY YEAR(appDate), MONTH(appDate)
				ORDER BY YEAR(appDate), MONTH(appDate);";

		//Query sql string
		 $stmt = mysqli_query($data,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
        
        
	}
	static function get_monthly_sales(){
		//Require database header
		require 'connect.php';

		$sql = "SELECT DAY(appDate) as SalesDay,
       				   MONTHNAME(STR_TO_DATE(MONTH(appDate), '%m')) as SalesMonth,
       				   SUM(payment) AS TotalPrice
				FROM transhistory
				WHERE (appDate BETWEEN NOW() - INTERVAL 30 DAY AND NOW())
				GROUP BY YEAR(appDate), MONTH(appDate), DAY(appDate)
				ORDER BY YEAR(appDate), MONTH(appDate), DAY(appDate);";

		//Query sql string
		 $stmt = mysqli_query($data,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
	}

	static function get_weekly_sales(){
		require 'connect.php';

		$sql = "SELECT DAYNAME(appDate) as SalesDay,
       				   CONCAT(MONTHNAME(STR_TO_DATE(MONTH(appDate), '%m')), ' ',DAY(appDate)) as SalesDate,
       				   SUM(payment) AS TotalPrice
				FROM transhistory
				WHERE (appDate >= NOW() + INTERVAL -7 DAY
   						AND appDate <  NOW() + INTERVAL  0 DAY) 
				GROUP BY YEAR(appDate), MONTH(appDate), DAY(appDate)
				ORDER BY YEAR(appDate), MONTH(appDate), DAY(appDate);";

		//Query sql string
		 $stmt = mysqli_query($data,$sql);

		//Array to store results
		$resultsArray = array();

		//loop through information
	    while ($row = mysqli_fetch_array($stmt)) {
	        $resultsArray[] = $row;
	   	}

		//return array
		return $resultsArray;
	}

}