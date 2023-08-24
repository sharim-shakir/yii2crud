<?php

use yii\helpers\html;
/** @var yii\web\View $this */

$this->title = 'Student Record Management';
?>
<div class="site-index">
<?php if(yii::$app->session->hasFlash('message')): ?>
   <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
           <?php echo yii::$app->session->getFlash('message'); ?>
   </div>

<?php endif; ?>
    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1>Student Record Management:</h1>
    </div>
    <div>
        <span style="margin-bottom: 20px;"><?= Html::a('Student',['/site/create'],['class'=>'btn btn-primary'])?></span>
        <span style="margin-bottom: 20px;"><?= Html::a('Course',['/site/course'],['class'=>'btn btn-success'])?></span>
        <span style="margin-bottom: 20px;"><?= Html::a('Subject',['/site/subject'],['class'=>'btn btn-danger'])?></span>
    </div>

    <div class="body-content">

        <div class="row">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Full Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Address</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Course Books</th>
      <th scope="col">Subject</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($student)>0): ?>
    <?php foreach ($student  as $student): ?>

    <tr class="table-active">
      <th scope="row"><?php echo $student->id; ?></th>
      <td><?php echo $student->full_name; ?></td>
      <td><?php echo $student->contact; ?></td>
      <td><?php echo $student->address; ?></td>
      <td><?php echo $student->date_of_birth; ?></td>
      
      <td>
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
</td>

<td>
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
</td>


      <td>
        <span><?= Html::a('View', ['view', 'id' => $student->id], ['class' => 'btn btn-primary']) ?></span>
<span><?= Html::a('Update', ['update', 'id' => $student->id], ['class' => 'btn btn-success']) ?></span>
<span><?= Html::a('Delete', ['delete', 'id' => $student->id], ['class' => 'btn btn-danger']) ?></span>

      </td>



    </tr>
<?php endforeach; ?>
    <?php else: ?>
        <tr> 
            <td>No Records Found!</td>
        </tr>
    <?php endif; ?>

  </tbody>
</table>
 
 </div>
    </div>
</div>
