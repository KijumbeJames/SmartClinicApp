
<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="container mt-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Queue Details</h4>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [ 'label' => 'Patient', 'value' => $model->appointment->patient->full_name ],
                    [ 'label' => 'Doctor', 'value' => $model->appointment->doctor->full_name ],
                    'position',
                    [ 'label' => 'Status', 'value' => ucfirst($model->status) ],
                    [ 'label' => 'Joined At', 'value' => Yii::$app->formatter->asDatetime($model->created_at) ],
                    [ 'label' => 'Estimated Wait (mins)', 'value' => $model->estimated_wait ],
                    'notes:ntext',
                ],
            ]) ?>

            <div class="mt-3">
                <?= Html::a('⏪ Back', ['index'], ['class' => 'btn btn-secondary']) ?>
                <?= Html::a('✏️ Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-warning ms-2']) ?>
                <?= Html::a('🗑️ Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger ms-2',
                    'data' => ['confirm' => 'Delete this entry?', 'method' => 'post'],
                ]) ?>
            </div>
        </div>
    </div>
</div>

