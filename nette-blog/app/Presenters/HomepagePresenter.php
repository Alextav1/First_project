<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
  protected function createComponentRegistrationForm(): Form
	{
		$form = new Form;
	//	$form->addText('name', 'Name:');
	//	$form->addPassword('password', 'Password:');
	//	$form->addSubmit('send', 'Sign up');
	//	$form->onSuccess[] = [$this, 'formSucceeded'];

   // $form->addCheckbox('agree', 'I agree with terms')
   // ->setRequired('You must agree with our terms');

    $form->addCheckbox('agree0', ''); $form->addCheckbox('agree10', '');
    $form->addCheckbox('agree1', '');
    $form->addCheckbox('agree2', '');
    $form->addCheckbox('agree3', '');
    $form->addCheckbox('agree4', '');
    $form->addCheckbox('agree5', '');
    $form->addCheckbox('agree6', '');
    $form->addCheckbox('agree7', '');
    $form->addCheckbox('agree8', '');
    $form->addCheckbox('agree9', '');


		return $form;
	}

	public function formSucceeded(Form $form, $data): void
	{
		// here we will process the data sent by the form
		// $data->name contains name
		// $data->password contains password
		$this->flashMessage('You have successfully signed up.');
		$this->redirect('Homepage:');
	}

  
}
