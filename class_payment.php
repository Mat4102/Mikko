<?php
class Payment  implements PayInterface{
						
												
/**
 * @version PHP versions 5.3
 * @category  Mikko-Test 
 * @author <ferchichi.has@gmail.com>

 
 */

/**
 * Begin Document
 */
						
	


/**  
	 * Fill months Data for the remainder of this year
	 * @param object $currentDate_M DataTime Object
	 * @param $endDate_M DataTime Object
     * @access 	public
     */

 
	
public function fillDataPayment_Month($currentDate_M,$endDate_M,$lastMonth){
 $listMonth=array();
 try{
 
  if ($currentDate_M === null || $endDate_M === null || $lastMonth === null){
			throw new Exception("Error:Invalid date!");
			}
	while($currentDate_M < $endDate_M && $currentDate_M <= $lastMonth) {
								
		 $currentDate_M-> modify('last day of next month');
		array_push ($listMonth, $currentDate_M -> format(' F '));
		 
		}
		
				return $listMonth;
		
	}catch (Exception $e) {
		echo "Error";
		
}
}
						
/**  
	 * Fill	the	payment	dates for the remainder of this year
	 * @param object $currentDate_ DataTime Object
	 * @param $endDate_ DataTime Object
	 * @param $lastMonth DataTime Object
     * @access 	public
     */				
	 
public function fillDataPayment_Date($currentDate_,$endDate_,$lastMonth){
$lisPayment_Date=array();
	try{
	
	if ($currentDate_ === null || $endDate_ === null || $lastMonth == null){
			throw new Exception("Error:Invalid date!");
			}
		while($currentDate_ < $endDate_ && $currentDate_ <= $lastMonth) {
									
		$currentDate_-> modify('last day of next month');
					 
		if($currentDate_->format('D')== Payment::CONST_DOW_SAT){
				
				$currentDate_addDaySun = clone $currentDate_;
			    $currentDate_addDaySun-> modify('2 day');
			
				array_push ($lisPayment_Date, $currentDate_addDaySun -> format('D Y-m-d'));
				
				}elseif($currentDate_->format('D')== Payment::CONST_DOW_SUN){
				
					$currentDate_addDaySat = clone $currentDate_;
					$currentDate_addDaySat-> modify('1 day');
					
					array_push ($lisPayment_Date, $currentDate_addDaySat -> format('D Y-m-d'));
				
						}else{
							
							array_push ($lisPayment_Date, $currentDate_ -> format('D Y-m-d'));
						}
			}
			
			return $lisPayment_Date;
		
		}catch (Exception $e) {
				echo "Error";
				
		}
}

/**  
	 * Fill the bonus payment date of this year.
	 * @param object $currentDate_Bonus DataTime Object
	 * @param $endDate_Bonus DataTime Object
	 * @param $lastMonth DataTime Object
     * @access 	public
     */	
	 
public function fillData_BonusDate($currentDate_Bonus,$endDate_Bonus,$lastMonth){
$lisBonus_Date=array();
		try{
		
			if ($currentDate_Bonus === null ||  $endDate_Bonus === null || $lastMonth === null){
			throw new Exception("Error:Invalid date!");
			
			}
			while($currentDate_Bonus < $endDate_Bonus && $currentDate_Bonus <= $lastMonth) {
								 
				 $currentDate_Bonus -> modify('last day of next month ');
				 $currentDate_Bonus_addDay =clone $currentDate_Bonus;
				 $currentDate_Bonus_addDay-> modify('15 day');
				 
				 if($currentDate_Bonus_addDay->format('D')== Payment::CONST_DOW_SAT){
				
				$currentDate_addDayWed = clone $currentDate_Bonus_addDay;
			    $currentDate_addDayWed-> modify('4 day');
				
				array_push ($lisBonus_Date, $currentDate_addDayWed-> format('D Y-m-d'));
				
				}elseif($currentDate_Bonus_addDay->format('D')== Payment::CONST_DOW_SUN){
				
					$currentDate_addDayWed_ = clone $currentDate_Bonus_addDay;
					$currentDate_addDayWed_-> modify('3 day');
					
					array_push ($lisBonus_Date, $currentDate_addDayWed_ -> format('D Y-m-d '));
				
						}else{
							 
							 array_push ($lisBonus_Date, $currentDate_Bonus_addDay -> format('D Y-m-d '));
						}
				
								 
					}
					
					return $lisBonus_Date;
				
				}catch (Exception $e) {
					echo "Error";
				
					}
}
						
}
					
?>					
					