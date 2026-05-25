<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Админ панель';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>


<!--    --><?php //= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
////            'id',
//            'user.email',
//            'course.name',
//            [
//                'class' => 'yii\grid\DataColumn',
//                'label' => 'Статус',
//                'value' => function ($data) {
//                    return match ($data->status) {
//                        'new' => 'Новая',
//                        'in_progress' => 'В процессе обучения',
//                        'done' => 'Завершено',
//                    };
//                }
//            ],
//            [
//                'class' => 'yii\grid\DataColumn',
//                'label' => 'Способ оплаты',
//                'value' => function ($data) {
//                    return match ($data->payment_method) {
//                        'cash' => 'Наличные',
//                        'card' => 'Банковкая карта',
//                    };
//                }
//            ],
//            'started_at',
//            [
//                'class' => ActionColumn::className(),
//                'template' => '{update}',
//                'visibleButtons' => [
//                    'update' => function ($model, $key, $index) {
//                        return $model->status === 'new' || $model->status === 'in_progress';
//                    },
//                ],
//                'urlCreator' => function ($action, Request $model, $key, $index, $column) {
//                    return Url::toRoute(['/request/update', 'id' => $model->id]);
//                 }
//            ],
//        ],
//    ]); ?>

    <?php

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'pager' => [
                'class' => \yii\bootstrap5\LinkPager::class
        ]
    ]);
    ?>


</div>
