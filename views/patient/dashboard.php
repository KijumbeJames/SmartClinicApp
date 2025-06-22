<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Patient Dashboard';
?>

<div class="container mt-5" style="max-width: 900px;">
    <h1 class="mb-5 text-center text-primary fw-bold"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">

        <!-- Book Appointment -->
        <div class="col-md-6">
            <div class="card border-primary shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">📅 Book Appointment</h4>
                    <p class="card-text text-muted mb-4">Easily schedule your next doctor visit at a convenient time.</p>
                    <?= Html::a('Book Now', Url::toRoute(['/appointment/book']), ['class' => 'btn btn-primary btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- View Upcoming Appointments -->
        <div class="col-md-6">
            <div class="card border-info shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">📆 Upcoming Appointments</h4>
                    <p class="card-text text-muted mb-4">View your scheduled appointments and stay on track.</p>
                    <?= Html::a('View Appointments', Url::toRoute(['/appointment/mine']), ['class' => 'btn btn-info btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- View Prescriptions -->
        <div class="col-md-6">
            <div class="card border-success shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">💊 Medical History</h4>
                    <p class="card-text text-muted mb-4">Access your prescriptions and medical records securely anytime.</p>
                    <?= Html::a('View Prescriptions', Url::toRoute(['/prescription/mine']), ['class' => 'btn btn-success btn-lg px-5 align-self-start']) ?>
                </div>
            </div>
        </div>

        <!-- Profile Settings -->
        <div class="col-md-6">
            <div class="card border-secondary shadow-sm hover-scale" style="min-height: 180px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h4 class="card-title mb-3">👤 Profile</h4>
                    <p class="card-text text-muted mb-4">Update your personal details to keep your profile up to date.</p>
                    <?= Html::a('Edit Profile', Url::toRoute(['/profile/edit']), ['class' => 'btn btn-secondary btn-lg px-5 align-self-start']) ?>
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

