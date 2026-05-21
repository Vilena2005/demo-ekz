<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Review $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $requests = \app\models\Request::find()
//        ->select(['course.name'])
////        ->with('course.course_name')
//        ->leftJoin('course', 'request.course_id = course.id')
//        ->where(['status' => 'done'])
//        ->indexBy('id')
//        ->column();
        ->where(['status' => 'done', 'user_id' => Yii::$app->user->id])
        ->all();

    $items = [];

    foreach ($requests as $request) {
        $items[$request->id] = $request->started_at." - ".$request->course->name;
    }
    ?>

    <?= $form->field($model, 'request_id')->dropDownList($items, ['prompt' => 'Выберите заявку']) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
