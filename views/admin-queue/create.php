
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container mt-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add to Queue</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'appointment_id')->dropDownList(
                $appointments,
                ['prompt' => 'Select Appointment', 'class' => 'form-select']
            ) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('➕ Add', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

