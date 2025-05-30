<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Prescription #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prescriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="prescription-view container mt-4">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this prescription?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => ['class' => 'table table-striped table-bordered'],
        'attributes' => [
            'id',
            'appointment_id',
            'medication',
            'dosage',
            'duration',
            'notes:ntext',
            'created_at:datetime',
        ],
    ]) ?>

</div>

