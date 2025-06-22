<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Admin Dashboard';
?>

<div class="container mt-5" style="max-width: 1000px;">
    <h1 class="mb-5 text-center text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">

        <!-- Manage Doctors -->
        <div class="col-md-6">
            <div class="card border-primary shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">👨‍⚕️ Manage Doctors</h4>
                    <p class="card-text text-muted mb-4">Add, update, and manage doctor profiles.</p>
                    <?= Html::a('Manage Doctors', Url::toRoute(['admin-doctor/index']), ['class' => 'btn btn-primary btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- Manage Patients -->
        <div class="col-md-6">
            <div class="card border-success shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">🧑‍🤝‍🧑 Manage Patients</h4>
                    <p class="card-text text-muted mb-4">Register and manage patient records.</p>
                    <?= Html::a('Manage Patients', Url::toRoute(['admin-patient/index']), ['class' => 'btn btn-success btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- Manage Appointments -->
        <div class="col-md-6">
            <div class="card border-warning shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">📅 Manage Appointments</h4>
                    <p class="card-text text-muted mb-4">Oversee all scheduled clinic appointments.</p>
                    <?= Html::a('Appointments', Url::toRoute(['admin-appointment/index']), ['class' => 'btn btn-warning btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- Queue Management -->
        <div class="col-md-6">
            <div class="card border-info shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">📋 Queue Management</h4>
                    <p class="card-text text-muted mb-4">Manage the live queue for clinic visits.</p>
                    <?= Html::a('Queue', Url::toRoute(['admin-queue/index']), ['class' => 'btn btn-info btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Centered Row for User Management -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card border-danger shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                    <h4 class="card-title mb-3">👤 User & Role Management</h4>
                    <p class="card-text text-muted mb-4">Control access by assigning roles and managing system users.</p>
                    <?= Html::a('Manage Users', Url::toRoute(['admin-user/index']), ['class' => 'btn btn-danger btn-lg px-5']) ?>
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

