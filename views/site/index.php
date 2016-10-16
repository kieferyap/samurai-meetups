<?php

use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Samurai Meetups');
?>

<style type="text/css">
    #voice-index-0 {
        background-image: url(<?=Url::base().'images/report-001-sidebar.jpg'?>);
    }
    #voice-index-1 {
        background-image: url(<?=Url::base().'images/report-001-sidebar.jpg'?>);
    }
</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="site-index">
    <br/>

    <!-- Slideshow Section -->
    <div class="row">
        <div class="center-wrapper">    
            <div class="center-div">   
                <?php
                    $images = [];
                    foreach($frontPageElements['slideshow'] as $element) {
                        $images[] = '<img class="carousel-image" src="'
                            .Url::base()
                            .'images/'
                            .$element['value']
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

    <!-- Tours Section -->
    <div class="center-wrapper">    
        <div class="center-div">
            <?php
                $images = [];
                foreach($frontPageElements['tour'] as $element) {
                    $images[] = [
                        'value' => $element['value'],
                        'extra_information' => $element['extra_information']
                    ];
                }
                $tourUrl = '?r=site/tours&id=';
                $imageBase = Url::base().'images/';
            ?>
            <div class="row">
            <?php foreach($images as $image):?>
                <a href="<?=$tourUrl?><?=$image['extra_information']?>">
                    <img 
                        class="tour-image bordered-image-triple" 
                        src="<?=$imageBase?>/<?=$image['value']?>"
                    />
                </a>
            <?php endforeach;?>
            </div>

    <!-- Report, About, Samurai Section -->
            <div class="row">
            <br/>
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/about')?>">
                        <img 
                            class="image-filled" 
                            src="<?=$imageBase?><?=$frontPageElements['about'][0]['value']?>"
                        />
                    </a>
                </div>
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/report')?>">
                        <img 
                            class="image-filled" 
                            src="<?=$imageBase?><?=$frontPageElements['report'][0]['value']?>"
                        />
                    </a>
                </div>
                <div class="col-md-4 bordered-image-triple">
                    <a href="<?=Url::toRoute('site/samurai')?>">
                        <img 
                            class="image-filled" 
                            src="<?=$imageBase?><?=$frontPageElements['samurai'][0]['value']?>"
                        />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr/>

    <!-- Voice -->
    <div class="row margin-top-20">
        <h3><?= Yii::t('app', 'Voice')?></h3>
    </div>
    <div class="row">
        <?php
        $voices = [];
        $voiceIndex = 0;
        for($i=0; $i<count($frontPageElements['voice']); $i++) {
            $voices[] = [
                'image' => $frontPageElements['voice_image'][$i]['value'],
                'text' => $frontPageElements['voice'][$i]['value']
            ];
        }
        ?>
        <?php foreach($voices as $voice):?>
        <div
            class="participation-voice-rectangle" 
            id="voice-index-<?=$voiceIndex?>"
        >
            <img 
                class="col-md-3 participation-voice-image"
                src="<?=$imageBase?><?=$voice['image']?>"
            >
            <div class="col-md-9 participation-voice-text">
                <?=$voice['text']?>
            </div>
            <?php $voiceIndex+=1; ?>
        </div>
        <?php endforeach;?>
    </div>
    <br/>
    <div class="row">
        <div class="facebook-like col-md-6">
            <center>
                <div class="fb-page" data-href="https://www.facebook.com/samuraimeetups/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-height="200" data-width="400">
                    <blockquote cite="https://www.facebook.com/samuraimeetups/?fref=ts" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/samuraimeetups/?fref=ts">Samurai Meetups</a>
                    </blockquote>
                </div>
            </center>
        </div>
        <div class="col-md-6">
            <a href="<?=Url::toRoute('site/samurai')?>">
            <img class="image-filled" src="<?=Url::base()
                .'images/'
                .$frontPageElements['samurai_bottom'][0]['value']
                .''?>"/>
            </a>
        </div>
    </div>
</div>
