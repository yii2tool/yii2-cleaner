<?php

namespace yii2tool\cleaner\console\controllers;

use yii2rails\extension\console\base\Controller;
use yii2tool\cleaner\domain\helpers\ClearHelper;
use yii2rails\extension\console\helpers\Output;
use yii2rails\extension\console\helpers\input\Select;

/**
 * Cleaner module.
 */
class DefaultController extends Controller
{
	
	/**
	 * Clear assets, runtime, cache, test output
	 */
	public function actionIndex($option = null)
	{
		// todo: вынести в конфиг домена
		$allNames = [
			'web/assets',
			'runtime',
			'runtime/cache',
			'tests/_output',
		];
		$answer = Select::display('Select objects', $allNames, 1);
		$result = ClearHelper::run($answer);
		if($result) {
			Output::items($result, "Clear completed: " . count($result) . " objects");
		} else {
			Output::block("Not fount object for clear!");
		}
	}
	
}
