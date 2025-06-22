<?php
use yii\helpers\Html;

$this->title = 'Add New Doctor';
?>
<div class="container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model, 'user' => $user]) ?>
</div>

