<?php

require_once('../../power_model/afinacion.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
        Afinacion::get_all_afinacion();
    }