<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'id' => 'contact-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+ 7 (999) 999-99-99',
    ]) ?>

<!--    --><?php //= $form->field($model, 'role')->dropDownList([ 'admin' => 'Admin', 'user' => 'User', ], ['prompt' => '']) ?>

    <div class="form-group">
        <div>
            <?= Html::a('Уже зарегистрированы? Вход',['/site/login']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
