<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Patient Registration';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
                </div>

                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="mb-4">
                        <h5 class="text-primary">Login Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($user, 'username')->textInput(['placeholder' => 'Enter username']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($user, 'password')->passwordInput(['placeholder' => 'Enter password']) ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <h5 class="text-primary">Personal Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($patient, 'full_name')->textInput(['placeholder' => 'Your full name']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($patient, 'gender')->dropDownList(
                                    ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'],
                                    ['prompt' => 'Select']
                                ) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($patient, 'date_of_birth')->input('date') ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($patient, 'phone')->textInput(['placeholder' => 'e.g. +255712345678']) ?>
                            </div>
                        </div>
                        <?= $form->field($patient, 'address')->textarea(['rows' => 3, 'placeholder' => 'Street, Ward, City']) ?>
                    </div>

                    <div class="form-group text-end">
                        <?= Html::submitButton('Register Patient', ['class' => 'btn btn-success px-4']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>

