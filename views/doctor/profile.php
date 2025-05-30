<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Edit Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
                </div>

                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <div class="mb-3">
                        <?= $form->field($doctor, 'full_name')->textInput(['class' => 'form-control', 'placeholder' => 'Enter your full name']) ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($doctor, 'specialization')->textInput(['class' => 'form-control', 'placeholder' => 'Enter your specialization']) ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($doctor, 'phone')->textInput(['class' => 'form-control', 'placeholder' => 'Enter phone number']) ?>
                    </div>

                    <div class="d-grid gap-2">
                        <?= Html::submitButton('Save Changes', ['class' => 'btn btn-success btn-lg']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <?= Yii::$app->session->getFlash('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

