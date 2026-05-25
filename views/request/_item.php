<?php
/** @var \app\models\Request $model */
    $classStatus = match ($model->status) {
        'new' =>'border-danger',
        'in_progress' =>'border-primary',
        'done' =>'border-success',
    }

?>

<div class="card text-center mb-2 <?= $classStatus ?>">

    <div class="card-header">
        <?php

        echo $model->course->name;

        ?>
    </div>

    <div class="card-body">
        <h5 class="card-title"><?= $model->started_at ?></h5>
        <p class="card-text"><?= $model->user->email ?></p>
        <p class="card-text"><?= $model->payment_method ?></p>


    </div>
    <div class="card-footer text-body-secondary ">
        <?= $model->status ?>

    </div>
</div>