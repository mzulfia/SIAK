<?php

class MahasiswaModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'Mahasiswa.models.*',
			'Mahasiswa.components.*',
		));
		// $this->layoutPath = Yii::getPathOfAlias('Mahasiswa.views.layouts');
		// $this->layout = 'column2';
	}

	public function beforeControllerAction($controller, $action)
	{
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
