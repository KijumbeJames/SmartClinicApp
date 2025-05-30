<?php

use yii\helpers\Html;

$this->title = 'My Prescriptions';
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">My Prescriptions</h4>
        </div>
        <div class="card-body">
            <?php if (empty($prescriptions)): ?>
                <div class="alert alert-info">No prescriptions found.</div>
            <?php else: ?>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Medication</th>
                            <th>Notes</th>
                            <th>Issued On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prescriptions as $index => $prescription): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= Html::encode($prescription->medication) ?></td>
                                <td><?= Html::encode($prescription->notes) ?></td>
                                <td><?= Yii::$app->formatter->asDate($prescription->created_at) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

