<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../yii';
$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config));

use yii\helpers\Html;

$db = Yii::$app->db;
$users = $db->createCommand('SELECT id, username, password_hash FROM user')->queryAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Password Validation and Hash Regeneration Check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Password Validation and Hash Regeneration Check</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password Valid?</th>
                <th>Old Hash</th>
                <th>New Hash</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): 
                $id = $user['id'];
                $username = $user['username'];
                $storedHash = $user['password_hash'];

                if ($username === 'Kijumbe James') {
                    $plainPassword = 'Kijumbe8904';
                } elseif (preg_match('/doctor10([1-8])/', $username, $matches)) {
                    $num = $matches[1];
                    $plainPassword = 'smartclinicdoctor' . $num;
                } else {
                    continue;
                }

                $isValid = Yii::$app->security->validatePassword($plainPassword, $storedHash);
                $newHash = Yii::$app->security->generatePasswordHash($plainPassword);
            ?>
            <tr>
                <td><?= Html::encode($id) ?></td>
                <td><?= Html::encode($username) ?></td>
                <td>
                    <?php if ($isValid): ?>
                        <span class="badge bg-success">YES ✅</span>
                    <?php else: ?>
                        <span class="badge bg-danger">NO ❌</span>
                    <?php endif; ?>
                </td>
                <td style="word-break: break-all;"><?= Html::encode($storedHash) ?></td>
                <td style="word-break: break-all;"><?= Html::encode($newHash) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../yii';
$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config));

use yii\helpers\Html;

$db = Yii::$app->db;
$users = $db->createCommand('SELECT id, username, password_hash FROM user')->queryAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Password Validation and Hash Regeneration Check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Password Validation and Hash Regeneration Check</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password Valid?</th>
                <th>Old Hash</th>
                <th>New Hash</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): 
                $id = $user['id'];
                $username = $user['username'];
                $storedHash = $user['password_hash'];

                if ($username === 'Kijumbe James') {
                    $plainPassword = 'Kijumbe8904';
                } elseif (preg_match('/doctor10([1-8])/', $username, $matches)) {
                    $num = $matches[1];
                    $plainPassword = 'smartclinicdoctor' . $num;
                } else {
                    // Skip unknown users
                    continue;
                }

                $isValid = Yii::$app->security->validatePassword($plainPassword, $storedHash);
                $newHash = Yii::$app->security->generatePasswordHash($plainPassword);
            ?>
            <tr>
                <td><?= Html::encode($id) ?></td>
                <td><?= Html::encode($username) ?></td>
                <td>
                    <?php if ($isValid): ?>
                        <span class="badge bg-success">YES ✅</span>
                    <?php else: ?>
                        <span class="badge bg-danger">NO ❌</span>
                    <?php endif; ?>
                </td>
                <td style="word-break: break-all;"><?= Html::encode($storedHash) ?></td>
                <td style="word-break: break-all;"><?= Html::encode($newHash) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
// Adjust path to your Yii2 app entry point and autoload accordingly
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/yii';
$config = require __DIR__ . '/config/web.php';

// Create Yii2 application instance (console compatible)
(new yii\web\Application($config));

// Get DB connection
$db = Yii::$app->db;

$users = $db->createCommand('SELECT id, username, password_hash FROM user')->queryAll();

echo "Password Validation and Hash Regeneration Check\n\n";

foreach ($users as $user) {
    $id = $user['id'];
    $username = $user['username'];
    $storedHash = $user['password_hash'];

    // Assign passwords
    if ($username === 'Kijumbe James') {
        $plainPassword = 'Kijumbe8904';
    } elseif (preg_match('/doctor10([1-8])/', $username, $matches)) {
        $num = $matches[1];
        $plainPassword = 'smartclinicdoctor' . $num;
    } else {
        echo "$username: No password known, skipping.\n";
        continue;
    }

    $isValid = Yii::$app->security->validatePassword($plainPassword, $storedHash);
    $newHash = Yii::$app->security->generatePasswordHash($plainPassword);

    echo "$username (ID: $id)\n";
    echo "Password valid: " . ($isValid ? "YES ✅" : "NO ❌") . "\n";
    echo "Old Hash: $storedHash\n";
    echo "New Hash: $newHash\n";

    // Uncomment to update DB if invalid
    /*
    if (!$isValid) {
        $db->createCommand()->update('user', ['password_hash' => $newHash], ['id' => $id])->execute();
        echo "✅ Password hash updated in DB.\n";
    }
    */
    echo "-------------------------\n";
}

