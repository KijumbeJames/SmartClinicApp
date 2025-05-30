<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $this yii\web\View */
/** @var $model app\models\Doctor */

$this->title = 'Edit Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
                </div>
                <div class="card-body">

                    <?php $form = ActiveForm::begin([
                        'options' => ['class' => 'needs-validation', 'novalidate' => true],
                    ]); ?>

                    <div class="mb-3">
                        <?= $form->field($model, 'full_name')->textInput([
                            'maxlength' => true,
                            'class' => 'form-control',
                            'placeholder' => 'Enter full name'
                        ])->label('Full Name') ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'specialization')->textInput([
                            'maxlength' => true,
                            'class' => 'form-control',
                            'placeholder' => 'Enter specialization'
                        ])->label('Specialization') ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'phone')->textInput([
                            'maxlength' => true,
                            'class' => 'form-control',
                            'placeholder' => 'Enter phone number'
                        ])->label('Phone') ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'address')->textInput([
                            'maxlength' => true,
                            'class' => 'form-control',
                            'placeholder' => 'Enter address'
                        ])->label('Address') ?>
                    </div>

                    <div class="d-grid">
                        <?= Html::submitButton('Save Changes', ['class' => 'btn btn-success btn-lg']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>
    </div>
</div>

