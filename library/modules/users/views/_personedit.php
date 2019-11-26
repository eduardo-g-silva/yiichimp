<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;
use kartik\form\ActiveForm;
use kartik\widgets\SwitchInput;
use usni\library\utils\CustomerTypeUtil;
use yii\helpers\Html;


$model  = $formDTO->getPerson();
?>
<?= Html::activeHiddenInput($model, 'type', ['value' => CustomerTypeUtil::CUSTOMER_TYPE_FESTIVAL_SINGLE]);?>
<?= $form->field($model, 'dancing_role')->dropDownList(['Leader' => 'Leader', 'Follower' => 'Follower'],['prompt'=>'Select Option']);?>
<?= $form->field($model, 'firstname')->textInput();?>
<?= $form->field($model, 'lastname')->textInput();?>
<?= $form->field($model, 'email')->textInput();?>
<?= $form->field($model, 'mobilephone')->textInput();?>
<?php echo $form->field($model, 'couple')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
<?= $form->field($model, 'partner_firstname')->textInput();?>
<?= $form->field($model, 'partner_lastname')->textInput();?>
<?= Thumbnail::widget(['model' => $model,
                       'attribute' => 'profile_image',
                       'deleteUrl' => $deleteUrl]);?>
<?= $form->field($model, 'profile_image')->fileInput();?>

<?php
$script = <<< JS
 $(document).ready(function() {
   $('#person-couple').on('change', function() {
    if ( $(event.target).val() == '1') {
       $('input#customer-type').val('4');
       $(".field-person-partner_firstname").show();
       $(".field-person-partner_lastname").show();
    } else {
       $('input#customer-type').val('3');
       $(".field-person-partner_firstname").hide();
       $(".field-person-partner_lastname").hide();
      }
    });
 });
JS;
$this->registerJs($script, View::POS_READY);
?>