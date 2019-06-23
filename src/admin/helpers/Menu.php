<?php

namespace yii2tool\cleaner\admin\helpers;

use yii2rails\extension\menu\interfaces\MenuInterface;
use yii2tool\cleaner\domain\enums\CleanerPermissionEnum;

class Menu implements MenuInterface {
	
	public function toArray() {
		return [
			'label' => ['cleaner/cache', 'cache'],
			'url' => 'cleaner/cache',
			'module' => 'cleaner',
			//'icon' => 'trash-o',
			'access' => CleanerPermissionEnum::MANAGE,
		];
	}

}
