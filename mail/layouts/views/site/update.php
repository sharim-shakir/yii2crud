<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

  <h1>Update Student</h1>

    <div class="body-content">
<?php
  $form = ActiveForm::begin()?>

        <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <?= $form->field($student,'full_name');?>
            </div>
          </div>
        </div>
                <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <?= $form->field($student,'contact');?>
            </div>
          </div>
        </div>
                <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <?= $form->field($student,'address');?>
            </div>
          </div>
        </div>

<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            <?= $form->field($student, 'date_of_birth')->input('date', ['class' => 'form-control']); ?>
        </div>
    </div>
</div>





<div class="row">
    <div class="form-group">
        <div class="col-lg-6">
            <?php
            // Unserialize the subject data if it's not null
            $selectedSubjectIds = $student->subject ? explode(',', $student->subject) : [];

            echo $form->field($student, 'subject')->dropDownList(
                \yii\helpers\ArrayHelper::map($subject, 'id', 'title'),
                [
                    'multiple' => true,
                    'prompt' => 'Select subjects',
                    'options' => $selectedSubjectIds // Preselect the options using an array of IDs
                ]
            );
            ?>
        </div>
    </div>
</div>

        <div class="row">
          <div class="form-group">
            <div class="col-lg-6">
              <div class="col-lg-3">
                <?= Html::submitButton('Update Student',['class'=>'btn btn-primary']);?>
              </div>
             <div class="col-lg-2">
    <a href='<?php echo yii::$app->homeUrl;?>' class="btn btn-primary">>Go Back</a>
              </div>
            </div>
          </div>
        </div>

  <?php ActiveForm::end() ?>
    </div>
</div>
