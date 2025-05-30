<?php

use yii\helpers\Html;

$this->title = 'Admin Dashboard';
?>

<div class="container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-primary shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">👨‍⚕️ Manage Doctors</h5>
                    <p class="card-text">Add, view, and manage doctor profiles.</p>
                    <?= Html::a('Go to Doctors', ['doctor/index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-success shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">🧑‍🤝‍🧑 Manage Patients</h5>
                    <p class="card-text">View, register, and manage patient info.</p>
                    <?= Html::a('Go to Patients', ['patient/index'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-warning shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">📅 Appointments</h5>
                    <p class="card-text">Handle scheduled appointments.</p>
                    <?= Html::a('View Appointments', ['appointment/index'], ['class' => 'btn btn-warning']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-info shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">📋 Queue Management</h5>
                    <p class="card-text">Manage clinic visit queues.</p>
                    <?= Html::a('Manage Queue', ['queue/index'], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-dark shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">🏥 Medical Records</h5>
                    <p class="card-text">Access patient medical histories.</p>
                    <?= Html::a('View Records', ['record/index'], ['class' => 'btn btn-dark']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-danger shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">👤 User & Role Management</h5>
                    <p class="card-text">Assign roles and manage users.</p>
                    <?= Html::a('Manage Users', ['user/index'], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

