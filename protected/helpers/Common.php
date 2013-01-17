<?php 
class Common {

	public static function isAllow($id) {
		if(Yii::app()->user->getLevel() >= 10) return true;
	
		return Yii::app()->user->getId() == $id;
	}
	
	public static function allowProc($id) {
		if(!self::isAllow($id)) {
			Yii::app()->end();
		}
	}
}
?>