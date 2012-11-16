<?php

Yii::import('zii.widgets.CPortlet');

class ShopCartPortlet extends CPortlet {
	public function	init() {
		if(Yii::app()->user->isGuest) {
			return parent::run();
		}
		return parent::init();
	}

	public function	run() {
		
		if(Yii::app()->user->isGuest) {
			return parent::run();
		}

		$this->render('shopping_cart', 
			array(
				'cart' => Yii::app()->user->getCart()
			)
		);
		
		return parent::run();
	}

}
?>
