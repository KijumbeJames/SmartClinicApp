<?php
use yii\helpers\Html;

$this->title = 'Manage Doctors';
?>

<div class="container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('➕ Add New Doctor', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Specialization</th>
                    <th>Phone</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?= $doctor->id ?></td>
                    <td><?= Html::encode($doctor->full_name) ?></td>
                    <td><?= Html::encode($doctor->specialization) ?></td>
                    <td><?= Html::encode($doctor->phone) ?></td>
                    <td><?= Html::encode($doctor->user->username) ?></td>
                    <td>
                        <?= Html::a('👁 View', ['view', 'id' => $doctor->id], ['class' => 'btn btn-outline-info btn-sm']) ?>
                        <?= Html::a('✏️ Edit', ['update', 'id' => $doctor->id], ['class' => 'btn btn-outline-warning btn-sm']) ?>
                        <?= Html::a('🗑 Delete', ['delete', 'id' => $doctor->id], [
                            'class' => 'btn btn-outline-danger btn-sm',
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure you want to delete this doctor?',
                        ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

