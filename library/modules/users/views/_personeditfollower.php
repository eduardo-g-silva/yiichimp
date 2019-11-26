<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;


$model  = $formDTO->getPerson();
?>
<?= $form->field($model, 'partner_firstname')->textInput();?>
<?= $form->field($model, 'partner_lastname')->textInput();?>
