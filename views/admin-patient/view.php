<?php
use yii\helpers\Html;

/** @var $model app\models\Patient */

$this->title = 'Patient Profile';
?>

<h1><?= Html::encode($model->full_name) ?></h1>

<p>
    <?= Html::a('✏️ Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?= Html::a('🗑 Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => ['confirm' => 'Are you sure you want to delete this patient?', 'method' => 'post'],
    ]) ?>
</p>

<table class="table table-bordered">
    <tr><th>Username</th><td><?= $model->user->username ?></td></tr>
    <tr><th>Full Name</th><td><?= Html::encode($model->full_name) ?></td></tr>
    <tr><th>Gender</th><td><?= ucfirst($model->gender) ?></td></tr>
    <tr><th>Date of Birth</th><td><?= $model->date_of_birth ?></td></tr>
    <tr><th>Phone</th><td><?= $model->phone ?></td></tr>
    <tr><th>Address</th><td><?= Html::encode($model->address) ?></td></tr>
    <tr><th>Created At</th><td><?= $model->created_at ?></td></tr>
</table>

