<?php
 namespace app\models;

 use yii\db\ActiveRecord;

 /**
  * 
  */
 class Course extends ActiveRecord
 {
 	private $title;
 	private $description;

 	
 	public function rules(){
 		return[
 			[['title','description',],'required']
 		];
 	}
 	
 }

?>