<?php

namespace frontend\components;

use Yii;
use yii\db\Expression;
use yii\base\Component;
use frontend\models\Statistic;

class MyComponent extends Component
{
    const EVENT_STAT = 'event-stat';

    public static function actionStat()
    {
        Yii::$app->db->createCommand()->insert('statistic', [
            'acces_time' => new Expression('NOW()'),
            'user_ip' => Yii::$app->request->userIP,
            'user_host' => gethostname(),
            'path_info' => Yii::$app->request->pathInfo,
            'query_string' => Yii::$app->request->queryString,
        ])->execute();
    }
}
