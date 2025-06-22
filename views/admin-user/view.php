<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var $model app\models\User */

$this->title = 'User Details';
$this->params['breadcrumbs'][] = ['label' => 'User & Role Management', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-4">
    <h1><?= Html::encode($model->username) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'role',
            [
                'label' => 'Created At',
                'value' => Yii::$app->formatter->asDatetime($model->created_at),
            ],
        ],
    ]) ?>

    <div class="mt-3">
        <?= Html::a('✏️ Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('🗑️ Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => ['confirm' => 'Delete this user?', 'method' => 'post'],
        ]) ?>
        <?= Html::a('⏪ Back to list', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>
</div>

