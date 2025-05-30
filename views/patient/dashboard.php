<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Patient Dashboard';
?>

<div class="container mt-4">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">

        <!-- Book Appointment -->
        <div class="col-md-4">
            <div class="card border-primary shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">📅 Book Appointment</h5>
                    <p class="card-text">Schedule a new visit with a doctor.</p>
                    <?= Html::a('Book Now', Url::toRoute(['/appointment/book']), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>

        <!-- View Upcoming Appointments -->
        <div class="col-md-4">
            <div class="card border-info shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">📆 Upcoming Appointments</h5>
                    <p class="card-text">Check your scheduled visits.</p>
                    <?= Html::a('View Appointments', Url::toRoute(['/appointment/mine']), ['class' => 'btn btn-info']) ?>
                </div>
            </div>
        </div>

        <!-- View Prescriptions -->
        <div class="col-md-4">
            <div class="card border-success shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">💊 Medical History</h5>
                    <p class="card-text">Access your medical prescriptions.</p>
                    <?= Html::a('View Prescriptions', Url::toRoute(['/prescription/mine']), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

        <!-- Join Queue -->
        <div class="col-md-4">
            <div class="card border-warning shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">🧍‍♂️ Join Today's Queue</h5>
                    <p class="card-text">Check in and join the queue if you have a visit today.</p>
                    <?= Html::a('Join Queue', Url::toRoute(['/queue/join']), ['class' => 'btn btn-warning']) ?>
                </div>
            </div>
        </div>

        <!-- Profile Settings -->
        <div class="col-md-4">
            <div class="card border-secondary shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">👤 Profile</h5>
                    <p class="card-text">Update your personal information.</p>
                    <?= Html::a('Edit Profile', Url::toRoute(['/profile/edit']), ['class' => 'btn btn-secondary']) ?>
                </div>
            </div>
        </div>

    </div>
</div>

