<?php
 

// AUTOLOAD CLASS OBJECTS...
		if(!function_exists("__autoload")){
			function __autoload($class_name){
			require_once('class_'.$class_name.'.php');
	
			}
		}
 
$fichier		   = new CSV();
$P			  	   = new Payment();
$P1                = clone $P;
$P2                = clone $P;
$currentDate       = new DateTime();
$endDate           = new DateTime('+ 1 years');
$currentDate_Bonus =clone $currentDate;
$endDate_Bonus     =clone $endDate;
$currentDate_ 	   =clone $currentDate;
$endDate_          =clone $endDate;
$lastMonth         =new DateTime('Dec'); 

$arryMonth         =array();
$arryPyment_Date   =array();
$arryBonus_Date    =array();
$arryMonth         = $P->fillDataPayment_Month($currentDate,$endDate,$lastMonth);
$arryPyment_Date   = $P1->fillDataPayment_Date($currentDate_,$endDate_,$lastMonth);
$arryBonus_Date    = $P2->fillData_BonusDate($currentDate_Bonus,$endDate_Bonus,$lastMonth);


 function fillCSV(CSV $fichier_,$listData,$listDataPyment,$listDataBonus){
$i=0;

 if ( $fichier_ === null || $listData === null || $listDataPyment === null || $listDataBonus === null){
			throw new Exception("Error:Invalid data!");
			}
			
			foreach($listData as $list ){
			
					
					 $fichier_->Insertion( $listData[$i].";".$listDataPyment[$i].";".$listDataBonus[$i] );
					   
						$i++;
			}
}

$fichier->Colonne("Month;Date Payment; Date payment Bonus");

fillCSV($fichier,$arryMonth,$arryPyment_Date,$arryBonus_Date);

$fichier->output('csvfile');
?>