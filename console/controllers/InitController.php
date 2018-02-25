<?php
namespace console\controllers;

use kordar\ace\console\Admin;
use kordar\ace\console\AutoPermission;
use yii\console\Controller;

class InitController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function actionCreateSuper()
    {
        $username = $this->prompt('用户名（必填）：');
        $password = $this->prompt('密码（必填，字母、数字6位有效组合）：');
        $email = $this->prompt('邮箱（非必填）：');
        $logic = new Admin();
        if ($logic->createSuper($username, $password, $email)) {
            echo '超级管理员创建成功！' . PHP_EOL;
        } else {
            echo '超级管理员创建失败！' . PHP_EOL;
        }
    }

    public function actionAuto()
    {
        $obj = new AutoPermission();
        $dir = \Yii::getAlias('@kordar/ace/controllers');
        $obj->autoRun($dir, 'ace');
    }
}