<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Edit Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-4">
    <h2><?= Html::encode($this->title) ?></h2>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation', 'novalidate' => true],
    ]); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'specialization')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => 'form-control', 'type' => 'tel']) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('Update Profile', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>
// Bootstrap 5 validation example
(() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})();
</script>

