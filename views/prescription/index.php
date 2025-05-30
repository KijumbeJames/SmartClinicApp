<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Appointment[] $appointments */

$this->title = 'My Prescriptions';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="prescription-index container mt-4">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <?php if (!empty($appointments)): ?>
        <div class="mb-4">
            <h5 class="mb-2">Create Prescription for an Appointment</h5>
            <?php foreach ($appointments as $appointment): ?>
                <p>
                    <?= Html::a(
                        'Create Prescription for Appointment #' . $appointment->id,
                        ['create', 'appointment_id' => $appointment->id],
                        ['class' => 'btn btn-success btn-sm']
                    ) ?>
                </p>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="alert alert-warning">No appointments available to create prescriptions.</p>
    <?php endif; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'appointment_id',
                'label' => 'Appointment',
            ],
            'medication',
            'dosage',
            'duration',
            [
                'attribute' => 'notes',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:Y-m-d H:i'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header' => 'Actions',
                'contentOptions' => ['class' => 'text-nowrap'],
            ],
        ],
    ]); ?>

</div>

