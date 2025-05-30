<?php
$this->title = 'SmartClinic - Home';
?>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Welcome to SmartClinic</h1>
        <p class="lead text-muted">SmartClinic is your intelligent solution for managing clinic operations, appointments, patients, doctors, and queues efficiently.</p>
        <a href="<?= \yii\helpers\Url::to(['site/login']) ?>" class="btn btn-lg btn-primary mt-3">Login Now</a>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">👨‍⚕️ Doctors</h5>
                    <p class="card-text">View appointments, diagnose patients, update medical records and manage your profile seamlessly.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">🧑‍💼 Admins</h5>
                    <p class="card-text">Manage doctors, patients, appointments, queues, and oversee all operations from a central dashboard.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title">🙋 Patients</h5>
                    <p class="card-text">Book appointments, view medical records, and track your visit history all in one place.</p>
                </div>
            </div>
        </div>
    </div>
</div>

