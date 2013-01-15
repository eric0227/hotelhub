<?php

class SearchProduct {
	static public function findAllProduct($search) {
			
		$where = array();
				
		if(!empty($search['id_supplier'])) $where[] = "pro.id_supplier = {$search['id_supplier']}";
		if(!empty($search['country'])) $where[] = "addr.id_country = {$search['country']}";
		if(!empty($search['destination'])) $where[] = "addr.id_destination = {$search['destination']}";
		if(!empty($search['search_text'])) $where[] = "pro_lang.name like '%{$search['search_text']}%'";
	
		if(!empty($search['id_product'])) $where[] = "pro.id_product = {$search['id_product']}";
	
	
		$where[] = "pro.id_service = " . Service::getCurrentService();
		$where[] = "pro.active = 1";
		$where[] = "pro_lang.id_lang = ".Lang::getCurrentLang();
		$where[] = "sup_lang.id_lang = ".Lang::getCurrentLang();
	
		$cmd = Yii::app()->db->createCommand()
		->select('pro.*, pro_lang.*, sup.*, sup_lang.*')
		->from('gc_address as addr');
		
		if(Service::getCurrentService() == 1 || Service::getCurrentService() == 2) {
			$cmd->join('gc_user as usr', 'addr.id_address = usr.id_address_default');
		} else {
			$cmd->join('gc_user as usr', '');
			$where[] = "pro.id_address = addr.id_address";
		}
		
		$cmd->join('gc_supplier as sup', 'usr.id_user = sup.id_supplier')
		->join('gc_product as pro', 'sup.id_supplier = pro.id_supplier')
		->leftJoin('gc_product_lang as pro_lang', 'pro_lang.id_product = pro.id_product')
		->leftJoin('gc_supplier_lang as sup_lang', 'sup_lang.id_supplier = pro.id_supplier')
		->where(implode(" and ", $where))
		->order(array('pro.id_product'));
	
		//echo $cmd->text;
		$results = $cmd->queryAll();
		
		return $results;
	}
	
	static public function findAllProductDate($search) {
			
		$where = array();
		if(!empty($search['id_product'])) $where[] = "pro.id_product = {$search['id_product']}";
		if(!empty($search['start_date'])) $where[] = "pro_date.on_date >= '{$search['start_date']}'";
		if(!empty($search['last_date'])) $where[] = "pro_date.on_date <= '{$search['last_date']}'";

		$cmd = Yii::app()->db->createCommand()
		->select('pro_date.*')
		->from('gc_product_date as pro_date')
		->where(implode(" and ", $where))
		->order(array('pro_date.on_date'));
		
		//echo $cmd->text;
		$results = $cmd->queryAll();
		
		$items = Array();
		foreach($results as $result) {
			$items[$result['on_date']] = $result;
		}
		return $items;
	}
	
	static public function countProductDestination($search) {
		
		$where = array();
		
		if(!empty($search['id_supplier'])) $where[] = "pro.id_supplier = {$search['id_supplier']}";
		if(!empty($search['country'])) $where[] = "addr.id_country = {$search['country']}";
		if(!empty($search['destination'])) $where[] = "addr.id_destination = {$search['destination']}";
			
		$where[] = "pro.id_service = " . Service::getCurrentService();
		$where[] = "pro.active = 1";
		
		$cmd = Yii::app()->db->createCommand()
		->select('addr.id_destination, dest.name, count(pro.id_product) as cnt')
		->from('gc_product as pro')
		->join('gc_address as addr', 'pro.id_address = addr.id_address')
		->join('gc_destination as dest', 'dest.id_destination = addr.id_destination')
		->where(implode(" and ", $where))
		->group('addr.id_destination, dest.name');
		
		//echo $cmd->text;
		$results = $cmd->queryAll();
		
		return $results;
		
	}
}