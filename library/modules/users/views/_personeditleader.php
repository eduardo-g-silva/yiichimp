<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use usni\library\utils\CustomerTypeUtil;
use yii\helpers\Html;

$model  = $formDTO->getPerson();
?>
<?= Html::activeHiddenInput($model, 'type', ['value' => CustomerTypeUtil::CUSTOMER_TYPE_COMPETITOR]);?>
<?= Html::activeHiddenInput($model, 'couple', ['value' => 1]);?>
<?= Html::activeHiddenInput($model, 'dancing_role', ['value' => 0]);?>
<?= $form->field($model, 'firstname')->textInput();?>
<?= $form->field($model, 'lastname')->textInput();?>
<?= $form->field($model, 'email')->textInput();?>
<?= $form->field($model, 'mobilephone')->textInput();?>
<?= Thumbnail::widget(['model' => $model,
                       'attribute' => 'profile_image',
                       'deleteUrl' => $deleteUrl]);?>
<?= $form->field($model, 'profile_image')->fileInput();?>
