// --- views/admin-queue/index.php ---
<?php
use yii\helpers\Html;
?>
<div class="container mt-4">
    <h1 class="mb-4">Queue Management</h1>
    <p><?= Html::a('➕ Add to Queue', ['create'], ['class' => 'btn btn-success mb-3']) ?></p>
    <div class="card shadow-sm rounded">
        <div class="card-body p-0">
            <table class="table table-striped table-bordered m-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Joined At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($queues as $q): ?>
                    <tr>
                        <td><?= $q->id ?></td>
                        <td><?= Html::encode($q->appointment->patient->full_name) ?></td>
                        <td><?= Html::encode($q->appointment->doctor->full_name) ?></td>
                        <td><?= $q->position ?></td>
                        <td><?= ucfirst($q->status) ?></td>
                        <td><?= Yii::$app->formatter->asDatetime($q->created_at) ?></td>
                        <td>
                            <?= Html::a('👁 View', ['view', 'id' => $q->id], ['class' => 'btn btn-sm btn-info']) ?>
                            <?= Html::a('✏️ Edit', ['update', 'id' => $q->id], ['class' => 'btn btn-sm btn-warning']) ?>
                            <?= Html::a('🗑️ Delete', ['delete', 'id' => $q->id], [
                                'class' => 'btn btn-sm btn-danger',
                                'data' => ['confirm' => 'Are you sure?', 'method' => 'post'],
                            ]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
