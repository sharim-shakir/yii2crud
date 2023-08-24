<?php

use yii\helpers\html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

  <h1>View Student</h1>

    <div class="body-content">
      <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $student->full_name;?>
     </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $student->contact;?>
   </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $student->address;?>
   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">
   <?php echo $student->date_of_birth;?>
   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">
      <?php
    // Explode the course_books string into an array of IDs
    $courseIds = explode(',', $student->course_books);

    // Fetch the course names based on the IDs
    $courseNames = [];
    foreach ($courseIds as $courseId) {
        $courseModel = \app\models\Course::findOne($courseId); // Adjust the namespace and model name as needed
        if ($courseModel) {
            $courseNames[] = $courseModel->title;
        }
    }

    // Display the course names
    echo implode(', ', $courseNames);
    ?>

   </li>
     <li class="list-group-item d-flex justify-content-between align-items-center">

    <?php
    // Explode the subject string into an array of IDs
    $subjectIds = explode(',', $student->subject);

    // Fetch the subject names based on the IDs
    $subjectNames = [];
    foreach ($subjectIds as $subjectId) {
        $subjectModel = \app\models\Subject::findOne($subjectId); // Adjust the namespace and model name as needed
        if ($subjectModel) {
            $subjectNames[] = $subjectModel->title;
        }
    }

    // Display the subject names
    echo implode(', ', $subjectNames);
    ?>
   </li>
</ul>
<div class="row">
    <a href='<?php echo yii::$app->homeUrl;?>' class="btn btn-primary">>Go Back</a>  
</div>

    </div>
</div>
