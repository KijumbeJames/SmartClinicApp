<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Join Queue';
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Join the Clinic Queue</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'doctor_id')->dropDownList($doctors, ['prompt' => 'Select Doctor']) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('Join Queue', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

