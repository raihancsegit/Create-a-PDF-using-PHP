
<?php 
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4'
]);

$stylesheet = file_get_contents('style.css');

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
//$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

// echo $first_name;
// echo $last_name;

$data = '';

//$data .= "<h1>form</h1>";

$data .= "<div class='cv-content-wrappe'>
<div class='cv-header'>
    <h5>Resume</h5>
</div>
<div class='cv-body'>
    <p>".$first_name."</p>
    <p>".$last_name."</p>
</div>
</div>";

$mpdf->WriteHTML($data);

$mpdf->Output('mycv.pdf', 'D');
?>