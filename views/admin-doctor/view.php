<?php
use yii\helpers\Html;

$this->title = $model->full_name;
?>

<div class="container mt-4">
    <h1 class="mb-3"><?= Html::encode($this->title) ?></h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>👨‍⚕️ Full Name:</strong> <?= Html::encode($model->full_name) ?></p>
            <p><strong>🔬 Specialization:</strong> <?= Html::encode($model->specialization) ?></p>
            <p><strong>📞 Phone:</strong> <?= Html::encode($model->phone) ?></p>
            <p><strong>👤 Username:</strong> <?= Html::encode($model->user->username) ?></p>
            <p><strong>🕒 Created At:</strong> <?= Html::encode($model->created_at) ?></p>

            <div class="mt-3">
                <?= Html::a('✏️ Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
                <?= Html::a('🗑 Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data-method' => 'post',
                    'data-confirm' => 'Are you sure you want to delete this doctor?',
                ]) ?>
            </div>
        </div>
    </div>
</div>

