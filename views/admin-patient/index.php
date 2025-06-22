<?php
use yii\helpers\Html;

/** @var $patients app\models\Patient[] */

$this->title = 'Manage Patients';
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::a('➕ Add Patient', ['create'], ['class' => 'btn btn-success']) ?></p>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Phone</th>
            <th>Address</th>
            <th>User</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?= $patient->id ?></td>
                <td><?= Html::encode($patient->full_name) ?></td>
                <td><?= ucfirst($patient->gender) ?></td>
                <td><?= $patient->date_of_birth ?></td>
                <td><?= $patient->phone ?></td>
                <td><?= Html::encode($patient->address) ?></td>
                <td><?= $patient->user ? Html::encode($patient->user->username) : 'N/A' ?></td>
                <td>
                    <?= Html::a('👁 View', ['view', 'id' => $patient->id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= Html::a('✏️ Edit', ['update', 'id' => $patient->id], ['class' => 'btn btn-sm btn-warning']) ?>
                    <?= Html::a('🗑 Delete', ['delete', 'id' => $patient->id], [
                        'class' => 'btn btn-sm btn-danger',
                        'data' => ['confirm' => 'Sure to delete this patient?', 'method' => 'post'],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

