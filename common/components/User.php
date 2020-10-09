<?php

/*
 * 2014-06-25
 * prawee@hotmail.com
 */

namespace common\components;



class User extends \yii\web\User {

    /**
     * @inheritdoc
     */
    public $identityClass = '\common\models\User';

  
    public function checkAccess($operation, $params = [], $allowCaching = true) {
        // Always return true when SuperAdmin user
        if (
            \Yii::$app->user->id == 2 && \Yii::$app->user->username == 'admin2' 
        ) {
            return true;
        }
        return parent::can($operation, $params, $allowCaching);
        
    }

}