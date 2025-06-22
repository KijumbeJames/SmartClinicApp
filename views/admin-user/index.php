
<?php
use yii\helpers\Html;
?>
<div class="container mt-4">
    <h1 class="mb-4">User & Role Management</h1>
    <p><?= Html::a('➕ Add User', ['create'], ['class' => 'btn btn-success mb-3']) ?></p>
    <div class="card shadow-sm rounded">
        <div class="card-body p-0">
            <table class="table table-striped table-bordered m-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= Html::encode($user->username) ?></td>
                        <td><?= ucfirst($user->role) ?></td>
                        <td><?= Yii::$app->formatter->asDatetime($user->created_at) ?></td>
                        <td>
                            <?= Html::a('👁 View', ['view', 'id' => $user->id], ['class' => 'btn btn-sm btn-info']) ?>
                            <?= Html::a('✏️ Edit', ['update', 'id' => $user->id], ['class' => 'btn btn-sm btn-warning']) ?>
                            <?= Html::a('🗑️ Delete', ['delete', 'id' => $user->id], [
                                'class' => 'btn btn-sm btn-danger',
                                'data' => ['confirm' => 'Delete this user?', 'method' => 'post'],
                            ]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
