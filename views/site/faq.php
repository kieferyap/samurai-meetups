<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'FAQ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>

    <div class="faq-container">
    <?php $i = 0; ?>
    <?php foreach($faq as $element): ?>
    	<div class="row">
	    	<div class="col-md-12">
		    	<div class="question"><?=$element['question']?></div>
		    	<div class="answer"><?=$element['answer']?></div>
		    </div>
		</div>
		<?php 
			// Insert a horizonal break when not in the last row
    		if ($i != count($element)-1) {
    			echo '<hr/>';
    		}
    		$i+=1;
    	?>
    <?php endforeach; ?>
    </div>

</div>
