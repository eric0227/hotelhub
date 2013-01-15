<?php

class SearchSupplier {
	
	static public function findAllSupplier($search) {
		$where = array();
		if(!empty($search['country'])) $where[] = "addr.id_country = {$search['country']}";
		if(!empty($search['destination'])) $where[] = "addr.id_destination = {$search['destination']}";
		if(!empty($search['search_text'])) $where[] = "sup_lang.title like '%{$search['search_text']}%'";
	
		$where[] = "sup.id_service = " . Service::getCurrentService();
		$where[] = "pro.active = 1";
		$where[] = "pro_lang.id_lang = ".Lang::getCurrentLang();
		$where[] = "sup_lang.id_lang = ".Lang::getCurrentLang();
	
		$cmd = Yii::app()->db->createCommand()
		->select('sup.*, sup_lang.*')
		->from('gc_address as addr')
		->join('gc_user as usr', 'addr.id_address = usr.id_address_default')
		->join('gc_supplier as sup', 'usr.id_user = sup.id_supplier')
		->leftJoin('gc_supplier_lang as sup_lang', 'sup_lang.id_supplier = sup.id_supplier')
		->where(implode(" and ", $where))
		->order(array('sup.id_supplier'));
	
		//echo $cmd->text;
	
		$results = $cmd->queryAll();
		return $results;
	}
}