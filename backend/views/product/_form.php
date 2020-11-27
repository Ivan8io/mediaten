<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
/* @var $categoryNamesList array */
/* @var $tagNamesList array */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'category_id')->widget(Select2::class, [
            'name' => 'Категория',
            'data' => $categoryNamesList,
            'language' => 'ru',
            'options' => ['placeholder' => 'Выберите категорию', 'style' => 'margin-top: 0;'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Категория');;
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
    echo $form->field($model, 'tags')->widget(Select2::class, [
        'data' => $tagNamesList,
        'language' => 'ru',
        'options' => ['multiple' => true, 'placeholder' => 'Выберите теги'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Теги');
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
