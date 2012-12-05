<?php
	$this->pageTitle=Yii::app()->name;
?>

<div>
<?php
	echo CHtml::beginForm("/front/UserPayment");

	if(Yii::app()->user->isGuest) {
		$model = new User();
		
		echo CHtml::label("First Name:", "firstname");
		echo CHtml::activeTextField($model, "firstname");
		
		echo CHtml::label("Last Name:", "lastname");
		echo CHtml::activeTextField($model, "lastname");
		
		echo CHtml::label("Email:", "email");
		echo CHtml::activeTextField($model, "email");
		
		
		echo CHtml::label("Create a password:", "passwd");
		echo CHtml::activePasswordField($model, "passwd");
		
		echo CHtml::label("Confirm your password:", "confirm_password");
		echo CHtml::passwordField("confirm_password");
	} else {
		$model = User::model()->findByPk(Yii::app()->user->id_user);
		
		echo CHtml::label("First Name:", "firstname");
		echo CHtml::activeTextField($model, "firstname");
		
		echo CHtml::label("Last Name:", "lastname");
		echo CHtml::activeTextField($model, "lastname");
		
		echo CHtml::label("Email:", "email");
		echo CHtml::activeTextField($model, "email");
	}
	
	echo "<br>";
	echo CHtml::submitButton("Pay");
	echo CHtml::endForm();
?>
</div>