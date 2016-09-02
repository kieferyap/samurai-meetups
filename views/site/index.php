<?php

use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Samurai Meetups');
?>
<div class="site-index">
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
        <span class="hidden" id="upcoming-tours"></span>
    </div>
    <hr/>
    <div class="row">
        <h3><?= Yii::t('app', 'Upcoming Tours')?></h3>
    </div>
    <div class="center-wrapper">    
        <div class="center-div">
            <div class="row">
                <?php
                $images = [];
                foreach($frontPageElements['tours'] as $element) {
                    echo '<a href="?r=site/tours&id='.$element['clickable_url'].'">';
                    echo '<img class="col-md-4 bordered-image-triple" src="'
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
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/about')?>">
                        <img class="image-filled" src="<?=Url::base().'images/'
                            .$frontPageElements['about'][0]['image_url']
                            .''?>"
                        />
                        <div class="mid-top-text"><?= Yii::t('app', 'About')?></div>
                    </a>
                </div>
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/report')?>">
                        <img class="image-filled" src="<?=Url::base().'images/'
                            .$frontPageElements['report'][0]['image_url']
                            .''?>"
                        />
                    </a>
                </div>
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/samurai')?>">
                        <img class="image-filled" src="<?=Url::base().'images/'
                            .$frontPageElements['samurai'][0]['image_url']
                            .''?>"
                        />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row margin-top-20">
        <h3><?= Yii::t('app', 'Testimonies')?></h3>
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
            <a href="<?=Url::toRoute('site/samurai')?>">
            <img class="image-filled participation-voice-rectangle" src="<?=Url::base()
                .'images/'
                .$frontPageElements['icon'][0]['image_url']
                .''?>"/>
            </a>
        </div>
    </div>
</div>
