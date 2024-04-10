<?php
for ($i = 0; $i < $total; $i++) {
    imprimirRegistro();
}

function imprimirRegistro()
{
    $rows = oci_fetch_array($rss, OCI_NUM);
    $empl_num = $rows[0];
    $nombre = $rows[1];
    $apaterno = $rows[2];
    $amaterno = $rows[3];
    $fecha = $rows[4];
    $hora = $rows[5];
    $horario = $rows[6];

    $empl_num = normalizar($empl_num);
    $nombre = normalizar($nombre);
    $apaterno = normalizar($apaterno);
    $amaterno = normalizar($amaterno);
    $fecha = normalizar($fecha);

    $trabajo = '14:00:00';

    list($horae, $horas) = calcularHoraTrabajo($hora, $trabajo); 
    
    $horae = str_replace("?", 'Ñ', $horae);
    $horas = str_replace("?", 'Ñ', $horas);
    $horario = str_replace("?", 'Ñ', $horario);

    echo "$empl_num, $nombre, $apaterno, $amaterno, $fecha, $horae, $horas, $horario" . PHP_EOL;
}

function calcularHoraTrabajo($hora, $trabajo) : array{
    if ($hora < $trabajo) {
        $horaentrada = $hora;
        $horae = $horaentrada;
        $horas = '00:00:00';
    } else {
        $horasalida = $hora;
        $horae = '00:00:00';
        $horas = $horasalida;
    }

    return [
        $horae,
        $horas,
    ]; 
}

function normalizar($campo){
    return str_replace("?", 'Ñ', $campo);
}