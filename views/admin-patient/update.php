<?php
// --- views/admin-patient/update.php ---
use yii\helpers\Html;

$this->title = 'Update Patient';
$this->params['breadcrumbs'][] = ['label' => 'Manage Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>
</div>
