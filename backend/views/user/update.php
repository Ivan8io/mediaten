<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $updateForm bool */

$this->title = 'Обновить пользователя: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'updateForm' => $updateForm
    ]) ?>

</div>
