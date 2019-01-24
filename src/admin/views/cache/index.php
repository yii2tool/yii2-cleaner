<?php

use yii2lab\app\domain\enums\AppEnum;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii2lab\extension\widget\SwitchInput;

$this->title = Yii::t('cleaner/cache','title');

?>

<div class="box box-primary">
	<?php $form = ActiveForm::begin([
		'options' => ['class' => 'form-vertical'],
	]);?>
		<div class="box-body">
			<?php
			foreach(AppEnum::all() as $app) {
				echo $form->field($model, $app)->widget(SwitchInput::class, SwitchInput::yesNoConfig());
			}
			?>
		</div>
		<div class="box-footer">
			<?= Html::submitButton('<i class="fa fa-trash-o"></i> '.\Yii::t('main','clear'), ['class' => 'btn btn-danger', 'name' => 'clear-button']);?>
		</div>
	<?php ActiveForm::end(); ?>
</div>
