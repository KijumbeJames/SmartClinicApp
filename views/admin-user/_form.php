
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container mt-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-secondary text-white"><h4><?= $model->isNewRecord ? 'Add User' : 'Update User' ?></h4></div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            <?php if ($model->isNewRecord): ?>
                <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true, 'class' => 'form-control']) ?>
            <?php endif; ?>
            <?= $form->field($model, 'role')->dropDownList($roles, ['prompt' => 'Select Role', 'class'=>'form-select']) ?>
            <div class="form-group mt-3">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
