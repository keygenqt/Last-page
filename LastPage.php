<?php
/*
 * Copyright 2020 Vitaliy Zarubin
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace keygenqt\lastPage;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

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
            if (!$request->isAjax && strpos($request->getUrl(), '.') === false && empty($_GET['ajax'])) {
                if (($oldUrl = Yii::$app->session->get('user.url')) !== null) {
                    if (($newUrl = Yii::$app->session->get('user.new-url')) != $request->getUrl()) {
                        Yii::$app->session->set('user.new-url', $request->getUrl());
                        Yii::$app->session->set('user.url', $newUrl);
                    }
                } else {
                    Yii::$app->session->set('user.new-url', $request->getUrl());
                    Yii::$app->session->set('user.url', (Url::base() ? Url::base() : '/'));
                }
                Yii::$app->user->setReturnUrl(Yii::$app->session->get('user.url'));
            }
        }
        return $result;
    }
}


