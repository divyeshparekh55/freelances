<?php 

require './vendor/autoload.php';
include_once '../config/config.php';

session_start();
header('Access-Control-Allow-Origin: *');

$message = [];

if(isset($_GET) && $_GET['ids']) {
    $pageLayout = array(800, 800);
    $pdf = new TCPDF('p', 'pt', $pageLayout, true, 'UTF-8', false);
    $pdf->setTitle('Gajanan');

    $images = explode(",",$_GET['ids']);
    $user_id = $_SESSION['user_id'];
    // pre pdf
    $pref = $db->select('prefix_images',['*'],['user_id'=>$user_id])->results();

    foreach ($pref as $key => $value) {
        $pdf->AddPage();
        $pdf->Image('./'.$value['img_location'], $x = '0', $y = '0', $w = 800, $h = 650);
    }

    $content = $db->pdoQuery('select * from upload_image where id IN('.$_GET['ids'].')')->results();
    
    foreach ($content as $key => $value) {
        $pdf->AddPage();
        $pdf->Image('./'.$value['img_path'], $x = '0', $y = '0', $w = 800, $h = 650);
    }

 
    $post = $db->select('postfix_images',['*'],['user_id'=>$user_id])->results();
    foreach ($post as $key => $value) {
        $pdf->AddPage();
        $pdf->Image('./'.$value['img_location'], $x = '0', $y = '0', $w = 800, $h = 650);
    }

    $pdf->Output('gajanan.pdf','I');
} else {
    array_push($message,['status'=> 'Error','message'=> 'In Correct Data']);
}


?>