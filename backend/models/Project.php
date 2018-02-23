<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $describe
 * @property int $create_time
 * @property int $num
 * @property int $sort
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'describe', 'create_time'], 'required'],
            [['num','sort'],'default','value'=>0],
            [['price', 'num', 'sort'], 'integer'],
            [['create_time'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['describe'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '项目名称'),
            'price' => Yii::t('app', '价格'),
            'describe' => Yii::t('app', '描述'),
            'create_time' => Yii::t('app', '添加时间'),
            'num' => Yii::t('app', '使用次数'),
            'sort' => Yii::t('app', '排序'),
        ];
    }
}
