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

		$items = array_fill(0, static::SIZE*static::SIZE, '');

		$form->addCheckboxList('ships', '',$items)
		     ->setOption('size', static::SIZE);
	
    $form->addSubmit('submit', 'Check ships');

		$form->onSuccess[] = function ($form)
		{
			print_r($form->getValues());
			$shipsArray = $form->getValues();

			 $this->validateShipLocation($shipsArray->ships);
			};
			return $form;
		}


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
	}
