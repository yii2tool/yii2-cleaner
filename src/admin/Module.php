<?php

namespace yii2module\cleaner\admin;

use yii\base\Module as YiiModule;
use yii2lab\extension\web\helpers\Behavior;
use yii2module\cleaner\domain\enums\CleanerPermissionEnum;


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
