<?php
/**
 * post
 */
use yii\db\Migration;

/**
 * Class m171230_050329_create_news_post
 */
class m171230_050329_create_news_post extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('post',[
            'id'=>Schema::TYPE_PK,
            'title'=>Schema::TYPE_STRING,'NOT NULL',
            ])

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171230_050329_create_news_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171230_050329_create_news_post cannot be reverted.\n";

        return false;
    }
    */
}
