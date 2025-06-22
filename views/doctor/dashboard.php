<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Doctor Dashboard';
?>

<div class="container mt-5" style="max-width: 900px;">
    <h1 class="mb-5 text-center text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">

        <!-- Today's Appointments -->
        <div class="col-md-6">
            <div class="card border-primary shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">📅 Today's Appointments</h4>
                    <p class="card-text text-muted mb-4">See all patient appointments scheduled for today.</p>
                    <?= Html::a('View Appointments', Url::toRoute(['doctor/today-appointments']), ['class' => 'btn btn-primary btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- Manage Prescriptions -->
        <div class="col-md-6">
            <div class="card border-success shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">💊 Manage Prescriptions</h4>
                    <p class="card-text text-muted mb-4">Create and manage patient prescriptions with ease.</p>
                    <?= Html::a('Prescriptions', Url::toRoute(['prescription/index']), ['class' => 'btn btn-success btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- View Patient Queue -->
        <div class="col-md-6">
            <div class="card border-info shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">📊 Patient Queue</h4>
                    <p class="card-text text-muted mb-4">Monitor and handle today’s live queue of patients.</p>
                    <?= Html::a('View Queue', Url::toRoute(['doctor/queue']), ['class' => 'btn btn-info btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- Profile Settings -->
        <div class="col-md-6">
            <div class="card border-secondary shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">👤 Profile Settings</h4>
                    <p class="card-text text-muted mb-4">Update your profile and contact information anytime.</p>
                    <?= Html::a('Edit Profile', Url::toRoute(['doctor/edit-profile']), ['class' => 'btn btn-secondary btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
.hover-scale:hover {
    transform: scale(1.03);
    transition: transform 0.3s ease;
}
.card {
    border-radius: 15px;
}
</style>

