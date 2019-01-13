Установка
===

Устанавливаем зависимость:

```
composer require yii2module/yii2-cleaner
```

Создаем полномочие:

```
oCleanerManage
```


Объявляем console модуль:

```php
return [
	'modules' => [
		// ...
		'cleaner' => 'yii2module\cleaner\console\Module',
		// ...
	],
];
```

Объявляем backend модуль:

```php
return [
	'modules' => [
		// ...
		'cleaner' => [
			'class' => 'yii2module\cleaner\admin\Module',
			'as access' => Config::genAccess(PermissionEnum::CLEANER_MANAGE),
		],
		// ...
	],
];
```