<?php
	$this->breadcrumbs=array(
		'Suppliers'=>'/supplier', 'Edit Prices',
	);

	echo CHtml::form();
	echo "<h1>Edit Prices</h1>";
?>
	<table>
<?php
	foreach ($productdates as $productdate) {
		echo $productdate->price."<br>";
	}
?>
	</table>
<?php 
	echo CHtml::endForm();
?>