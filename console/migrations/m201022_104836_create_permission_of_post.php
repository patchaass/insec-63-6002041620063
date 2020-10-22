<?php

use yii\db\Migration;

/**
 * Class m201022_104836_create_permission_of_post
 */
class m201022_104836_create_permission_of_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $create=$auth->createPermission('post-create');
        $create->description='Create a post';
        $auth->add($create);

        $index=$auth->createPermission('post-index');
        $index->description='List a post';
        $auth->add($index); 
        
        $update=$auth->createPermission('post-update');
        $update->description='Update a post';
        $auth->add($update);

        $view=$auth->createPermission('post-view');
        $view->description='View a post';
        $auth->add($view); 
        
        $delete=$auth->createPermission('post-delete');
        $delete->description='Delete a post';
        $auth->add($delete);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m201022_104836_create_permission_of_post cannot be reverted.\n";
        $auth = Yii::$app->authManager;
        
        $create=$auth->getRole('post-create');
        if ($create){
            $auth->remove($create);
        }
        $index=$auth->getRole('post-index');
            if ($index){
                $auth->remove($index);
            }
        $update=$auth->getRole('update-post');
            if ($update){
                $auth->remove($update);
            }
        $view=$auth->getRole('view-post');
            if ($view){
                $auth->remove($view);
            }
        $delete=$auth->getRole('delete-post');
        if ($delete){
            $auth->remove($delete);
        }
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_104836_create_permission_of_post cannot be reverted.\n";

        return false;
    }
    */
}
