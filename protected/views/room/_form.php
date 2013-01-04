<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'room-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<fieldset>
		<legend>New Room</legend>
		<fieldset>
			<legend>Basic Information</legend>

			<?php
				if($product->isNewRecord && Yii::app()->user->isAdmin()) {
					echo $form->dropDownListRow($product,'id_supplier',Supplier::items(), array('class'=>'span5','maxlength'=>10));
				}
			?>
			
			<?php
				if($model->isNewRecord) {
					/*
					$command = Yii::app()->db->createCommand();
					$command->select('a.id_product')->from('gc_product as a');
					$command->join('gc_room as b', 'a.id_product <> b.id_product');
					$rows = $command->queryAll();
					print_r($items);
					$items = array();
					foreach($rows as $row) {
						$items[$row[id_product]] = $row[id_product];
					}
					
					echo $form->dropDownListRow($model, 'id_product', $items, array('class' => 'span5'));
					*/
				} else {
					echo $form->hiddenField($model, 'id_product');
				}
			?>
			<?php //echo $form->dropDownListRow($model, 'id_product', Product::items(), array('class' => 'span5')); ?>
			<?php  ?>
				
			<?php echo $form->dropDownListRow($model,'room_code', Code::items(CodeType::ROOM), array('class' => 'span5')); ?>
			<?php echo $form->textFieldRow($model,'room_type_code',array('class'=>'span5','maxlength'=>64)); ?>
			<?php echo $form->textFieldRow($model,'lead_in_room_type',array('class'=>'span5')); ?>
			<?php echo $form->textFieldRow($model,'full_rate',array('class'=>'span5','maxlength'=>10)); ?>
			<?php echo $form->textFieldRow($model,'min_night_stay',array('class'=>'span5','maxlength'=>2)); ?>
			<?php echo $form->textFieldRow($model,'max_night_stay',array('class'=>'span5','maxlength'=>2)); ?>
			
		</fieldset>
		<fieldset>
			<legend>Basic Description</legend>
			
			<?php //echo $form->textFieldRow($model,'room_name',array('class'=>'span5','maxlength'=>64)); ?>
			<?php //echo $form->textFieldRow($model,'root_description',array('class'=>'span5','maxlength'=>300)); ?>
			
			<?php echo $form->errorSummary($product); ?>
			<?php $this->widget('MultiLangSelector'); ?>
			<?php
				echo $form->dropDownListRow($product, 'id_category_default', Category::items(),array('class' => 'span5'));
			?>
			<?php echo $form->textFieldRow($product,'name',array('class'=>'span5', 'multilang'=>'1')); ?>
			<?php echo $form->textAreaRow($product,'description',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>
			<?php echo $form->textAreaRow($product,'description_short',array('rows'=>6, 'cols'=>30, 'class'=>'span5', 'multilang'=>'1')); ?>
			
			<?php echo $form->textFieldRow($product,'price',array('class'=>'span5'));  ?>
			<?php echo $form->textFieldRow($product,'agent_price',array('class'=>'span5'));  ?>
		</fieldset>
		
		<script> 
			$(function() {
				$('#Room_guests_tot_room_cap').on('change', function() {
										
					var cnt = $(this).val();
					var strHtml = "";
					for(var i = 1; i <= cnt; i++) {
						strHtml += "<option value=\"" + i + "\">" + i + "</option>";
					}

					$('#Room_guests_included_price').html(strHtml);
				});

	<?php if($model->isNewRecord == false) { ?>
				setTimeout(
					function() {
						$('#Room_guests_tot_room_cap').trigger('change');
					},
					1000
				);
	<?php } ?>			
				
			});
			
		</script>
		
		<fieldset>
			<legend>Guests Information</legend>
			<?php //echo $form->textFieldRow($model,'guests_tot_room_cap',array('class'=>'span5','maxlength'=>2)); ?>
			<?php echo $form->dropDownListRow($model,'guests_tot_room_cap', Room::numberForSelectItems(1, 15),
				array('class' => 'span5',
						'ajax' => array(
						'type' => 'POST',
						'url' => CController::createUrl('room/beddingConfig'),
						'update' => '#bedding'))); ?>
			<?php //echo $form->dropDownListRow($model,'guests_included_price', Room::numberForSelectItems(1, 15), array('class'=>'span5','maxlength'=>2)); ?>
			<?php echo $form->textFieldRow($model, 'children_maxnum', array('class'=>'span5','maxlength'=>2)); ?>
			<?php echo $form->textFieldRow($model, 'children_years', array('class'=>'span5','maxlength'=>2)); ?>
			<?php echo $form->textFieldRow($model, 'children_extra', array('class'=>'span5','maxlength'=>20)); ?>
			<?php echo $form->textFieldRow($model, 'adults_maxnum', array('class'=>'span5','maxlength'=>2)); ?>
			<?php echo $form->textFieldRow($model, 'adults_extra', array('class'=>'span5','maxlength'=>20)); ?>
		</fieldset>
		
		<div>
			<fieldset>
				<legend>Bedding Configuration</legend>
				<table>
					<thead>
						<th width="45%">Icon Displayed</th>
						<th width="5%">Available<!-- <div class="comments">You may select more than one.</div> --></th>
						<th width="10%">Default<!-- <div class="comments">Select the standard configuration.</div> --></th>
						<th width="20%">Bedding Description<!-- <div class="comments">If you wish, you may modify these descriptions to indicate different bed sizes (e.g. king) or bed types (e.g. roll-away, fold-out sofa etc.). Short descriptions will work best.</div> --></th>
						<th width="10%">Additional Cost($)<!-- <div class="comments">You may charge extra for configurations other than your default.</div> --></th>
						<th width="10%">Cots Available<!-- <div class="comments">at an additional cost of ... each per night</div> --></th>
					</thead>
					<tbody id="bedding">
					</tbody>
				</table>
			</fieldset>
		</div>
		
		<div id="test"></div>

		<div>
		<?php 
			$attributeInfos = $model->getAllAttributes();
			foreach($attributeInfos as $info) {
				echo '<div>';
				echo '<fieldset><legend>' . $info['attribute']->name . '</legend>';
					
				echo CHtml::checkBoxList('selectedAttributeItemIds' , $info['selectedAttributeItemIds'],
					CHtml::listData(
						$info['attributeItem'],
						'id_attribute_item',
						'item'
					),
					array('container' => 'span',
					'separator' => '',
					'template' => '<p class="label_checkbox_pair">{input}{label}</p>')
					);
				echo '</fieldset></div>';
				echo '<div class="cb"></div>';
			}
		?>
		</div>
	</fieldset>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
	
<?php
	
?>	

<?php $this->endWidget(); ?>
