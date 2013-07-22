<?php

/**
 * This is the model class for table "manufacturer".
 *
 * The followings are the available columns in table 'manufacturer':
 * @property integer $manufacturer_id
 * @property string $name
 * @property string $image
 * @property integer $sort_order
 */
class Manufacturer extends CActiveRecord {

    private $cacheId;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Manufacturer the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public function __get($name) {
        // Override stores relation to include default store
        if($name == 'stores'){
            if(ManufacturerToStore::model()->exists("manufacturer_id={$this->manufacturer_id} AND store_id=0")){
                $stores = parent::__get($name);
                
                $default = new Store;
                $default->name = Yii::t('stores', 'Default');
                $default->store_id = 0;
                $default->ssl = Yii::app()->baseUrl; // TODO: what should i do about ssl?!
                $default->url = Yii::app()->baseUrl;
                array_unshift($stores, $default);
                
                return $stores;
            }
        }
        else
            return parent::__get($name);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'manufacturer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name, sort_order', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
            array('image', 'length', 'max' => 255),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'stores' => array(self::MANY_MANY, 'Store', 'manufacturer_to_store(manufacturer_id, store_id)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'manufacturer_id' => 'Manufacturer',
            'name' => 'Name',
            'image' => 'Image',
            'sort_order' => 'Sort Order',
        );
    }

    public function beforeDelete() {
        $this->cacheId = $this->manufacturer_id;
        return parent::beforeDelete();
    }

    public function afterDelete() {
        // delete dependencies
        ManufacturerToStore::model()->deleteAll("manufacturer_id={$this->cacheId}");
        UrlAlias::model()->deleteAll("query='manufacturer_id={$this->cacheId}'");

        parent::afterDelete();
    }

    public function getImageWithSize($width, $height) {
        if ($this->image && file_exists(Yii::app()->params['imagePath'] . $this->image)) {
            $_image = ImageTool::resize($this->image, $width, $height);
        } else {
            $_image = ImageTool::resize('no_image.jpg', $width, $height);
        }

        return $_image;
    }
    
    public function addToStore($storeId) {
        if(!ManufacturerToStore::model()->countByAttributes(array('manufacturer_id'=>$this->manufacturer_id, 'store_id'=>$storeId))){
            $manufacturerToStore = new ManufacturerToStore;
            $manufacturerToStore->manufacturer_id = $this->manufacturer_id;
            $manufacturerToStore->store_id = $storeId;
            return $manufacturerToStore->save();
        }
        
        return false;
    }
    
    public function clearAllStoresRelations(){
        ManufacturerToStore::model()->deleteAllByAttributes(array('manufacturer_id'=>$this->manufacturer_id));
    }
    
    public function getUrlAlias(){
        return UrlAlias::model()->find("query='manufacturer_id={$this->manufacturer_id}'");;
    }
    
    public function getSEOKeyword(){
        $alias = $this->getUrlAlias();
        if(!is_null($alias)){
            return $alias->keyword;
        }
        return null;
    }
    
    public function updateSEOKeyword($keyword){
        if(!$this->isNewRecord){
            $alias = $this->getUrlAlias();
            
            // if keyword is empty delete url alias
            if(empty($keyword) || is_null($keyword)){
                if(!is_null($alias))
                    return $alias->delete();
                
                return false;
            }
            // else update
            else{
                if(is_null($alias) ){
                    $alias = new UrlAlias;
                    $alias->query = "manufacturer_id={$this->manufacturer_id}";
                }

                $alias->keyword = $keyword;

                return $alias->save();
            }
        }
        else
            throw new CException(Yii::t('errors', 'Tried to update SEO Keyword for an object that doesn\'t exists yet.'));
    }

}