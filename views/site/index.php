<?php

use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->title = 'Samurai Meetups';
?>
<div class="site-index">
    <?php //TO-DO: Put the images in the database! and put those in-line styles elsewhere! ?>
    <br/>
    <div class="row">
        <div class="center-wrapper">    
            <div class="center-div">   
                <?php
                    $images = [];
                    foreach($frontPageElements['carousel'] as $element) {
                        $images[] = '<img class="carousel-image" src="'
                            .Url::base()
                            .'images/'
                            .$element['image_url']
                            .'"/>';
                    }
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
    <div class="center-wrapper">    
        <div class="center-div">
            <div class="row">
                <?php
                $images = [];
                foreach($frontPageElements['tours'] as $element) {
                    echo '<a href="?r=site/tours&id='.$element['clickable_url'].'">';
                    echo '<img class="col-md-4" src="'
                        .Url::base()
                        .'images/'
                        .$element['image_url']
                        .'"/>';
                    echo '</a>';
                }
                ?>
            </div>
            <div class="row">
            <br/>
                <div class="col-md-4">
                    <img class="image-filled" src="<?=Url::base().'images/'
                        .$frontPageElements['about'][0]['image_url']
                        .''?>"
                    />
                    <div class="mid-top-text">About</div>
                </div>
                <div class="col-md-4">
                    <a href="<?=Url::toRoute('site/report')?>">
                        <img class="image-filled" src="<?=Url::base().'images/'
                            .$frontPageElements['report'][0]['image_url']
                            .''?>"
                        />
                        <div class="mid-top-text">Report</div>
                    </a>
                </div>
                <div class="col-md-4">
                    <img class="image-filled" src="<?=Url::base().'images/'
                        .$frontPageElements['samurai'][0]['image_url']
                        .''?>"
                    />
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
        <h3>Testimonies</h3>
    </div>
    <div class="row">
        <?php
        for($i=0; $i<count($frontPageElements['participation-image']); $i++) {
            echo '<div class="col-md-6">';
            echo '<img class="image-filled participation-voice-rectangle" src="'
                .Url::base()
                .'images/'
                .$frontPageElements['participation-image'][$i]['image_url']
                .'"/>';
            echo '<img class="participation-voice-circle" src="'
                .Url::base()
                .'images/'
                .$frontPageElements['participation-person'][$i]['image_url']
                .'"/>';
            echo '<div class="participation-voice-text">"'
                .$frontPageElements['participation-text'][$i]['description']
                .'"</div>';
            echo '</div>';
        }
        ?>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6">
            <a href="<?=$frontPageElements['facebook'][0]['clickable_url']?>">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base()
                .'images/'
                .$frontPageElements['facebook'][0]['image_url']
                .''?>"/>
            </a>
        </div>
        <div class="col-md-6">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base()
                .'images/'
                .$frontPageElements['icon'][0]['image_url']
                .''?>"/>
        </div>
    </div>
</div>
