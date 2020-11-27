<?php

declare(strict_types=1);

namespace backend\traits;

use yii\helpers\ArrayHelper;

trait NamesList {

    /**
     * Gets all names with id of model
     *
     * @return array
     */
    public static function getNamesList() : array
    {
        $namesList = static::find()->select(['id', 'name'])->all();

        return ArrayHelper::map($namesList, 'id', 'name');
    }
}