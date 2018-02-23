<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property int $status 1, 琛ㄧず鏃ュ織鍦ㄨ崏绋跨閲岋紝瀵瑰涓嶅彲瑙侊紱 2, 琛ㄧず鏃ュ織宸茬粡瀵瑰鍙戝竷锛� 3, 琛ㄧず鏃ュ織宸茬粡杩囨湡锛屽湪鏃ュ織鍒楄〃涓笉鍙锛堜絾浠嶇劧鍙互鍗曠嫭璁块棶锛�
 * @property int $create_time
 * @property int $update_time
 * @property int $author_id
 * @property int $sort
 */
class Post extends \yii\db\ActiveRecord
{

    const STATUS_DRAFT=1;//鑽夌
    const STATUS_PUBLISHED=2;//鍏紑
    const STATUS_ARCHIVED=3;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }
      /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * url
     * 
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('post/view', array(
            'id'=>$this->id,
            'title'=>$this->title,
        ));
    }

     /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
       return [
            [['title', 'content', 'tags', 'create_time', 'author_id'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'update_time', 'author_id', 'sort'], 'integer'],
            [['status'],[1,2,3]],
            [['title'], 'string', 'max' => 150],
            [['tags'], 'string', 'max' => 255],
        ];

  
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'content' => Yii::t('backend', 'Content'),
            'tags' => Yii::t('backend', 'Tags'),
            'status' => Yii::t('backend', 'Status'),
            'create_time' => Yii::t('backend', 'Create Time'),
            'update_time' => Yii::t('backend', 'Update Time'),
            'author_id' => Yii::t('backend', 'Author ID'),
            'sort' => Yii::t('backend', 'Sort'),
        ];
    }

    public function normalizeTags($attribute,$params)
    {
        $this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }


    public function relations()
    {
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'post_id',
                'condition'=>'comments.status='.Comment::STATUS_APPROVED,
                'order'=>'comments.create_time DESC'),
            'commentCount' => array(self::STAT, 'Comment', 'post_id',
                'condition'=>'status='.Comment::STATUS_APPROVED),
        );
    }

    protected function afterSave()
    {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
    }
     
    private $_oldTags;
     

    protected function afterFind()
    {
        parent::afterFind();
        $this->_oldTags=$this->tags;
    }
}
