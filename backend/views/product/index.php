<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'category',
                'label' => 'Категория',
                'value' => 'category.name',
            ],
            'name',
            'slug',
            'description:ntext',
            [
                'attribute' => 'tag',
                'label' => 'Теги',
                'value' => function($model) {
                    return implode(', ', \yii\helpers\ArrayHelper::map($model->tags, 'id', 'name'));
                },
                'headerOptions' => ['style' => 'color: #3c8dbc;'],
            ],
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
