<?php

namespace common\components;

use yii\base\Controller;

class AppController extends Controller {

    protected function query_all($sql) {

        return \Yii::$app->db->createCommand($sql)->queryAll();
    }

    protected function query_one($sql) {
        return \Yii::$app->db->createCommand($sql)->queryOne();
    }

    protected function query_scalar($sql) {
        return \Yii::$app->db->createCommand($sql)->queryScalar();
    }

    protected function execute($sql) {
        return \Yii::$app->db->createCommand($sql)->execute();
    }

    protected function print_r($raw) {
        echo "<pre>";
        print_r($raw);
        echo "</pre>";
    }

}
