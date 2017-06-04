<?php
	
/**
* Begin Document
*/
	 
// AUTOLOAD CLASS OBJECTS
if(!function_exists("__autoload")){
		
	function __autoload($class_name){
	require_once('class_'.$class_name.'.php');
			
	}
}
		

		
$currentDate       = new DateTime();
$endDate           = new DateTime('+ 1 years');
$currentDate_Bonus =clone $currentDate;
$endDate_Bonus     =clone $endDate;
$currentDate_Month =clone $currentDate;
$endDate_Month     =clone $endDate;

$P  			   	= new Payment();
$P1 				=clone $P;
$P2		 			=clone $P;
$lastMonth 			=new DateTime('Dec'); 
$lastMonth_Bonus 	= clone $lastMonth;
$lastMonth_pay 		=clone $lastMonth;
$listMonth			=array();
$listPayment_Date   =array();
$listBonus_Date     =array();

$line="--------------------------------------------------". '<br />';

/**  
	 * Display Data for the remainder of this year
	 * @param object $listData array Object
     * @access 	--
     */
 function displayData($listData){
 
 if ($listData === null ){
			throw new Exception("Error:$listData is empty!");
			}
$i=0;
	foreach($listData as $info){
					   
		 echo $listData[$i]. ' <br />' ;
					  
		$i++;
	}
}

/* Display Dashboard Table*/

		echo "<table class='tabPay'>";
		 echo "<tr>"."<td>"."Current date:" .$currentDate->format('Y-m-d')."||"."Current Year:".$currentDate_Month->format('Y')."<td>"."<td style='color:#000;'>"."Export to CSV : "."<input id='sendURL' type='submit' value='' style='background-image:url(image/images.jpg);' onclick=openLink();>"."</td>"."<tr>";
			echo "<tr>";
				echo "<td>";
					echo $line;				
					echo "Month ". '<br />';
					echo $line;
					$listMonth=$P2->fillDataPayment_Month($currentDate_Month,$endDate_Month,$lastMonth);
					displayData($listMonth);
					echo $line;
					echo "</td>";
					echo "<td>";
						echo $line;
						echo "Payment Date ". '<br />';
						echo $line;
						
						$listPayment_Date = $P->fillDataPayment_Date($currentDate,$endDate,$lastMonth_pay);
						displayData($listPayment_Date);
						echo $line;
						echo "</td>";
					echo "<td>";
					echo $line;
					echo "Payment Bonus Date". '<br />';
					echo $line;
					$listBonus_Date = $P1->fillData_BonusDate($currentDate_Bonus,$endDate_Bonus,$lastMonth_Bonus);
					displayData($listBonus_Date);
					echo $line;
					echo "</td>";
			echo "</tr>";
		echo "</table>";

						
?>