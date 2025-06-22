
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container mt-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Update Queue Entry</h4>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'status')->dropDownList([
                'waiting' => 'Waiting',
                'in_progress' => 'In Progress',
                'done' => 'Done',
                'missed' => 'Missed',
            ], ['class' => 'form-select']) ?>

            <?= $form->field($model, 'notes')->textarea([
                'rows' => 3,
                'class' => 'form-control',
                'placeholder' => 'Any notes...'
            ]) ?>

            <?= $form->field($model, 'estimated_wait')->input('number', [
                'class' => 'form-control',
                'min' => 0,
                'placeholder' => 'Minutes'
            ]) ?>

            <div class="form-group mt-3">
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
