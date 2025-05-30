<?php

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?> | SmartClinic</title>
    <?php $this->head() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SmartClinic</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?= Nav::widget([
          'options' => ['class' => 'navbar-nav ms-auto'],
          'items' => Yii::$app->user->isGuest ? [
              ['label' => 'Login', 'url' => ['/site/login']],
              ['label' => 'Register', 'url' => ['/site/register']],
          ] : [
              ['label' => 'Dashboard', 'url' => ['/dashboard/index']],
              '<li>' . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline']) .
                  Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link text-light logout']) .
                  Html::endForm() . '</li>'
          ],
      ]) ?>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs'] ?? []]) ?>
    <?= $content ?>
</div>

<footer class="footer bg-light text-center py-3 mt-4">
    <div class="container">
        <span class="text-muted">© SmartClinic <?= date('Y') ?></span>
    </div>
</footer>

<?php $this->endBody() ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>

