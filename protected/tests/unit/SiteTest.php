<?php 
class SiteTest extends CDbTestCase {
	
	public $fixtures=array(
		'post'=>'Post'
	);
	
	public function setUp() {
		// Import controller
		Yii::import('application.controllers.*');
	}
	
	public function testTrue() {	
		$this->assertTrue(true);
	}
	
	public function testFail() {
		$this->assertTrue(false);
	}
	
	public function testIndex() {
		$controller = new SiteController('review');
	
		$this->assertTrue($controller!=null);
		$this->assertInstanceOf('SiteController', $controller);
	
		$controller->actionIndex();
	
		$this->assertTrue($controller->model!=null);
		$this->assertEquals('index', $controller->viewId);
	}
}

?>