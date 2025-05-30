<?php

use yii\helpers\Html;

$this->title = 'Queue Status';
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Your Current Queue Status</h4>
        </div>
        <div class="card-body">
            <?php if (!$queue): ?>
                <div class="alert alert-warning">You are not in the queue yet.</div>
            <?php else: ?>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Status:</strong> <?= Html::encode($queue->status) ?></li>
                    <li class="list-group-item"><strong>Doctor ID:</strong> <?= Html::encode($queue->doctor_id) ?></li>
                    <li class="list-group-item"><strong>Joined At:</strong> <?= Yii::$app->formatter->asDatetime($queue->joined_at) ?></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>

