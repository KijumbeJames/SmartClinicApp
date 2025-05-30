<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\Prescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prescription-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <?= $form->field($model, 'medication')->textInput(['maxlength' => true, 'placeholder' => 'e.g. Amoxicillin']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dosage')->textInput(['maxlength' => true, 'placeholder' => 'e.g. 500mg']) ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <?= $form->field($model, 'duration')->textInput(['maxlength' => true, 'placeholder' => 'e.g. 5 days']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'notes')->textarea(['rows' => 3, 'placeholder' => 'Additional instructions for the patient...']) ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
        ]) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

