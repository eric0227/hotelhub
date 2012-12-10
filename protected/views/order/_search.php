<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'id'=>'search_form',
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_order',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'id_user',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'invoice_number',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'on_agent',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'id'=>'search_button',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>
	
	<script>
		$(function() {
			$('#search_button').on('click', function() {
				$('#search_form').submit();
			});
		});
	</script>

<?php $this->endWidget(); ?>
