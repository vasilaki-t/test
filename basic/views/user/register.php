<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>
    <?= $form->field($model, 'type')->dropDownList(array_merge([0 => '-'], $model->getUserTypes()), ['class' => 'user_type form-control']); ?>

    <?= Html::beginTag('div', ['class' => 'user_row user_type_1 user_type_2']) ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= Html::endTag('div'); ?>

    <?= Html::beginTag('div', ['class' => 'user_row user_type_1 user_type_2']) ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= Html::endTag('div'); ?>

    <?= Html::beginTag('div', ['class' => 'user_row user_type_2 user_type_3 ']) ?>
    <?= $form->field($model, 'inn')->textInput() ?>
    <?= Html::endTag('div'); ?>

    <?= Html::beginTag('div', ['class' => 'user_row user_type_3']) ?>
    <?= $form->field($model, 'organisation_name')->textInput() ?>
    <?= Html::endTag('div'); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->


<?php
$this->registerCss('.user_row {display:none}');

$this->registerJs(
    "
     function hideRow (user_type){
        $('.user_row').hide(); 
        $('.user_type_' + user_type).show(); 
    }
    hideRow($('.user_type').val());
    $('.user_type').on('change',function(){
        hideRow($(this).val()) 
    });",
    View::POS_LOAD,
    'drop_down_change'
);
?>
