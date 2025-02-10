<?php
require_once('tcpdf/tcpdf.php');

// Database connection
$conn = new mysqli("localhost", "root", "", "attendance");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch attendance data
$sql = "SELECT attendance.attendance_id, student.name, attendance.date, attendance.status 
        FROM attendance 
        JOIN student ON attendance.student_id = student.student_id 
        ORDER BY attendance.date";
$result = $conn->query($sql);

// Create a new PDF document
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Attendance System');
$pdf->SetTitle('Attendance Report');
$pdf->SetHeaderData('', 0, 'Attendance Report', 'Generated on: ' . date('Y-m-d'));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Table header
$html = '<h2>Attendance Report</h2>
        <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Student Name</th><th>Date</th><th>Status</th></tr>';

// Add rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr><td>{$row['attendance_id']}</td><td>{$row['name']}</td><td>{$row['date']}</td><td>{$row['status']}</td></tr>";
    }
} else {
    $html .= "<tr><td colspan='4'>No attendance records found.</td></tr>";
}

$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('attendance_report.pdf', 'D'); // Download PDF

$conn->close();
?>
