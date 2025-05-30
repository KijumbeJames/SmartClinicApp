<?php

use yii\helpers\Html;

$this->title = 'Update Prescription: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prescriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="prescription-update container mt-4">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

