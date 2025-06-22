<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Appointment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'patient_id')->dropDownList(
                        \yii\helpers\ArrayHelper::map($patients, 'id', 'full_name'),
                        ['prompt' => 'Select Patient', 'class' => 'form-select']
                    ) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'doctor_id')->dropDownList(
                        \yii\helpers\ArrayHelper::map($doctors, 'id', 'full_name'),
                        ['prompt' => 'Select Doctor', 'class' => 'form-select']
                    ) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'appointment_date')->input('date', ['class' => 'form-control']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'appointment_time')->input('time', ['class' => 'form-control']) ?>
                </div>
            </div>

            <?= $form->field($model, 'status')->dropDownList([
                'pending' => 'Pending',
                'confirmed' => 'Confirmed',
                'cancelled' => 'Cancelled',
                'completed' => 'Completed',
            ], ['class' => 'form-select']) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('Save Appointment', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

