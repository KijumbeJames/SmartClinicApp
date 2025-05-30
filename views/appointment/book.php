<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Book Appointment';
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'doctor_id')->dropDownList($doctorList, ['prompt' => 'Select a Doctor']) ?>

            <?= $form->field($model, 'appointment_date')->input('date') ?>

            <?= $form->field($model, 'appointment_time')->input('time') ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('Book Appointment', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

