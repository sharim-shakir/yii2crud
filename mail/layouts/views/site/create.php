<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

  <h1>Create Student</h1>

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
        <div class="col-lg-12">
          <h6>Course Books</h6>
            <?php
            // Unserialize the course_books data if it's not null
            $selectedCourseBooks = $student->course_books ? unserialize($student->course_books) : [];

            $courseItemsPerRow = 10; // Set the number of course items per row
            $rowCount = 0;

            echo '<div class="row">';

            $firstItem = false;

            foreach ($course as $courseItem) {
                if ($rowCount == $courseItemsPerRow) {
                    echo '</div><div class="row">';
                    $rowCount = 0;
                }

                echo '<div class="col-md-1" style="display: flex; flex-direction: column; align-items: center; margin-bottom: 10px;">';
                
                if ($firstItem) {
                    echo Html::encode($courseItem->title);
                    $firstItem = false;
                } else {
                    $checkboxOptions = [
                        'label' => Html::encode($courseItem->title),
                        'value' => $courseItem->id,
                        'checked' => in_array($courseItem->id, $selectedCourseBooks),
                    ];
                    echo Html::checkbox("Student[course_books][$courseItem->id]", in_array($courseItem->id, $selectedCourseBooks), $checkboxOptions);
                }
                
                echo '</div>';

                $rowCount++;
            }

            echo '</div>';
            ?>
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
                <?= Html::submitButton('Create Student',['class'=>'btn btn-primary']);?>
    <a href='<?php echo yii::$app->homeUrl;?>' class="btn btn-primary">Go Back</a>
          </div>
        </div>

  <?php ActiveForm::end() ?>
    </div>
</div>
