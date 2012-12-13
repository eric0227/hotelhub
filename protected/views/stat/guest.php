
<?php
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'guest-form',
		'enableAjaxValidation'=>false,
	));
	
	echo $form->labelEx($model,'from_date');	
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
	    'name'=>'StatSearchForm[from_date]',
		'value'=>(!empty($model->from_date))? substr($model->from_date, 0, 10) : date('Y-m-d'),
	    'options'=>array(
	        'showAnim'=>'fold',
			'mode'=>'datetime',
			'dateFormat'=>'yy-mm-dd',
		
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;',
		),
	));
?>
<?php
	echo $form->labelEx($model,'to_date');
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
	    'name'=>'StatSearchForm[to_date]',
		'value'=>(!empty($model->to_date))? substr($model->to_date, 0, 10) : date('Y-m-d'),
	    'options'=>array(
	        'showAnim'=>'fold',
			'mode'=>'datetime',
			'dateFormat'=>'yy-mm-dd',

		),
		'htmlOptions'=>array(
			'style'=>'height:20px;',
		),
	));	
?>	

<?php echo $form->dropDownListRow($model, 'room_name', StatSearchForm::getRoomName(Yii::app()->user->id), array('prompt'=>'ALL')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php 
	//var_dump($dataProvider);
	$this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'guest-grid',
		'dataProvider'=> $dataProvider,
		'columns'=>array(
			array(
		        'header'=>CHtml::encode('Transaction'),
		        'name'=>'id_order',
			),
			array(
				'header'=>CHtml::encode('Guest Name'),
				'name'=>'username',
			),
			array(
				'header'=>CHtml::encode('Check In'),
				'name'=>'checkin',
			),
			array(
				'header'=>CHtml::encode('Check Out'),
				'name'=>'checkout',
			),
			array(
				'header'=>CHtml::encode('Room Rights'),
				'name'=>'rights',
			),
			array(
				'header'=>CHtml::encode('Room Type'),
				'name'=>'room_name',
			),	
			array(
				'header'=>CHtml::encode('Total Price'),
				'name'=>'total_price',
			),
		),
	));
?>