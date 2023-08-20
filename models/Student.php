<?php
 namespace app\models;

 use yii\db\ActiveRecord;

 /**
  * 
  */
 class Student extends ActiveRecord
 {
 	private $fullname;
 	private $contact;
 	private $address;
 	private $date_of_birth;
 	private $course_books;
 	private $subject;




 	
 	public function rules(){
 		return[
 			[['full_name','contact','address','date_of_birth','course_books','subject'],'required']
 		];
 	}
 	
 }

?>