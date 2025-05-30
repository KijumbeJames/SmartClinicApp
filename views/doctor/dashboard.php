<?php

use yii\helpers\Html;

$this->title = 'Doctor Dashboard';
?>

<div class="container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">

        <!-- Today's Appointments -->
        <div class="col-md-4">
            <div class="card border-primary shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">📅 Today's Appointments</h5>
                    <p class="card-text">View all your appointments for today.</p>
                    <?= Html::a('View Appointments', ['doctor/today-appointments'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>

        <!-- Manage Prescriptions -->
        <div class="col-md-4">
            <div class="card border-success shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">💊 Manage Prescriptions</h5>
                    <p class="card-text">Create, view, and update prescriptions.</p>
                    <?= Html::a('Prescriptions', ['prescription/index'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

        <!-- View Queue -->
        <div class="col-md-4">
            <div class="card border-info shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">📊 View Patient Queue</h5>
                    <p class="card-text">Manage your patient queue efficiently.</p>
                    <?= Html::a('View Queue', ['doctor/queue'], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
        </div>

        <!-- Profile Settings -->
        <div class="col-md-4">
            <div class="card border-secondary shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">👤 Profile Settings</h5>
                    <p class="card-text">Update your personal information.</p>
                    <?= Html::a('Edit Profile', ['doctor/edit-profile'], ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>

    </div>
</div>

