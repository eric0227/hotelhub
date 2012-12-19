<?php
class DateInfo {
	public $id_product_date = "";
	public $on_date = "";
	public $price = "";
	public $product_description = "";
	public $out_of_stock = "";
}

class HotelInfo {
	public $id_supplier = "";
	public $id_product = "";
	public $name = "";
	public $title = "";
	public $date_info = "";

	function __construct() {
		$this->date_info = new DateInfo;
	}
}


class BedInfo {
	public $id_bedding = "";
	public $single_num = "";
	public $double_num = "";
	public $bedding_desc = "";
	public $additional_cost = "";
}

class RoomInfo {
	public $id_supplier = "";
	public $id_product = "";
	public $name = "";
	public $title = "";
	
	public $guests_tot_room_cap = "";
	public $guests_included_price = "";
	public $children_maxnum = "";
	public $children_years = "";
	public $children_extra = "";
	public $adults_maxnum = "";
	public $adults_extra = "";
	
	public $bed_info = "";

	function __construct() {
		$this->bed_info = new BedInfo;
	}
}


class Search {
	static public function newHotelInfo() {
		return new HotelInfo();
	}
	
	static public function newDateInfo() {
		return new DateInfo();
	}
	
	static public function findAllHotel($search /*$country, $destination, $start_date, $last_date*/) {
		/*	SELECT pro_date.* , pro_lang.*, room.*, sup_lang.*
			FROM gc_address AS addr
			INNER JOIN gc_user AS usr ON addr.id_address = usr.id_address_default
			INNER JOIN gc_supplier AS sup ON usr.id_user = sup.id_supplier
			INNER JOIN gc_product AS pro ON sup.id_supplier = pro.id_supplier
			INNER JOIN gc_product_date AS pro_date ON pro_date.id_product = pro.id_product
			INNER JOIN gc_room AS room ON room.id_product = pro_date.id_product
			LEFT JOIN gc_product_lang AS pro_lang ON pro_lang.id_product = pro.id_product
			LEFT JOIN gc_supplier_lang AS sup_lang ON sup_lang.id_supplier = pro.id_supplier
			WHERE addr.id_country =24
			AND addr.id_destination =2
			AND sup.id_service =1
			AND pro.active = 1
			AND pro_date.active = 1
			AND pro_lang.id_lang = 1
			AND sup_lang.id_lang = 1
			AND room.lead_in_room_type = 1
			AND pro_date.on_date BETWEEN '2012-12-10' AND '2012-12-31'
			ORDER BY pro.id_product, pro_date.on_date
		*/

		$where = array();
		if(!empty($search['country'])) $where[] = "addr.id_country = {$search['country']}";
		if(!empty($search['destination'])) $where[] = "addr.id_destination = {$search['destination']}";
		if(!empty($search['start_date'])) $where[] = "pro_date.on_date >= '{$search['start_date']}'";
		if(!empty($search['last_date'])) $where[] = "pro_date.on_date <= '{$search['last_date']}'";
		if(!empty($search['search_text'])) $where[] = "sup_lang.title like '%{$search['search_text']}%'";
		
		$where[] = "sup.id_service = " . Service::HOTEL;
		$where[] = "pro.active = 1";
		$where[] = "pro_date.active = 1";
		$where[] = "pro_lang.id_lang = ".Lang::getCurrentLang();
		$where[] = "sup_lang.id_lang = ".Lang::getCurrentLang();
		$where[] = "room.lead_in_room_type = 1";
				
		$cmd = Yii::app()->db->createCommand()
				->select('pro_date.*, pro_lang.*, room.*, sup_lang.*')
				->from('gc_address as addr')
				->join('gc_user as usr', 'addr.id_address = usr.id_address_default')
				->join('gc_supplier as sup', 'usr.id_user = sup.id_supplier')
				->join('gc_product as pro', 'sup.id_supplier = pro.id_supplier')
				->join('gc_product_date as pro_date', 'pro_date.id_product = pro.id_product')
				->join('gc_room as room', 'room.id_product = pro_date.id_product')
				->leftJoin('gc_product_lang as pro_lang', 'pro_lang.id_product = pro.id_product')
				->leftJoin('gc_supplier_lang as sup_lang', 'sup_lang.id_supplier = pro.id_supplier')
				->where(implode(" and ", $where))
				->order(array('pro.id_product', 'pro_date.on_date'));
		
		//echo $cmd->text;
		
		$results = $cmd->queryAll();
		
		$items = Array();
		$before_id_product = "";
		$hotel = "";
		foreach($results as $result) {
			if($before_id_product != $result['id_product']) {
				$hotel = new HotelInfo;
				$hotel->id_product = $result['id_product'];
				$hotel->id_supplier = $result['id_supplier'];
				$hotel->name = $result['name'];
				$hotel->title = $result['title'];
				$hotel->date_info = array();
				array_push($items, $hotel);
				
				$date_info = new DateInfo;
				$date_info->id_product_date = $result['id_product_date'];
				$date_info->on_date = $result['on_date'];
				$date_info->price = $result['price'];
				$date_info->agent_price = $result['agent_price'];
				$date_info->product_description = $result['description'];
				$date_info->out_of_stock = $result['out_of_stock'];
				
				$hotel->date_info[$date_info->on_date] = $date_info;
			} else {
				$date_info = new DateInfo;
				$date_info->id_product_date = $result['id_product_date'];
				$date_info->on_date = $result['on_date'];
				$date_info->price = $result['price'];
				$date_info->agent_price = $result['agent_price'];
				$date_info->product_description = $result['description'];
				$date_info->out_of_stock = $result['out_of_stock'];
				
				$hotel->date_info[$date_info->on_date] = $date_info;
			}
			
			$before_id_product = $result['id_product'];
		}
		
		//var_dump($hotel);
		
		if(count($items) == 0) {
			$hotel = new HotelInfo;
			$hotel->name = "There is no data.";
			$hotel->date_info = array();
			$date_info = new DateInfo;
			$hotel->date_info[] = $date_info;
			array_push($items, $hotel);
		}
		
		return $items;
	}
	
	static public function findAllHotelRoom($search /*$id_supplier, $country, $destination, $start_date = null, $last_date = null, $id_product = null */) {
		/*	SELECT pro_date.* , pro_lang.*, room.*, sup_lang.*
			FROM gc_address AS addr
			INNER JOIN gc_user AS usr ON addr.id_address = usr.id_address_default
			INNER JOIN gc_supplier AS sup ON usr.id_user = sup.id_supplier
			INNER JOIN gc_product AS pro ON sup.id_supplier = pro.id_supplier
			INNER JOIN gc_product_date AS pro_date ON pro_date.id_product = pro.id_product
			INNER JOIN gc_room AS room ON room.id_product = pro_date.id_product
			LEFT JOIN gc_product_lang AS pro_lang ON pro_lang.id_product = pro.id_product
			LEFT JOIN gc_supplier_lang AS sup_lang ON sup_lang.id_supplier = pro.id_supplier
			WHERE addr.id_country =24
			AND addr.id_destination =2
			AND sup.id_service =1
			AND pro.active = 1
			AND pro_date.active = 1
			AND pro_lang.id_lang = 1
			AND sup_lang.id_lang = 1
			AND room.id_supplier = 2
			AND pro_date.on_date BETWEEN '2012-12-10' AND '2012-12-31'
			ORDER BY pro.id_product, pro_date.on_date
		*/
		
		$where = array();
		if(!empty($search['id_supplier'])) $where[] = "room.id_supplier = {$search['id_supplier']}";
		if(!empty($search['country'])) $where[] = "addr.id_country = {$search['country']}";
		if(!empty($search['destination'])) $where[] = "addr.id_destination = {$search['destination']}";
		if(!empty($search['start_date'])) $where[] = "pro_date.on_date >= '{$search['start_date']}'";
		if(!empty($search['last_date'])) $where[] = "pro_date.on_date <= '{$search['last_date']}'";
		if(!empty($search['search_text'])) $where[] = "sup_lang.title like '%{$search['search_text']}%'";
		
		if(!empty($search['id_product'])) $where[] = "pro.id_product = {$search['id_product']}";
		
		
		$where[] = "sup.id_service = " . Service::HOTEL;
		$where[] = "pro.active = 1";
		$where[] = "pro_date.active = 1";
		$where[] = "pro_lang.id_lang = ".Lang::getCurrentLang();
		$where[] = "sup_lang.id_lang = ".Lang::getCurrentLang();
				

		$cmd = Yii::app()->db->createCommand()
			->select('pro_date.*, pro_lang.*, room.*, sup_lang.*')
			->from('gc_address as addr')
			->join('gc_user as usr', 'addr.id_address = usr.id_address_default')
			->join('gc_supplier as sup', 'usr.id_user = sup.id_supplier')
			->join('gc_product as pro', 'sup.id_supplier = pro.id_supplier')
			->join('gc_product_date as pro_date', 'pro_date.id_product = pro.id_product')
			->join('gc_room as room', 'room.id_product = pro_date.id_product')
			->leftJoin('gc_product_lang as pro_lang', 'pro_lang.id_product = pro.id_product')
			->leftJoin('gc_supplier_lang as sup_lang', 'sup_lang.id_supplier = pro.id_supplier')
			->where(implode(" and ", $where))
			->order(array('pro.id_product', 'pro_date.on_date'));
		
		//echo $cmd->text;
		$results = $cmd->queryAll();


		$items = Array();
		$before_id_product = "";
		$hotel = "";
		foreach($results as $result) {
			if($before_id_product != $result['id_product']) {
				$hotel = new HotelInfo;
				$hotel->id_product = $result['id_product'];
				$hotel->id_supplier = $result['id_supplier'];
				$hotel->name = $result['name'];
				$hotel->title = $result['title'];
				$hotel->date_info = array();
				array_push($items, $hotel);
	
				$date_info = new DateInfo;
				$date_info->id_product_date = $result['id_product_date'];
				$date_info->on_date = $result['on_date'];
				$date_info->price = $result['price'];
				$date_info->agent_price = $result['agent_price'];
				$date_info->product_description = $result['description'];
				$date_info->out_of_stock = $result['out_of_stock'];
	
				$hotel->date_info[$date_info->on_date] = $date_info;
			} else {
				$date_info = new DateInfo;
				$date_info->id_product_date = $result['id_product_date'];
				$date_info->on_date = $result['on_date'];
				$date_info->price = $result['price'];
				$date_info->agent_price = $result['agent_price'];
				$date_info->product_description = $result['description'];
				$date_info->out_of_stock = $result['out_of_stock'];
	
				$hotel->date_info[$date_info->on_date] = $date_info;
			}
				
			$before_id_product = $result['id_product'];
		}
		
		//var_dump($hotel);
	
		if(count($items) == 0) {
			$hotel = new HotelInfo;
			$hotel->name = "There is no data.";
			$hotel->date_info = array();
			$date_info = new DateInfo;
			$hotel->date_info[] = $date_info;
			array_push($items, $hotel);
		}
		
		return $items;
	}
	
	static public function findInfoHotelRoom($id_product) {
		/*	SELECT pro.*, pro_lang.*, sup_lang.*, room.*, bed.*
			FROM gc_product as pro
			INNER JOIN gc_product_lang as pro_lang on pro.id_product = pro_lang.id_product
			INNER JOIN gc_supplier_lang as sup_lang on pro.id_supplier = sup_lang.id_supplier
			INNER JOIN gc_room as room on room.id_product = pro.id_product
			INNER JOIN gc_bedding as bed on bed.id_room = room.id_product
			WHERE pro.id_product = 2
			AND pro_lang.id_lang = 1
			AND sup_lang.id_lang = 1
			AND bed.active = 1 AND bed.deleted != 1
		*/
		$results = Yii::app()->db->createCommand()
			->select('pro.*, pro_lang.*, sup_lang.*, room.*, bed.*')
			->from('gc_product as pro')
			->join('gc_product_lang as pro_lang', 'pro.id_product = pro_lang.id_product')
			->join('gc_supplier_lang as sup_lang', 'pro.id_supplier = sup_lang.id_supplier')
			->join('gc_room as room', 'room.id_product = pro.id_product')
			->join('gc_bedding as bed', 'bed.id_room = room.id_product')
			->where('pro.id_product IN ('.implode(",", $id_product).')
				and pro_lang.id_lang = :id_pro_lang and sup_lang.id_lang = :id_sup_lang
				and bed.active = 1 and bed.deleted != 1',
			array(':id_pro_lang' => Lang::getCurrentLang(),
				':id_sup_lang' => Lang::getCurrentLang(),
				))
			->queryAll();

		$items = Array();
		$before_id_product = "";
		$room = "";
		//var_dump($results);die();
		foreach($results as $result) {
			if($before_id_product != $result['id_product']) {
				$room = new RoomInfo;
				$room->id_product = $result['id_product'];
				$room->id_supplier = $result['id_supplier'];
				$room->name = $result['name'];
				$room->title = $result['title'];
				
				$room->guests_tot_room_cap = $result['guests_tot_room_cap'];
				$room->guests_included_price = $result['guests_included_price'];
				$room->children_maxnum = $result['children_maxnum'];
				$room->children_years = $result['children_years'];
				$room->children_extra = $result['children_extra'];
				$room->adults_maxnum = $result['adults_maxnum'];
				$room->adults_extra = $result['adults_extra'];

				$room->bed_info = array();
				array_push($items, $room);

				$bed_info = new BedInfo;
				$bed_info->id_bedding = $result['id_bedding'];
				$bed_info->single_num = $result['single_num'];
				$bed_info->double_num = $result['double_num'];
				$bed_info->bedding_desc = $result['bedding_desc'];
				$bed_info->additional_cost = $result['additional_cost'];
					
				$room->bed_info[$bed_info->id_bedding] = $bed_info;
			} else {
				$bed_info = new BedInfo;
				$bed_info->id_bedding = $result['id_bedding'];
				$bed_info->single_num = $result['single_num'];
				$bed_info->double_num = $result['double_num'];
				$bed_info->bedding_desc = $result['bedding_desc'];
				$bed_info->additional_cost = $result['additional_cost'];
	
				$room->bed_info[$bed_info->id_bedding] = $bed_info;
			}
				
			$before_id_product = $result['id_product'];
		}
	
		if(count($items) == 0) {
			$room = new RoomInfo;
			$room->name = "There is no data.";
			array_push($items, $room);
		}
		
		return $items;
	}
}