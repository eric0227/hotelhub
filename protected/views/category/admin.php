<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php 

$models = $model->search();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=> $models,
	'filter'=>$model,
	'columns'=>array(
		'id_category',
		'id_service',
		'id_parent',
		'level_depth',
		'nleft',
		'nright',
		'active',
		'position',
		/*
		'date_add',
		'date_upd',		
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php

$items = array(); 

foreach($models->getData() as $item) {
	//echo $item->id_category;
	$items[] = array('id' => $item->id_category, 'parent_id' => $item->id_parent, 'name' => $item->id_category);
}



$this->widget('ext.treetable.JTreeTable',array(
    'id'=>'treeTable',
    'primaryColumn'=>'id',
    'parentColumn'=>'parent_id',
    'columns'=>array(
        'id'=>array(
            'label'=>'Id',
            'headerHtmlOptions'=>array('width'=>80),
            'htmlOptions'=>array('align'=>'center'),
		),
        'name'=>'Name',
	),
/*	
    'items'=>array(    
		array('id'=>1,'parent_id'=>0,'name'=>'test 1'),
		array('id'=>2,'parent_id'=>1,'name'=>'test 1\'s children 1'),		
	),
*/
	'items' => $items,	
    'options'=>array(
        'initialState'=>'expanded',
	),
));

?>
