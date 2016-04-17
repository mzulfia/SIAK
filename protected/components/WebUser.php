<?php
class WebUser extends CWebUser
{
	function isAdmin(){
		$user = Yii::app()->user->getState('role');
		if($user == '1')
			return true;
		else
			return false;
	}
	function isSekretariat(){
		$user = Yii::app()->user->getState('role');
		if($user == '2')
			return true;
		else
			return false;
	}	
	function isDosen(){
		$user = Yii::app()->user->getState('role');
		if($user == '3')
			return true;
		else
			return false;
	}
	function isMahasiswa(){
		$user = Yii::app()->user->getState('role');
		if($user == '4')
			return true;
		else
			return false;
	}
}