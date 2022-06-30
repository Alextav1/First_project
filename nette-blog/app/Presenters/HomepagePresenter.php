<?php

declare(strict_types=1);

namespace App\Presenters;

use LengthException;
use Nette;
use Nette\Application\UI\Form;
use Nette\Schema\ValidationException;
use Nette\Utils\Arrays;
use Nette\Utils\ArrayHash;
use Nette\Utils\Callback;
use Tracy\Dumper;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	const SIZE = 10; // the variable that give for us the size of batterfield


	public function actionDefault (){

		//$this->runTests();


	}

	protected function runTests(){

		if (false !== $this->validateShipLocation([
			0, 1, 11,
		])) {
			echo 'Bug!';
			die();
		}
		
		if (true !== $this->validateShipLocation([
			0, 2,
		])) {
			echo 'Bug!';
			die();
		}

		die();

	}
	
  protected function createComponentShipsInput(): Form
	{
		$form = new Form;
    $items = [];
		//$key = 'a';

		for ($i = 0; $i < static::SIZE; $i++) {
			for($j = 0; $j < static::SIZE; $j++) {
				$items[$i.'-'.$j]= '';
			}

			//$key++;

			
			//$items = array_fill(0, static::SIZE*static::SIZE, '');
		}
			
		//$items = array_fill(0, static::SIZE*static::SIZE, '');
		Dumper::dump($items);
	

		$form->addCheckboxList('ships', '',$items)
		     ->setOption('size', static::SIZE);
	
    $form->addSubmit('submit', 'Check ships');

		$form->onSuccess[] = function ($form)
		{
			print_r($form->getValues(true));
			$shipsArray = $form->getValues(true);

			$arraynot2d = array_flip($shipsArray['ships']);  //	$array2d = $shipsArray['ships'];// convert to 2d array
			Dumper::dump($arraynot2d);
			$array2d=[];
			for($row = 0; $row < static::SIZE; $row++){
				for($col =0;$col < static::SIZE; $col++)
				if(array_key_exists((string)$row.'-'.(string)$col, $arraynot2d) ){
					$array2d[$row][$col]=1;
				} else{
					$array2d[$row][$col]=0;
				}
       
			} 
			Dumper::dump($array2d);

			// $this->validateShipLocation($array2d);

			 if ($this->validateShipLocation2($array2d)){
				echo 'Ships are added!';
			 } else
			 {
				echo 'The distance between ships must be one box';
			 }
			};
			return $form;
		}

		protected function validateShipLocation2($arrayToValidate){

			$flag = true;

			for($row = 0; $row < static::SIZE; $row++){
				for($col = 0; $col < static::SIZE; $col++){

						if($arrayToValidate[$row][$col] == 1 ) {

							if ($col!=0 && $arrayToValidate[$row][$col-1] ||
							    $col!=0 && $row!=0 && $arrayToValidate[$row-1][$col-1] ||
									$row!=0 && $arrayToValidate[$row-1][$col] ||
									$col!=9 && $row!=0 && $arrayToValidate[$row-1][$col+1] ||
							    $col!=9 && $arrayToValidate[$row][$col+1]==1||
									$col!=9 && $row!=9 && $arrayToValidate[$row+1][$col+1] ||
									$row!=9 && $arrayToValidate[$row+1][$col]==1 ||	
						      $col!=0 && $row!=9 && $arrayToValidate[$row+1][$col-1]							  
									)
									{
										$flag = false;													
									}
								}
							}
						}
						return $flag;
					}


/*
		protected function validateShipLocation($arrayToValidate) {

			$counter = count($arrayToValidate);
			$flag = true;

			if ($counter == 0){
				echo 'Add the ship!';
			}
				elseif ($counter == 1) { 
					echo 'The ship is added!';
					}
					else{
						foreach($arrayToValidate as $key=>$items){
							foreach($arrayToValidate as $key2=>$items){
								if($arrayToValidate[$key] != $arrayToValidate[$key2] ) {
									if ($arrayToValidate[$key] == $arrayToValidate[$key2]+1 && $items%10!=9 ||
											$arrayToValidate[$key] == $arrayToValidate[$key2]+9 && $items%10!=0 ||									
											$arrayToValidate[$key] == $arrayToValidate[$key2]+10 && $items%10!=9 ||																						
											$arrayToValidate[$key] == $arrayToValidate[$key2]+11 && $items%10!=9 ||
											$arrayToValidate[$key] == $arrayToValidate[$key2]+10)
											{
												$flag = false;													
											} 
										}
									}
								} 
								if($flag == false) {
									echo 'The distance between ships must be one box';
								}									
							}
							return $flag;
		}
		*/

	}
