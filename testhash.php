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

