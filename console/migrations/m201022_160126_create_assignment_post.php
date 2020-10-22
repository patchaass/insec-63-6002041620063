<?php

use yii\db\Migration;

/**
 * Class m201022_160126_create_assignment_post
 */
class m201022_160126_create_assignment_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->init();
        $author = $auth->getRole('author');
        $admin= $auth->getRole('admin');
        $superadmin= $auth->getRole('super-admin');

 
        $auth->assign($author, 1);
        $auth->assign($superadmin, 2);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // echo "m201022_160126_create_assignment_post cannot be reverted.\n";
       $auth = Yii::$app->authManager;
       $auth->init();
       $author = $auth->getRole('author');
       $admin= $auth->getRole('admin');
       $superadmin= $auth->getRole('super-admin');
       $auth->revoke($admin, 2);
       return true;

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_160126_create_assignment_post cannot be reverted.\n";

        return false;
    }
    */
}
