<?php

namespace yii2module\cleaner\domain\helpers;

use yii2lab\app\domain\enums\AppEnum;
use yii\base\InvalidArgumentException;
use yii2lab\extension\yii\helpers\FileHelper;

class ClearHelper
{
	
	public static function run($names)
	{
		$result = [];
		$apps = AppEnum::values();
		foreach($apps as $app) {
			foreach($names as $name) {
				$dir = $app . DS . $name;
				$appRes = self::clearApp($dir);
				$result = array_merge($result, $appRes);
			}
		}
		return $result;
	}
	
	private static function clearApp($dir)
	{
		$result = [];
		if(!is_dir($dir)) {
			return [];
		}
		$options['recursive'] = false;
		$options['withDir'] = true;
		$options['except'][] = '.gitignore';
		$fileList = self::findFiles($dir, $options);
		foreach($fileList as $file) {
			$file = FileHelper::normalizePath($file);
			FileHelper::remove($file);
			$result[] = $file;
		}
		return $result;
	}
	
	private static function findFiles($dir, $options = [])
	{
	   if (!is_dir($dir)) {
			throw new InvalidArgumentException("The dir argument must be a directory: $dir");
		}
		 $dir = rtrim($dir, DIRECTORY_SEPARATOR);
		if (!isset($options['basePath'])) {
			// this should be done only once
			$options['basePath'] = realpath($dir);
			////$options = FileHelper::normalizeOptions($options);
		}
		$list = [];
		$handle = opendir($dir);
		if ($handle === false) {
			throw new InvalidArgumentException("Unable to open directory: $dir");
		}
		while (($file = readdir($handle)) !== false) {
			if ($file === '.' || $file === '..') {
				continue;
			}
			$path = $dir . DIRECTORY_SEPARATOR . $file;
			if (FileHelper::filterPath($path, $options)) {
				if (is_file($path)) {
					$list[] = $path;
				} elseif (is_dir($path)) {
					if(!empty($options['withDir'])) {
						$list[] = $path;
					}
					if ((!isset($options['recursive']) || $options['recursive'])) {
						$list = array_merge($list, static::findFiles($path, $options));
					}
				}
			}
		}
		closedir($handle);

		return $list;
	}
}
