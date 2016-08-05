<?php

use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->title = 'Samurai Meetups';
?>
<div class="site-index">
    <?php //TO-DO: Put the images in the database! and put those in-line styles elsewhere! ?>
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
    <br/>
    <br/>
    <h3>Upcoming Tours</h3>
    <div class="row">
        <img class="col-md-4" src="<?=Url::base().'images/tour-001.png'?>"/>
        <img class="col-md-4" src="<?=Url::base().'images/tour-002.png'?>"/>
        <img class="col-md-4" src="<?=Url::base().'images/tour-003.png'?>"/>
    </div>
    <br/>
    <div class="row" style="height:158px;">
        <div class="col-md-4">
            <img class="image-filled" src="<?=Url::base().'images/about.jpg'?>"/>
            <div class="mid-top-text">About</div>
        </div>
        <div class="col-md-4">
            <img class="image-filled" src="<?=Url::base().'images/report.jpg'?>"/>
            <div class="mid-top-text">Report</div>
        </div>
        <div class="col-md-4">
            <img class="image-filled" src="<?=Url::base().'images/samurai.jpg'?>"/>
            <div class="mid-top-text">Samurai</div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <h3>Participation's Voice</h3>
</div>
