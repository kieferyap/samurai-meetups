<?php

use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->title = 'Samurai Meetups';
?>
<div class="site-index">
    <?php //TO-DO: Put the images in the database! ?>
    <br/>
    <div id="wrapper" style="text-align: center">    
        <div id="yourdiv" style="display: inline-block;">
            <?php
            $images=[
                '<img class="carousel-image" src="'.Url::base().'images/top-001.jpg"/>',
                '<img class="carousel-image" src="'.Url::base().'images/top-002.jpg"/>',
                '<img class="carousel-image" src="'.Url::base().'images/top-003.jpg"/>',
                '<img class="carousel-image" src="'.Url::base().'images/top-004.jpg"/>',
                '<img class="carousel-image" src="'.Url::base().'images/top-005.jpg"/>'
            ];
            echo Carousel::widget(['items'=>$images]);
            ?>
        </div>
    </div>
</div>
