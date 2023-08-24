<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

  <h1>Create Course</h1>

    <div class="body-content">
<?php
  $form = ActiveForm::begin()?>

        <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <?= $form->field($course,'title');?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <?= $form->field($course,'description')->textarea(['rows' => '4']);?>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="form-group">
                <?= Html::submitButton('Create Course',['class'=>'btn btn-primary']);?>
           
    <a href='<?php echo yii::$app->homeUrl;?>' class="btn btn-primary">Go Back</a>
          </div>
        </div>

  <?php ActiveForm::end() ?>
    </div>
</div>
