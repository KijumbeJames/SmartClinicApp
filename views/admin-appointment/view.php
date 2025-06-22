<?php
use yii\helpers\Html;

$this->title = 'Appointment Details';
?>
<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Doctor</th><td><?= $model->doctor->full_name ?? 'N/A' ?></td></tr>
                <tr><th>Patient</th><td><?= $model->patient->full_name ?? 'N/A' ?></td></tr>
                <tr><th>Date</th><td><?= $model->appointment_date ?></td></tr>
                <tr><th>Time</th><td><?= $model->appointment_time ?></td></tr>
                <tr><th>Status</th><td><?= ucfirst($model->status) ?></td></tr>
                <tr><th>Created</th><td><?= $model->created_at ?></td></tr>
            </table>

            <div class="mt-3">
                <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-warning me-2']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger me-2',
                    'data' => ['confirm' => 'Are you sure?'],
                ]) ?>
                <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>
    </div>
</div>

