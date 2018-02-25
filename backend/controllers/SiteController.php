<?php
namespace backend\controllers;

use kordar\ace\controllers\AceController;
use kordar\upload\SingleUploadFile;

/**
 * Class DefaultController
 * @package kordar\ace\controllers
 * @item *:网站管理
 */
class SiteController extends AceController
{
    protected $rbacExcept = ['error'];

    public function actions()
    {
        return [
            'upload' => [
                'class' => SingleUploadFile::className(),
                'root' => UPLOAD_ROOT,
                'autoSubDateRoot' => 'Y/m/d'
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     * @item index:网站首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
