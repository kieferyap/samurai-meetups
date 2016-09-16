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
            <!-- Commented out because it's experimental and may return in the future -->
            <?php /*
            <div class="row" id="all-tours">
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-1'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-tours" src="<?=Url::base().'images/'.$frontPageElements['tour-1'][0]['image_url']?>"/>
                </a>
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-2'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-tours" src="<?=Url::base().'images/'.$frontPageElements['tour-2'][0]['image_url']?>"/>
                </a>
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-3'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-tours" src="<?=Url::base().'images/'.$frontPageElements['tour-3'][0]['image_url']?>"/>
                </a>
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-1'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-tours" src="<?=Url::base().'images/'.$frontPageElements['tour-1'][0]['image_url']?>"/>
                </a>
            </div>
            */?>
            <div class="row">
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-1'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-triple" src="<?=Url::base().'images/'.$frontPageElements['tour-1'][0]['image_url']?>"/>
                </a>
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-2'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-triple" src="<?=Url::base().'images/'.$frontPageElements['tour-2'][0]['image_url']?>"/>
                </a>
                <a href="?r=site/tours&id=<?=$frontPageElements['tour-3'][0]['clickable_url']?>">
                    <img class="tour-image bordered-image-triple" src="<?=Url::base().'images/'.$frontPageElements['tour-3'][0]['image_url']?>"/>
                </a>
            </div>
            <div class="row">
            <br/>
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/about')?>">
                        <img class="image-filled" src="<?=Url::base().'images/'
                            .$frontPageElements['about'][0]['image_url']
                            .''?>"
                        />
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
        <h3><?= Yii::t('app', 'Voice')?></h3>
    </div>
    <div class="row">
        <?php
        for($i=0; $i<count($frontPageElements['participation-image']); $i++) {
            echo '<div class="col-md-5 participation-voice-rectangle">';
            // echo '<img class="image-filled participation-voice-rectangle" src="'
            //     .Url::base()
            //     .'images/'
            //     .$frontPageElements['participation-image'][$i]['image_url']
            //     .'"/>';
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
            <div class="fb-page" data-href="https://www.facebook.com/samuraimeetups/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-height="200" data-width="400">
                <blockquote cite="https://www.facebook.com/samuraimeetups/?fref=ts" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/samuraimeetups/?fref=ts">Samurai Meetups</a>
                </blockquote>
            </div>
        </div>
        <div class="col-md-6">
            <a href="<?=Url::toRoute('site/samurai')?>">
            <img class="image-filled" src="<?=Url::base()
                .'images/'
                .$frontPageElements['icon'][0]['image_url']
                .''?>"/>
            </a>
        </div>
    </div>
</div>
