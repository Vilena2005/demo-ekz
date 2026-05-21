<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin([
        'id' => 'contact-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?php
        $courses = \app\models\Course::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();


    ?>

    <?= $form->field($model, 'course_id')->dropDownList($courses, ['prompt' => 'Выберите курс', 'disabled' => true]) ?>

    <?= $form->field($model, 'started_at')->input('date', ['disabled' => true]) ?>

    <?= $form->field($model, 'payment_method')->dropDownList(['cash' => 'Наличные', 'card' => 'Банковская карта',  ],
        ['prompt' => 'Способ оплаты', 'disabled' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['new' => 'Новая', 'in_progress' => 'В процессе обучения', 'done' => 'Завершено'  ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>
