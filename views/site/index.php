<?php
$this->title = 'SmartClinic - Home';
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', ['position' => \yii\web\View::POS_END]);
$script = <<<JS
AOS.init();
JS;
$this->registerJs($script);
?>

<div class="container py-5">
    <!-- Hero Section -->
    <div class="text-center mb-5" data-aos="fade-up">
        <h1 class="display-3 fw-bold text-primary">SmartClinic</h1>
        <p class="lead text-muted">Revolutionizing clinic operations with a smart, centralized system for doctors, patients, and administrators.</p>
    </div>

    <!-- Role Highlights -->
    <div class="row g-4 mb-5">
        <div class="col-md-4" data-aos="fade-right">
            <div class="card hover-card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title">👨‍⚕️ Doctors</h3>
                    <p class="card-text">View schedules, diagnose patients, and manage medical records in real-time.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in">
            <div class="card hover-card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title">🧑‍💼 Admins</h3>
                    <p class="card-text">Manage users, appointments, queues, and reports all from one place.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-left">
            <div class="card hover-card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <h3 class="card-title">🙋 Patients</h3>
                    <p class="card-text">Easily book appointments, track history, and access your health records securely.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="my-5" data-aos="fade-up">
        <h2 class="text-center mb-4">🧠 Smart Features</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="p-4 bg-light border rounded shadow-sm hover-card h-100">
                    <h5>📅 Appointment Scheduling</h5>
                    <p>Book and manage appointments efficiently with reminders and queue tracking.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-light border rounded shadow-sm hover-card h-100">
                    <h5>📋 Queue Management</h5>
                    <p>Minimize waiting time by managing patient queues in real time.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-light border rounded shadow-sm hover-card h-100">
                    <h5>🏥 Medical Records</h5>
                    <p>Centralized access to patient records for authorized staff and doctors.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-light border rounded shadow-sm hover-card h-100">
                    <h5>🔐 Secure User Access</h5>
                    <p>Role-based access ensures data privacy and admin control over all activities.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="my-5" data-aos="fade-up">
        <h2 class="text-center mb-4">🌟 What Users Say</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="border p-4 bg-white shadow-sm rounded text-center hover-card">
                    <p class="mb-3">"As a doctor, I love how easy it is to check appointments and access patient history!"</p>
                    <strong>— Dr. Mussa</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-4 bg-white shadow-sm rounded text-center hover-card">
                    <p class="mb-3">"SmartClinic has transformed the way we run the clinic. It's fast and reliable."</p>
                    <strong>— Admin Jane</strong>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-4 bg-white shadow-sm rounded text-center hover-card">
                    <p class="mb-3">"Booking my appointments and getting updates is now super simple!"</p>
                    <strong>— Patient Asha</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-5" data-aos="zoom-in">
        <h3 class="fw-bold text-primary">Ready to experience smart healthcare?</h3>
        <p class="text-muted">Log in now to manage, connect, and care better — the Smart way!</p>
        <a href="<?= \yii\helpers\Url::to(['site/login']) ?>" class="btn btn-outline-success btn-lg mt-3">Login to SmartClinic</a>
    </div>
</div>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
}
.hover-card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}
</style>

