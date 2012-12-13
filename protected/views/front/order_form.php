<?php
	$this->pageTitle=Yii::app()->name;
?>

<div>
<?php
	echo CHtml::beginForm(Yii::app()->request->baseUrl."/front/UserPayment", "post");

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
		
		echo CHtml::label("Confirm your password:", "repeat_passwd");
		echo CHtml::activePasswordField($model, "repeat_passwd");
		
		echo CHtml::hiddenField("is_guest", "1");
	} else {
		$model = User::model()->findByPk(Yii::app()->user->id_user);
		
		echo CHtml::label("First Name:", "firstname");
		echo CHtml::activeTextField($model, "firstname");
		
		echo CHtml::label("Last Name:", "lastname");
		echo CHtml::activeTextField($model, "lastname");
		
		echo CHtml::label("Email:", "email");
		echo CHtml::activeTextField($model, "email");
		
		echo CHtml::hiddenField("id_user", $model->id_user);
	}
	
	echo CHtml::hiddenField("id_product", 1);	// this's test value.
	echo CHtml::hiddenField("quantity", 1);	// this's test value.
	echo "<br>";
	echo CHtml::submitButton("Pay Now");
	echo CHtml::endForm();
?>
</div>