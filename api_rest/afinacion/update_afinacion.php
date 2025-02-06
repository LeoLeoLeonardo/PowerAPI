<?php

require_once('../../power_model/afinacion.php');

if($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['id'])
    && isset($_GET['nombre']) && isset($_GET['cuerda_6']) && isset($_GET['cuerda_5']) && isset($_GET['cuerda_4']) && isset($_GET['cuerda_3']) 
    && isset($_GET['cuerda_2']) && isset($_GET['cuerda_1']) ){
        Afinacion::update_afinacion($_GET['id'], $_GET['nombre'], $_GET['cuerda_6'], $_GET['cuerda_5'], $_GET['cuerda_4'], 
        $_GET['cuerda_3'], $_GET['cuerda_2'], $_GET['cuerda_1'] );
    }