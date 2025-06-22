<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="card shadow-sm">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <h5 class="mb-3">👤 User Account Info</h5>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($user, 'username')->textInput(['placeholder' => 'Enter username']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($user, 'password_hash')->passwordInput(['placeholder' => 'Enter password']) ?>
            </div>
        </div>

        <h5 class="mb-3 mt-4">🩺 Doctor Profile</h5>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'full_name')->textInput(['placeholder' => 'Full name']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'specialization')->textInput(['placeholder' => 'Specialization']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput(['placeholder' => '+255...']) ?>
            </div>
        </div>

        <div class="form-group mt-4">
            <?= Html::submitButton('💾 Save Doctor', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

