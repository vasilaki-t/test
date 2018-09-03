<?php

/**
 * Class UserController
 * Контроллер для работы с пользователями
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Users;


class UserController extends Controller
{
    public function actionRegister()
    {
        $model = new Users();

        if ($request = Yii::$app->request->post('Users')) {
            $model->setScenario($request['type']);
            $model->setAttributes($request);

            if ($model->validate()) {
                $model->save();
            }
        }
        return $this->render('register', compact('model'));
    }
}
/**
function ($date, $type)
{
    $userId = Yii::$app->user->id;
    $cacheKey = md5(__CLASS__ . __METHOD__ . $userId . $date . $type);

    if(!$dataList = Yii::$app->cache->get($cacheKey)){
        $dataList = SomeDataModel::find()->where(['date' => $date, 'type' => $type, 'user_id' => $userId])->all();
        Yii::$app->cache->set($cacheKey, $dataList,CH);
    }
    $result = [];
    if (!empty($dataList)) {
        foreach ($dataList as $dataItem) {
            $result[$dataItem->id] = ['a' => $dataItem->a, 'b' => $dataItem->b];
        }
    }


    return $result;
}
 **/
