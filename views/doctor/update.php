<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Doctor Profile';
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container mt-4">
    <h3><?= Html::encode($this->title) ?></h3>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
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
        <?= Html::a('Cancel', ['view', 'id' => $model->id], ['class' => 'btn btn-secondary ms-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script>
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

