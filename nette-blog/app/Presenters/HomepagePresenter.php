<?php

declare(strict_types=1);

namespace App\Presenters;

use LengthException;
use Nette;
use Nette\Application\UI\Form;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	const SIZE = 10; // the variable that give for us the size of batterfield

	
  protected function createComponentShipsInput(): Form
	{
		$form = new Form;

	//	$form->addText('name', 'Name:');
	//	$form->addPassword('password', 'Password:');
	//	$form->addSubmit('send', 'Sign up');
	//	$form->onSuccess[] = [$this, 'formSucceeded'];

   // $form->addCheckbox('agree', 'I agree with terms')
   // ->setRequired('You must agree with our terms');

	 $items = array_fill(0, static::SIZE*static::SIZE, '');
	 $form->addCheckboxList('ships', '',$items)
	    ->setOption('size', static::SIZE);
	
	 /*
    $form->addCheckboxList('ships', '',[
			'0' => '',
			'1' => '',
			'2' => '',
			'3' => '',
			'4' => '',
			'5' => '',
			'6' => '',
			'7' => '',
			'8' => '',
			'9' => '',
			'10' => '',
			'11' => '',
			'12' => '',
			'13' => '',
			'14' => '',
			'15' => '',
			'16' => '',
			'17' => '',
			'18' => '',
			'19' => '',
			'20' => '',
			'21' => '',
			'22' => '',
			'23' => '',
			'24' => '',
			'25' => '',
			'26' => '',
			'27' => '',
			'28' => '',
			'29' => '',
			'30' => '',
			'31' => '',
			'32' => '',
			'33' => '',
			'34' => '',
			'35' => '',
			'36' => '',
			'37' => '',
			'38' => '',
			'39' => '',
			'40' => '',
			'41' => '',
			'42' => '',
			'43' => '',
			'44' => '',
			'45' => '',
			'46' => '',
			'47' => '',
			'48' => '',
			'49' => '',
			'50' => '',
			'51' => '',
			'52' => '',
			'53' => '',
			'54' => '',
			'55' => '',
			'56' => '',
			'57' => '',
			'58' => '',
			'59' => '',
			'60' => '',
			'61' => '',
			'62' => '',
			'63' => '',
			'64' => '',
			'65' => '',
			'66' => '',
			'67' => '',
			'68' => '',
			'69' => '',
			'70' => '',
			'71' => '',
			'72' => '',
			'73' => '',
			'74' => '',
			'75' => '',
			'76' => '',
			'77' => '',
			'78' => '',
			'79' => '',
			'80' => '',
			'81' => '',
			'82' => '',
			'83' => '',
			'84' => '',
			'85' => '',
			'86' => '',
			'87' => '',
			'88' => '',
			'89' => '',
			'90' => '',
			'91' => '',
			'92' => '',
			'93' => '',
			'94' => '',
			'95' => '',
			'96' => '',
			'97' => '',
			'98' => '',
			'99' => '',
		]);
		*/
/*
    $form->addCheckbox('agree1', '');
    $form->addCheckbox('agree2', '');
    $form->addCheckbox('agree3', '');
    $form->addCheckbox('agree4', '');
    $form->addCheckbox('agree5', '');
    $form->addCheckbox('agree6', '');
    $form->addCheckbox('agree7', '');
    $form->addCheckbox('agree8', '');
    $form->addCheckbox('agree9', '');

    $form->addCheckbox('agree10', '');
		$form->addCheckbox('agree11', '');
    $form->addCheckbox('agree12', '');
    $form->addCheckbox('agree13', '');
    $form->addCheckbox('agree14', '');
    $form->addCheckbox('agree15', '');
    $form->addCheckbox('agree16', '');
    $form->addCheckbox('agree17', '');
    $form->addCheckbox('agree18', '');
    $form->addCheckbox('agree19', '');

    $form->addCheckbox('agree20', '');
		$form->addCheckbox('agree21', '');
    $form->addCheckbox('agree22', '');
    $form->addCheckbox('agree23', '');
    $form->addCheckbox('agree24', '');
    $form->addCheckbox('agree25', '');
    $form->addCheckbox('agree26', '');
    $form->addCheckbox('agree27', '');
    $form->addCheckbox('agree28', '');
    $form->addCheckbox('agree29', '');

		$form->addCheckbox('agree30', '');
		$form->addCheckbox('agree31', '');
    $form->addCheckbox('agree32', '');
    $form->addCheckbox('agree33', '');
    $form->addCheckbox('agree34', '');
    $form->addCheckbox('agree35', '');
    $form->addCheckbox('agree36', '');
    $form->addCheckbox('agree37', '');
    $form->addCheckbox('agree38', '');
    $form->addCheckbox('agree39', '');

		$form->addCheckbox('agree40', '');
		$form->addCheckbox('agree41', '');
    $form->addCheckbox('agree42', '');
    $form->addCheckbox('agree43', '');
    $form->addCheckbox('agree44', '');
    $form->addCheckbox('agree45', '');
    $form->addCheckbox('agree46', '');
    $form->addCheckbox('agree47', '');
    $form->addCheckbox('agree48', '');
    $form->addCheckbox('agree49', '');

		$form->addCheckbox('agree50', '');
		$form->addCheckbox('agree51', '');
    $form->addCheckbox('agree52', '');
    $form->addCheckbox('agree53', '');
    $form->addCheckbox('agree54', '');
    $form->addCheckbox('agree55', '');
    $form->addCheckbox('agree56', '');
    $form->addCheckbox('agree57', '');
    $form->addCheckbox('agree58', '');
    $form->addCheckbox('agree59', '');

		$form->addCheckbox('agree60', '');
		$form->addCheckbox('agree61', '');
    $form->addCheckbox('agree62', '');
    $form->addCheckbox('agree63', '');
    $form->addCheckbox('agree64', '');
    $form->addCheckbox('agree65', '');
    $form->addCheckbox('agree66', '');
    $form->addCheckbox('agree67', '');
    $form->addCheckbox('agree68', '');
    $form->addCheckbox('agree69', '');

		$form->addCheckbox('agree70', '');
		$form->addCheckbox('agree71', '');
    $form->addCheckbox('agree72', '');
    $form->addCheckbox('agree73', '');
    $form->addCheckbox('agree74', '');
    $form->addCheckbox('agree75', '');
    $form->addCheckbox('agree76', '');
    $form->addCheckbox('agree77', '');
    $form->addCheckbox('agree78', '');
    $form->addCheckbox('agree79', '');

		$form->addCheckbox('agree80', '');
		$form->addCheckbox('agree81', '');
    $form->addCheckbox('agree82', '');
    $form->addCheckbox('agree83', '');
    $form->addCheckbox('agree84', '');
    $form->addCheckbox('agree85', '');
    $form->addCheckbox('agree86', '');
    $form->addCheckbox('agree87', '');
    $form->addCheckbox('agree88', '');
    $form->addCheckbox('agree89', '');

		$form->addCheckbox('agree90', '');
		$form->addCheckbox('agree91', '');
    $form->addCheckbox('agree92', '');
    $form->addCheckbox('agree93', '');
    $form->addCheckbox('agree94', '');
    $form->addCheckbox('agree95', '');
    $form->addCheckbox('agree96', '');
    $form->addCheckbox('agree97', '');
    $form->addCheckbox('agree98', '');
    $form->addCheckbox('agree99', '');
*/
    $form->addSubmit('submit', 'Check ships');



		$form->onSuccess[] = function ($form){
			print_r($form->getValues());

		};



		return $form;
	}

	/*
	public function formSucceeded(Form $form, $data): void
	{
		// here we will process the data sent by the form
		// $data->name contains name
		// $data->password contains password
		$this->flashMessage('You have successfully signed up.');
		$this->redirect('Homepage:');
	}
*/
  
}
