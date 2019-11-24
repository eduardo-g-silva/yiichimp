<?php
use usni\library\widgets\Thumbnail;
use yii\web\View;



$model  = $formDTO->getPerson();
?>
<?= $form->field($model, 'firstname')->textInput();?>
<?= $form->field($model, 'lastname')->textInput();?>
<?= $form->field($model, 'email')->textInput();?>
<?= $form->field($model, 'couple')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']);?>
<?= $form->field($model, 'dancing_role')->dropDownList(['Leader' => 'Leader', 'Follower' => 'Follower'],['prompt'=>'Select Option']);?>
<?= $form->field($model, 'mobilephone')->textInput();?>
<?= Thumbnail::widget(['model' => $model,
                       'attribute' => 'profile_image',
                       'deleteUrl' => $deleteUrl]);?>
<?= $form->field($model, 'profile_image')->fileInput();?>

<?php
$script = <<< JS
 $(document).ready(function() {
   $("#partner_details").hide();
   $('#couple').on('change', function() {
    if ( $(event.target).val() == 'Yes') {
        $("#partner_details").show();
    } else {
          $("#partner_details").hide();
      }
    });
 });
JS;
$this->registerJs($script, View::POS_READY);

//$script = <<< JS
// $(document).ready(function() {
//   alert("Hello jquery Inline");
// });
//JS;
//$this->registerJs($script, View::POS_READY);
?>