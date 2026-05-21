<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Подать заявку', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Оставить отзыв', ['review/create'], ['class' => 'btn btn-success']) ?>
    </p>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'user_id',
            'course.name',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Статус',
                'value' => function ($data) {
                    return match ($data->status) {
                        'new' => 'Новая',
                        'in_progress' => 'В процессе обучения',
                        'done' => 'Завершено',
                    };
                }
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'Способ оплаты',
                'value' => function ($data) {
                    return match ($data->payment_method) {
                        'cash' => 'Наличные',
                        'card' => 'Банковская карта',
                    };
                }
            ],
            'started_at',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
