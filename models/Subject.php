<?php
 namespace app\models;

 use yii\db\ActiveRecord;

 /**
  * 
  */
 class Subject extends ActiveRecord
 {
 	private $title;
 	private $description;

 	
 	public function rules(){
 		return[
 			[['title','description'],'required']
 		];
 	}
 	
 }

?>