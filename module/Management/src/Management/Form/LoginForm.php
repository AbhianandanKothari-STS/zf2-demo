<?php
namespace Management\Form;
use Zend\Form\Form;

class LoginForm extends Form
{
	public function __construct()
	{
		parent::__construct();
		$this->setAttribute('method', 'post');
		$this->add(array(
				'name' => 'username',
				'type' => 'Text',
				'attributes' =>array(
						'class' => 'textbox'
					),
				'options' => array(
						'label' => 'Username',
						'label_attributes' => array(
								'class' => 'label1'
						),
					),
			));
		$this->add(array(
				'name' => 'password',
				'type' => 'Text',
				'attributes' =>array(
						'class' => 'textbox'
				),
				'options' => array(
						'label' => 'Password',
						'label_attributes' => array(
								'class' => 'label1'
						)
					),				
			));
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Login',
						'id' => 'submitbutton',
				),
			));
	}

}

?>