<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vetting/include/model.php';

date_default_timezone_set('America/Bogota');
$MODEL = new modelo();
$datos = $MODEL->ListActive();


foreach ($datos as $dt) {


    $id_chat = $dt['EmpreTokTel'];
    $nombre = $dt['empreNom'];
    $PreDict = $dt['EmpreNit'];
    $pack = $dt['EmpreTok'];
    $msm = 'Esto es una prueba';
    $mensaje = "Hola {$nombre}, esto es una notificación de vetting. Apareces en el mapa interactivo y estás disponible para atender una urgencia. Si es así, puedes hacer caso omiso de este mensaje. Si no lo es, te invitamos a desactivar el botón de emergencia ingresando al siguiente enlace: \n\n ";
    $mensaje .= "<a href='http://localhost/vetting/empresa.php?PreDict={$PreDict}&pack={$pack}'>http://localhost/vetting/empresa.php?PreDict={$PreDict}&pack={$pack}</a>";

    echo $mensaje;;

    $token = '7556995921:AAGH-w7liD29ToKWgctZWzMLs-pKbraSWD4';
    // 5740362012
    telegram($mensaje, $token, $id_chat);
}


function telegram($mensaje, $token, $id_chat)
{
    //$token='1883208152:AAH00wCVXxSLTc5oLL0wY-_dEJ5YmsF0iwA';
    //$id_chat='-1001582243019';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('chat_id' => $id_chat, 'parse_mode' => 'HTML', 'text' => $mensaje),
    ));
    $response = curl_exec($curl);
    print_r($response);
    curl_close($curl);
    $data = json_decode($response);
    if ($data->ok == 1) {
        echo 'Mensaje enviado';
        echo '<br>Id de mensaje: ' . $data->result->message_id;
        echo '<br>Usuario: ' . $data->result->from->username;
        echo '<br>Msg: ' . $data->result->text;
        echo '<br>Fecha y Hora: ' . gmdate("Y-m-d", $data->result->date) . ' ' . date('h:i:s');
    } else {
        echo 'No se pudo enviar el mensaje';
    }
}
