<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

// Lấy dữ liệu từ form
$username = trim($_POST["username"]);
$reported = trim($_POST["reported"]);
$reason   = trim($_POST["reason"]);

// Kiểm tra dữ liệu rỗng
if (!$username || !$reported || !$reason) {
    echo "<script>alert('❌ Vui lòng điền đầy đủ thông tin!'); window.history.back();</script>";
    exit;
}

// Tạo dữ liệu tố cáo
$report = [
    "user"     => htmlspecialchars($username),  // Người gửi tố cáo
    "reported" => htmlspecialchars($reported),  // Người bị tố cáo
    "reason"   => htmlspecialchars($reason),    // Lý do
    "time"     => date("Y-m-d H:i:s")           // Thời gian
];

// Đường dẫn file JSON
$file = "reports.json";

// Đọc dữ liệu hiện tại (nếu có)
$data = [];
if (file_exists($file)) {
    $json = file_get_contents($file);
    $data = json_decode($json, true) ?: [];
}

// Thêm tố cáo mới
$data[] = $report;

// Lưu lại vào file JSON
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Thông báo thành công
echo "<script>alert('✅ Tố cáo đã được gửi thành công!'); window.location.href='report.html';</script>";
?>
