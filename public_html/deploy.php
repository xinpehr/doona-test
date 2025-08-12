<?php
$secret = 'b734dbe5b0a0ffsdas414e91325wqiwuhoiwqh2121d943b97ec1dc07';

// تأیید امضای گیت‌هاب
$payload = file_get_contents('php://input');
$headers = getallheaders();
$signature = 'sha256=' . hash_hmac('sha256', $payload, $secret, false);

if (!isset($headers['X-Hub-Signature-256']) || !hash_equals($headers['X-Hub-Signature-256'], $signature)) {
    http_response_code(403);
    echo "Invalid signature.";
    exit;
}

// خواندن توکن از فایل مخفی
$env_path = '/home/appcloud/.env.git';
$env = parse_ini_file($env_path);
$token = $env['GITHUB_TOKEN'];
$username = 'xinpehr';

// ساخت آدرس ریموت با توکن
$remote_url = "https://$username:$token@github.com/xinpehr/doona-test.git";

// تنظیم ریموت گیت با توکن
$set_remote = shell_exec("cd /home/appcloud && git remote set-url origin $remote_url");

// pull کردن
$output = shell_exec("cd /home/appcloud && git pull origin main 2>&1");
echo "<pre>$output</pre>";
?>