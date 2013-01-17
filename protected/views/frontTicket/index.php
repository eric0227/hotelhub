<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$countryList = Country::model()->findAllByAttributes(array('active'=>1), array('order' => 'name asc'));

$search = array();

if(!empty($_REQUEST['country'])) $search['country'] = $_REQUEST['country'];
if(!empty($_REQUEST['destination'])) $search['destination'] = $_REQUEST['destination'];

$destinations = SearchProduct::countProductDestination($search);
//print_r($destinations);

$products = SearchProduct::findAllProduct($search);
//print_r($products);
?>

<script>
	$(function() {
		$('#country').on('change', function() {
			$('#search').submit();
		});
	})
	
	function selectDestination(destination) {
		$('input[name=destination]').val(destination);
		$('#search').submit();
	}

	function viewProduct(id) {
		location = "<?php echo Yii::app()->request->baseUrl; ?>/frontTicket/view/"+id;
	}

</script>

<div id="attraction">

	<div id="side">
		<div id="left_select_country">
			
			<div class="block">
				<form action="<?php echo Yii::app()->request->baseUrl; ?>/frontTicket/" method="get" id="search">
				<input type="hidden" name="destination" />
				
				<select name="country" id="country" style="width:170px;" >
					<option value="">Country</option>
					<?php foreach($countryList as $country): ?>
					<option value="<?php echo $country->id_country ?>" <?php echo $country->id_country == $_REQUEST['country'] ? 'selected' : '' ?>><?php echo $country->name ?></option>
					<?php endforeach; ?>
				</select>
				<div>
					<ul class="list">
					
					<?php foreach($destinations as $destination) { ?>
						<li>
							<a href="javascript:selectDestination(<?php echo $destination['id_destination']?>)"><?php echo $destination['name'] ?></a>
							<span class="badge badge-info pull-right"><?php echo $destination['cnt'] ?></span>
						</li>
					<?php } ?>	
					</ul>
				</div>
				
				</form>	
			</div>
			
		</div>
		<div id="left_googlemap">
			
		</div>
	</div>

	<div id="product_list" class="main_area">
		<div class="title"> <h1> Sydney </h1></div>
		
	<?php foreach($products as $product ) { 
		$productModel = Product::model()->findByPk($product['id_product']);
		$coverImage = $productModel->getCoverImage();
	?>	
		<div class="product_row" onclick="viewProduct(<?php echo $product['id_product'] ?>)">
			<div class="product_img">
			<?php 
				if (empty($coverImage)) {
					echo 'NO IMG';
				} else {
					echo '<img src="'. $coverImage->getLink('medium') .'" />'; 
				}
			?>
			</div>
			<div class="product_name"><?php echo $product['name'] ?></div>
			<div class="product_price">$<?php echo number_format($product['price'],2) ?></div>
		</div>
		<div class="product_line"> </div>
	<?php }?>	
	</div>
</div>