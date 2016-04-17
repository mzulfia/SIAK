<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'Admin.models.*',
			'Admin.components.*',
		));
		// $this->setComponents(array(
		// 	'errorHandler' => array(
		// 		'errorAction' => 'Admin/admin/error'),
		// 	'user' => array(
		// 		'class' => 'CWebUser',
		// 		'loginUrl' => Yii::app()->createUrl('Admin/admin/login'),
		// 		)
		// 	));
		// Yii::app()->user->setStateKeyPrefix('_admin');
	}

	public function beforeControllerAction($controller, $action)
	{
		// if(Yii::app()->getModule('Admin')->user->isGuest)
		// {
		// 	Yii::app()->getModule('Admin')->user->setReturnUrl('Admin/admin/login');
		// }

		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
