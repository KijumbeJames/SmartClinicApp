<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Appointment[] $appointments */

$this->title = "Today's Patient Queue";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container mt-4">
    <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>

    <?php if (empty($appointments)): ?>
        <div class="alert alert-info">You have no patients in the queue for today.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $index => $appointment): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= Html::encode($appointment->patient->full_name ?? 'Unknown') ?></td>
                            <td><?= Html::encode(date('H:i', strtotime($appointment->appointment_time))) ?></td>
                            <td>
                                <span class="badge bg-warning text-dark"><?= ucfirst($appointment->status) ?></span>
                            </td>
                            <td>
                                <?= Html::a('Mark Attended', ['appointment/mark', 'id' => $appointment->id, 'status' => 'attended'], [
                                    'class' => 'btn btn-success btn-sm',
                                    'data-method' => 'post',
                                    'data-confirm' => 'Mark this patient as attended?'
                                ]) ?>
                                <?= Html::a('Mark Missed', ['appointment/mark', 'id' => $appointment->id, 'status' => 'missed'], [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data-method' => 'post',
                                    'data-confirm' => 'Mark this patient as missed?'
                                ]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

