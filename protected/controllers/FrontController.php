<?php

class FrontController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionDisplayResults()
	{
		$this->render('display_results');
	}
	
	public function actionUserPayment()
	{
		$this->render('display_results');
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'email' => 'Email',
			'passwd' => 'Passwd',
		);
	}
	
}