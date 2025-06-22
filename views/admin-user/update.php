<?php
use yii\helpers\Html;

/** @var $model app\models\User */
/** @var $roles array */

$this->title = 'Update User';
$this->params['breadcrumbs'][] = ['label' => 'User & Role Management', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-4">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
    ]) ?>
</div>

