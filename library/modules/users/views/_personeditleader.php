<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use usni\library\utils\NationalityUtil;
use marqu3s\summernote\Summernote;


$model  = $formDTO->getPerson();
?>
<?= Html::activeHiddenInput($model, 'couple', ['value' => 1]);?>
<?= Html::activeHiddenInput($model, 'dancing_role', ['value' => 0]);?>
<?php echo $form->field($model, 'registration_type')->dropDownList(['Pista' => 'Pista', 'Stage' => 'Stage', 'Pista & Stage' => 'Pista & Stage' ],['prompt'=>'Select Option']); ?>
<?= $form->field($model, 'firstname')->textInput();?>
<?= $form->field($model, 'lastname')->textInput();?>
<?= $form->field($model, 'email')->textInput();?>
<?= $form->field($model, 'city')->textInput();?>
<?= $form->field($model, 'nationality')->select2input(NationalityUtil::getNationalities());?>
<?= $form->field($model, 'mobilephone')->textInput();?>
<?= $form->field($model, 'facebook')->textInput();?>
<?= $form->field($model, 'comments')->widget(Summernote::class, [
    'options' => ['placeholder' => 'Anything you want to let us know ...']
]);
?>
<?= Thumbnail::widget(['model' => $model,
                       'attribute' => 'profile_image',
                       'deleteUrl' => $deleteUrl]);?>
<?= $form->field($model, 'profile_image')->fileInput();?>
