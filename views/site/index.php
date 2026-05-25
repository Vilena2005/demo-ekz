<?php

/** @var yii\web\View $this */

$this->title = 'Корочки.есть';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Портал записи на онлайн курсы</h1>

        <p class="lead">Диплом государственного образца и т.д.
        Карусель в bootstrap5 Carousel</p>
    </div>

    <div class="body-content">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../web/img/site.png" class="d-block w-100" alt="slide-1">
                </div>
                <div class="carousel-item">
                    <img src="../../web/img/slide2.png" class="d-block w-100" alt="slide-2">
                </div>
                <div class="carousel-item">
                    <img src="../../web/img/slide3.png" class="d-block w-100" alt="slide-3">
                </div>
                <div class="carousel-item">
                    <img src="../../web/img/slide4.png" class="d-block w-100" alt="slide-4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
                <span class="visually-hidden">Назад</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
                <span class="visually-hidden">Вперед</span>
            </button>
        </div>

    </div>
</div>
