<?php

use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->title = 'Samurai Meetups';
?>
<div class="site-index">
    <?php //TO-DO: Put the images in the database! and put those in-line styles elsewhere! ?>
    <br/>
    <div class="row">
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
    <div class="row">
        <br/>
        <br/>
        <h3>Upcoming Tours</h3>
    </div>
    <div id="wrapper" style="text-align: center">    
            <div id="yourdiv" style="display: inline-block;">
                <div class="row">
                    <img class="col-md-4" src="<?=Url::base().'images/tour-001.png'?>"/>
                    <img class="col-md-4" src="<?=Url::base().'images/tour-002.png'?>"/>
                    <img class="col-md-4" src="<?=Url::base().'images/tour-003.png'?>"/>
                </div>
                <div class="row">
                <br/>
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
        </div>
    </div>
    <div class="row">
        <br/>
        <br/>
        <br/>
        <br/>
        <h3>Participation's Voice</h3>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base().'images/rectangle-1.png'?>"/>
            <img class="participation-voice-circle" src="<?=Url::base().'images/round-1.png'?>"/>
            <div class="participation-voice-text">"I learned a lot of things about Japanese Culture"</div>
        </div>
        <div class="col-md-6">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base().'images/rectangle-2.png'?>"/>
            <img class="participation-voice-circle" src="<?=Url::base().'images/round-2.png'?>"/>
            <div class="participation-voice-text">"I made a lot of friends through Samurai Meetups"</div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6">
            <a href="https://www.facebook.com/samuraimeetups">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base().'images/facebook-voice-5.png'?>"/>
            </a>
        </div>
        <div class="col-md-6">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base().'images/icon-voice.png'?>"/>
        </div>
    </div>
</div>
