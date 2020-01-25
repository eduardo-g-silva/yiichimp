<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use usni\library\utils\CustomerTypeUtil;
use yii\helpers\Html;
use marqu3s\summernote\Summernote;


$model  = $formDTO->getPerson();
?>
<?= $form->field($model, 'dancing_role')->dropDownList(['Leader' => 'Leader', 'Follower' => 'Follower'],['prompt'=>'Select Your Dancing Role']);?>
<?= $form->field($model, 'firstname')->textInput();?>
<?= $form->field($model, 'lastname')->textInput();?>
<?= $form->field($model, 'email')->textInput();?>
<?= $form->field($model, 'mobilephone')->textInput();?>
<?= $form->field($model, 'facebook')->textInput();?>
<?= $form->field($model, 'partner_role')->dropDownList(['Leader' => 'Leader', 'Follower' => 'Follower'],['prompt'=>'Select Your Dancing Role']);?>
<?= $form->field($model, 'partner_firstname')->textInput();?>
<?= $form->field($model, 'partner_lastname')->textInput();?>
<?= $form->field($model, 'partner_facebook')->textInput();?>
<?= Thumbnail::widget(['model' => $model,
                       'attribute' => 'profile_image',
                       'deleteUrl' => $deleteUrl]);?>
<?= $form->field($model, 'comments')->widget(Summernote::class, [
    'options' => ['placeholder' => 'Anthing you want to let us know ...']
    ]);
?>

<?php
$script = <<< JS
 $(document).ready(function() {
   $('#person-couple').on('change', function() {
    if ( $(event.target).val() == '1') {
       $('input#customer-type').val('4');
       $(".field-person-partner_role").show();
       $(".field-person-partner_firstname").show();
       $(".field-person-partner_lastname").show();
    } else {
       $('input#customer-type').val('3');
       $(".field-person-partner_role").hide();
       $(".field-person-partner_firstname").hide();
       $(".field-person-partner_lastname").hide();
      }
    });
   $('#person-dancing_role').on('change', function() {
    if ( $(event.target).val() == 'Leader') {
       $('.field-person-partner_role').val('Follower');
    } else {
       $('.field-person-partner_role').val('Leader');
      }
    });    
 });
JS;
$this->registerJs($script, View::POS_READY);
?>