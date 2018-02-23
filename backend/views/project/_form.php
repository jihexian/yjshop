<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker; 
/* @var $this yii\web\View */
/* @var $model backend\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'describe')->textInput(['maxlength' => true]) ?>

   
    <?= $form->field($model, 'create_time')->widget(DateTimePicker::classname(), [ 
    'options' => ['placeholder' => ''], 
    'pluginOptions' => [ 
        'autoclose' => true, 
        'todayHighlight' => true, 
    ] 
]); ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
