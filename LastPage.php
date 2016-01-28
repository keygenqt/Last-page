<?php

namespace keygenqt\lastPage;

use Yii;
use yii\web\Controller;

/**
 * LastPage controller
 */
class LastPage extends Controller
{
    public function beforeAction($action)
    {
        $result = parent::beforeAction($action);
        if (empty($_FILES)) {
            $request = Yii::$app->request;
            if ((!$request->isAjax || !empty($_GET['ajax'])) && strpos($request->getUrl(), '.') === false) {
                if (($oldUrl = Yii::$app->session->get('user.url')) !== null) {
                    if (($newUrl = Yii::$app->session->get('user.new-url')) != $request->getUrl()) {
                        Yii::$app->session->set('user.new-url', $request->getUrl());
                        Yii::$app->session->set('user.url', $newUrl);
                    }
                } else {
                    Yii::$app->session->set('user.new-url', $request->getUrl());
                    Yii::$app->session->set('user.url', '/');
                }
                Yii::$app->user->setReturnUrl(Yii::$app->session->get('user.url'));
            }
        }
        return $result;
    }
}


