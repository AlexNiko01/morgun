<?php

namespace console\controllers;

use common\components\rbac\UserRoleRule;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $rule = new UserRoleRule();
        try {
            $auth->add($rule);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

        /**
         * adding role "customer" |  "admin"
         */
        $customer = $auth->createRole('customer');
        $admin = $auth->createRole('admin');
        $admin->ruleName = $rule->name;
        $customer->ruleName = $rule->name;

        try {
            $auth->add($admin);
            $auth->add($customer);
            $auth->addChild($admin, $customer);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}