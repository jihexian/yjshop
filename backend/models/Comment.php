<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property string $content
 * @property string $author
 * @property string $email
 * @property int $create_time
 * @property int $post_id
 */
class Comment extends \yii\db\ActiveRecord
{

    const STATUS_PENDING=1;
    const STATUS_APPROVED=2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author'], 'required'],
            [['content'], 'string'],
            [['create_time', 'post_id'], 'integer'],
            [['author'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 105],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'content' => Yii::t('backend', 'Content'),
            'author' => Yii::t('backend', 'Author'),
            'email' => Yii::t('backend', 'Email'),
            'create_time' => Yii::t('backend', 'Create Time'),
            'post_id' => Yii::t('backend', 'Post ID'),
        ];
    }
}
