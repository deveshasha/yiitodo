<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use app\models\Status;
?>
<?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'text')->textArea(['rows' => '4'])->label('Enter your task'); ?>
 
    <?= $form->field($model, 'completion')->dropDownList($model->getCompletions(),['prompt'=>'-Select completion-']) ?>
 
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
 
<?php ActiveForm::end(); ?>