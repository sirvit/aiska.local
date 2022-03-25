<?php
namespace common\rules;

use yii\rbac\Rule;

class AuthorproektRule extends Rule
{
    public $name = 'isAuthorproekt';

    public function execute($user, $item, $params)
    {
        if (isset($params['author_id']) and ($params['author_id'] == $user)){
            return true;
        } else{
            return false;
        }
    }

}