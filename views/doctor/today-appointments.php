<?php
use yii\helpers\Html;

$this->title = "Today's Appointments";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-4">
    <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>

    <?php if (empty($appointments)): ?>
        <div class="alert alert-info">You have no appointments today.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $index => $appointment): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= Html::encode($appointment->patient->full_name ?? 'Unknown') ?></td>
                            <td><?= Html::encode($appointment->appointment_time) ?></td>
                            <td>
                                <span class="badge bg-<?= match($appointment->status) {
                                    'pending' => 'warning',
                                    'attended' => 'success',
                                    'missed' => 'danger',
                                    'cancelled' => 'secondary',
                                    default => 'light'
                                } ?>">
                                    <?= ucfirst($appointment->status) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

