<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use usni\library\utils\NationalityUtil;

$model  = $formDTO->getPerson();
?>
<?= $form->field($model, 'partner_role')->textInput();?>
<?= $form->field($model, 'partner_firstname')->textInput();?>
<?= $form->field($model, 'partner_lastname')->textInput();?>
<?= $form->field($model, 'partner_city')->textInput();?>
<?= $form->field($model, 'partner_nationality')->select2input(NationalityUtil::getNationalities());?>
<?= $form->field($model, 'partner_facebook')->textInput();?>
