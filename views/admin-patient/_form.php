<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $model app\models\Patient */
/** @var $user app\models\User */

?>

<div class="patient-form">
    <?php $form = ActiveForm::begin(); ?>

    <h4>👤 Patient Account Info</h4>
    <?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($user, 'password_hash')->passwordInput(['maxlength' => true]) ?>

    <h4>🧑‍⚕️ Patient Profile Info</h4>
    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropDownList(['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], ['prompt' => 'Select Gender']) ?>
    <?= $form->field($model, 'date_of_birth')->input('date') ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <div class="form-group">
        <?= Html::submitButton('💾 Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

