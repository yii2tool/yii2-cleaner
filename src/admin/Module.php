<?php

namespace yii2tool\cleaner\admin;

use yii\base\Module as YiiModule;
use yii2rails\extension\web\helpers\Behavior;
use yii2tool\cleaner\domain\enums\CleanerPermissionEnum;


/**
 * app module definition class
 */
class Module extends YiiModule
{
	public static $langDir = '@yii2module/cleaner/domain/messages';

    public function behaviors()
    {
        return [
            'access' => Behavior::access(CleanerPermissionEnum::MANAGE),
        ];
    }
}
