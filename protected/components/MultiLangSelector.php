<?php 
class MultiLangSelector extends CWidget {
		
	public function init() {
		parent::init();
		
		$currentLang = Lang::getCurrentLang();

		echo '<div id="multilang_selector">';
		echo '<ul>';
		foreach(Lang::items() as $lang => $name) {
			echo '<li class="lang_icon" lang="'.$lang.'" >';
			echo '<img src="'.Yii::app()->request->baseUrl.'/images/lang/'.$lang.'.jpg" />';
			echo '</li>';
		}
		echo '</ul>';
		echo '</div>';
		
		$this->registerClientScript();
	}
	
	protected function registerClientScript()
	{
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/multilang_selector.js', CClientScript::POS_END);
		
		
	}
	
	public function run() {
		$cs=Yii::app()->clientScript;
		$cs->registerScript('multilang_selector', 'showLangField("'.Lang::getDefaultLang().'")');
	}
}


?>