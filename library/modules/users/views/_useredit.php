<?php
use usni\library\utils\TimezoneUtil;
use usni\library\modules\users\utils\UserUtil;
use usni\library\utils\CustomerTypeUtil;

$model   = $formDTO->getModel();

?>
<?= $form->field($model, 'username')->textInput();?>
<?= $form->field($model, 'status')->select2input(UserUtil::getStatusDropdown());?>
<?= $form->field($model, 'status')->select2input(UserUtil::getCustomerTypeDropdown());?>
<?= $form->field($model, 'timezone')->select2input(TimezoneUtil::getTimezoneSelectOptions());?>
<?= $form->field($model, 'groups')->select2input($formDTO->getGroups(), true, ['multiple'=>'multiple']);?>
<?php
if($model->scenario == 'create' || $model->scenario == 'registration')
{
?>
    <?= $form->field($model, 'password')->passwordInput();?>
    <?= $form->field($model, 'confirmPassword')->passwordInput();?>
    <?= $form->field($model, 'type')->dropDownList([CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_COUPLE => 'Couple', CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_LEADER => 'Leader',CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_FOLLOWER => 'Follower'],['prompt'=>'Select Option']); ?>
<?php
}
?>
<?= $form->field($model,'type')->hiddenInput(['value' => 'system'])->label(false);?>
