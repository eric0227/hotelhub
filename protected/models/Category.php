<?php

/**
 * This is the model class for table "gc_category".
 *
 * The followings are the available columns in table 'gc_category':
 * @property string $id_category
 * @property string $id_parent
 * @property string $id_service
 * @property integer $level_depth
 * @property string $nleft
 * @property string $nright
 * @property integer $active
 * @property string $date_add
 * @property string $date_upd
 * @property string $position
 *
 * The followings are the available model relations:
 * @property Category $idParent
 * @property Category[] $categories
 * @property CategoryLang[] $categoryLangs
 * @property Product[] $gcProducts
 * @property Service[] $gcServices
 * @property Product[] $products
 */
class Category extends CActiveRecord
{
	private $description = null;
	private $name = null;
	
	public function behaviors() {
		return array(
			'NestedSetBehavior' => 
				array(
					'class'=>'ext.NestedSetBehavior',
					'leftAttribute'=>'nleft',
					'rightAttribute'=>'nright',
					'levelAttribute'=>'level_depth',
					'rootAttribute'=>'id_service',
					'hasManyRoots'=>true
				)
		);
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gc_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parent, id_service', 'required'),
			array('level_depth, active', 'numerical', 'integerOnly'=>true),
			array('id_parent, id_service, nleft, nright, position', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_category, id_service, id_parent, level_depth, nleft, nright, active, date_add, date_upd, position', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parent' => array(self::BELONGS_TO, 'Category', 'id_parent'),
			'categories' => array(self::HAS_MANY, 'Category', 'id_parent'),
			'service' => array(self::BELONGS_TO, 'Service', 'id_service'),
			'categoryLangs' => array(self::HAS_MANY, 'CategoryLang', 'id_category'),
			'products' => array(self::MANY_MANY, 'Product', 'gc_category_product(id_category, id_product)'),
			'services' => array(self::MANY_MANY, 'Service', 'gc_category_service(id_category, id_service)'),
			//'products' => array(self::HAS_MANY, 'Product', 'id_category_default'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_category' => 'Category',
			'id_parent' => 'Parent',
			'id_service' => 'Service',
			'level_depth' => 'Level Depth',
			'nleft' => 'Nleft',
			'nright' => 'Nright',
			'active' => 'Active',
			'date_add' => 'Date Add',
			'date_upd' => 'Date Upd',
			'position' => 'Position',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_category',$this->id_category,true);
		
		//$criteria->compare('id_service',$this->id_service,true);
		$criteria->compare('id_service',Service::getCurrentService(),true);
		
		$criteria->compare('id_parent',$this->id_parent,true);
		$criteria->compare('level_depth',$this->level_depth);
		$criteria->compare('nleft',$this->nleft,true);
		$criteria->compare('nright',$this->nright,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('date_add',$this->date_add,true);
		$criteria->compare('date_upd',$this->date_upd,true);
		$criteria->compare('position',$this->position,true);
		
		$criteria->order = 'id_service, nleft';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

// 	private $description = null;
// 	private $name = null;	

	protected function afterFind() {
		$langModel = CategoryLang::model()->findByAttributes(array('id_category'=>$this->id_category, 'id_lang'=>Lang::getCurrentLang()));
	
		$this->name = $langModel->name;
		$this->description = $langModel->description;
	}	
	
	public function getDescription() {
		return $this->description;
	}
	public function getName() {
		return $this->name;
	}
	
	public function loadMultiLang() {
		$mutltiLangModels = CategoryLang::model()->findAllByAttributes(array('id_category'=>$this->id_category));
	
		$description = array();
		$name = array();
	
		foreach($mutltiLangModels as $mutltiLangModel) {
			$description[$mutltiLangModel->id_lang] = $mutltiLangModel->description;
			$name[$mutltiLangModel->id_lang] = $mutltiLangModel->name;
		}
		$this->description = $description;
		$this->name = $name;
		
	}
	
	protected function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->date_add=$this->date_upd=new CDbExpression('NOW()');
		} else {
			$this->date_upd=new CDbExpression('NOW()');
		}
		
		$this->id_service = Service::getCurrentService();
	
 		if($this->id_parent != 0) {
 			return parent::beforeSave();
 		} else {
 			return true;
 		}
	}
	
	protected function beforeDelete() {
		if($this->id_parent == 0) {
			return false;
		} 
	}
	
	public function getUnDescendants() {
		$criteria = new CDbCriteria;
		$criteria->condition='id_service = :id_service AND (nleft < :nleft OR nright > :nright)';
		$criteria->params=array(':id_service' => $this->id_service, ':nleft' => $this->nleft, ':nright' => $this->nright);
		$criteria->order = 'id_service, nleft';
	
		return Category::model()->findAll($criteria);
	}
	
	public static function getCategory() {
		return Category::model()->findByPk(Service::getCurrentService());
	}
	
	public static function getDescendants() {
		$model = Category::model()->findByPk(Service::getCurrentService());		
		return $model->descendants()->findAll();
	}
	
	public static function items($without = null) {
		$_items = array();

		$service = Service::getCurrentService();		
		$models = self::getDescendants($service);
		$_items[$service] = $service;
		
		foreach($models as $model) {			
			if($model->id_category != $without) {
				$_items[$model->id_category] = $model->name;
			}
		}
		return $_items;
	}
	
}



