<?php
$this->breadcrumbs=array(
	'Carts'=>array('index'),
	$model->id_cart,
);

$this->menu=array(
	array('label'=>'List Cart','url'=>array('index')),
	array('label'=>'Create Cart','url'=>array('create')),
	array('label'=>'Update Cart','url'=>array('update','id'=>$model->id_cart)),
	array('label'=>'Delete Cart','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cart),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cart','url'=>array('admin')),
);
?>

<h1>View Cart #<?php echo $model->id_cart; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_cart',
		'id_address_delivery',
		'id_address_invoice',
		'id_currency',
		'id_user',
		'secure_key',
		'recyclable',
		'gift',
		'gift_message',
		'date_add',
		'date_upd',
		'on_order',
	),
)); ?>

<div>
<form method="post" action="<?php echo Yii::app()->baseUrl."/paypal/Process"; ?>">
<input type="hidden" id="id_cart" value=<?php echo $model->id_cart; ?> />
<?php
	$total_price = 0;
	$total_agent_price = 0;
	/*
	$products = $model->cartProducts;
	foreach($products as $product) {
		echo $product->id_product."<br>";
		echo $product->quantity."<br>";
		$price = Product::model()->findByPk($product->id_product)->price;
		echo $price."<br>";
		
		$total_price += $price * $product->quantity;
	}
	*/
	$cart = Cart::model()->findByPk($model->id_cart);
	$cartProducts = $cart->cartProducts;
	
	$priceSum = 0;
	$agentPriceSum = 0;
	if(isset($cartProducts)) {
		foreach($cartProducts as $cartProduct) {
			$product = $cartProduct->product;
			$productDate = $cartProduct->productDate;
	
			if(isset($productDate)) {
				$priceSum = $priceSum + $productDate->price;
				$agentPriceSum = $agentPriceSum + $productDate->agent_price;
			} else {
				$priceSum = $priceSum + $product->price;
				$agentPriceSum = $agentPriceSum + $product->agent_price;
			}
	
		}
	}
	
	$total_price = $priceSum;
	$total_agent_price = $agentPriceSum;
	
	
	
	echo "total_price: ".$total_price;
?>

<input type="hidden" id="custom_field" name="custom_field" value="<?php echo $model->id_cart; ?>">
<input type="hidden" id="id_cart" name="id_cart" value=<?php echo $model->id_cart; ?> />
<input type="hidden" id="item_name" name="item_name" value=<?php echo "Holidoy.com.au"; ?> />
<input type="hidden" id="amount" name="amount" value=<?php echo $total_price; ?> />
<input type="hidden" id="quantity" name="quantity" value=<?php echo "1"; ?> />

<?php
	//echo CHtml::button('Check Out', array('id'=>'check_out', 'name'=>'check_out', 'id_cart'=>$model->id_cart));
	echo CHtml::submitButton('Check Out');
?>
</form>
</div>
