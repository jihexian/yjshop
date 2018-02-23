<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%lookup}}".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $type
 * @property int $sort
 */
class Lookup extends \yii\db\ActiveRecord
{
    private static $_items=array();
   public static function items($type)
    {
        if(!isset(self::$_items[$type]))
            self::loadItems($type);
        return self::$_items[$type];
    }
 
    public static function item($type,$code)
    {
        if(!isset(self::$_items[$type]))
            self::loadItems($type);
        return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
    }
 
    private static function loadItems($type)
    {
        self::$_items[$type]=array();
        $models=self::model()->findAll(array(
            'condition'=>'type=:type',
            'params'=>array(':type'=>$type),
            'order'=>'sort',
        ));
        foreach($models as $model)
            self::$_items[$type][$model->code]=$model->name;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lookup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'code', 'type'], 'required'],
            [['id', 'type', 'sort'], 'integer'],
            [['name', 'code'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'code' => Yii::t('backend', 'Code'),
            'type' => Yii::t('backend', 'Type'),
            'sort' => Yii::t('backend', 'Sort'),
        ];
    }
}
