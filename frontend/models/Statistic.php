<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property int $id
 * @property string $acces_time
 * @property string $user_ip
 * @property string $user_host
 * @property string $path_info
 * @property string $query_string
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acces_time', 'user_ip', 'user_host', 'path_info', 'query_string'], 'required'],
            [['acces_time'], 'safe'],
            [['user_ip'], 'string', 'max' => 20],
            [['user_host', 'path_info', 'query_string'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'acces_time' => 'Acces Time',
            'user_ip' => 'User Ip',
            'user_host' => 'User Host',
            'path_info' => 'Path Info',
            'query_string' => 'Query String',
        ];
    }
    public static function createSave()
    {
        $info = new Statistic();
        $info->acces_time = date('Y-m-d H:i:s');
        $info->user_ip = Yii::$app->request->userIP;
        $info->user_host = gethostname();
        $info->path_info = Yii::$app->request->pathInfo;
        $info->query_string = Yii::$app->request->queryString;
        $info->save();
    }

}
