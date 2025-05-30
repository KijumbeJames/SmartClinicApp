<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Login to SmartClinic</h5>
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="d-grid">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

