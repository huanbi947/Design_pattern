<?php

class BaseController{

	const VIEW_FOLDER_NAME = 'views';
	const MODEL_FOLDER_NAME = 'models';
	const KEY_PRIVATE = 'se7en';
	/**
	* Descrtiption
	* 	+ Path name: folderName.fileName
	*	+ Lấy từ sau thư mục View
	*/
	protected function loadView($viewpath, array $data = []){
		//$viewpath = self::VIEW_FOLDER_NAME .'/'. str_replace('.', '/', $viewpath) . '.php';
		foreach ($data as $key => $value) {
			$$key = $value;
		}
		return require (self::VIEW_FOLDER_NAME .'/'. str_replace('.', '/', $viewpath) . '.php');
	}
	protected function loadModel($modelpath){
		$modelpath = self::MODEL_FOLDER_NAME .'/'. $modelpath . '.php';
		return require ($modelpath);
	}

	protected function includeView($headerpath, array $data = []){
		foreach ($data as $key => $value) {
			$$key = $value;
		}
		return include_once(self::VIEW_FOLDER_NAME.'/'.str_replace('.', '/', $headerpath).'.php');
	}

	protected function removeSpecialCharacter($str) {
		$str = str_replace('\\', '\\\\', $str);
		$str = str_replace('\'', '\\\'', $str);
		return $str;
	}

	protected function getPost($key){
		$value = '';
		if(isset($_POST[$key])) {
			$value = $_POST[$key];
		}
		return $this->removeSpecialCharacter($value);
	}

	protected function getGet($key){
		$value = '';
		if(isset($_GET[$key])) {
			$value = $_GET[$key];
		}
		return $this->removeSpecialCharacter($value);
	}
}