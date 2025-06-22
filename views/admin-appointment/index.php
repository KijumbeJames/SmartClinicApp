<?php
use yii\helpers\Html;

$this->title = 'Manage Appointments';
?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><?= Html::encode($this->title) ?></h4>
        <?= Html::a('➕ New Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card shadow rounded">
        <div class="card-body p-0">
            <table class="table table-striped table-bordered m-0">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= $appointment->id ?></td>
                            <td><?= $appointment->patient->full_name ?? 'N/A' ?></td>
                            <td><?= $appointment->doctor->full_name ?? 'N/A' ?></td>
                            <td><?= $appointment->appointment_date ?></td>
                            <td><?= $appointment->appointment_time ?></td>
                            <td><?= ucfirst($appointment->status) ?></td>
                            <td>
                                <?= Html::a('👁', ['view', 'id' => $appointment->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= Html::a('✏️', ['update', 'id' => $appointment->id], ['class' => 'btn btn-sm btn-warning']) ?>
                                <?= Html::a('🗑️', ['delete', 'id' => $appointment->id], [
                                    'class' => 'btn btn-sm btn-danger',
                                    'data' => ['confirm' => 'Delete this appointment?'],
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

