<?php

require_once('../../power_model/escala.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
        Escala::get_all_escala();
    }