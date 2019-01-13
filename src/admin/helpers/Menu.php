<?php

namespace yii2module\cleaner\admin\helpers;

use yii2lab\extension\menu\interfaces\MenuInterface;
use yii2module\cleaner\domain\enums\CleanerPermissionEnum;

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
