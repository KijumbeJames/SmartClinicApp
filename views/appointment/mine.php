<?php
use yii\helpers\Html;

$this->title = 'Upcoming Appointments';
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="card-body">
            <?php if (!empty($appointments)): ?>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $i => $appointment): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td>
                                    <?= Html::encode(
                                        $appointment->doctor
                                            ? $appointment->doctor->full_name . ' – ' . $appointment->doctor->specialization
                                            : 'N/A'
                                    ) ?>
                                </td>
                                <td><?= Html::encode($appointment->appointment_date) ?></td>
                                <td><?= Html::encode($appointment->appointment_time) ?></td>
                                <td><?= Html::encode(ucfirst($appointment->status)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No upcoming appointments found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

