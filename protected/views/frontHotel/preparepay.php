
<body onLoad="document.paypal_process_form.submit();">
<?php
	echo CHtml::beginForm("/paypal/Process", "post", array("name"=>"paypal_process_form"));
	
	$total_price = 0;
	$total_agent_price = 0;
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
?>
<input type="hidden" id="custom_field" name="custom_field" value="<?php echo $model->id_cart; ?>">
<input type="hidden" id="id_cart" name="id_cart" value=<?php echo $model->id_cart; ?> />
<input type="hidden" id="item_name" name="item_name" value=<?php echo "Holidoy.com.au"; ?> />
<input type="hidden" id="amount" name="amount" value=<?php echo $total_price; ?> />
<input type="hidden" id="quantity" name="quantity" value=<?php echo "1"; ?> />
<?php
	echo CHtml::endForm(); 
?>