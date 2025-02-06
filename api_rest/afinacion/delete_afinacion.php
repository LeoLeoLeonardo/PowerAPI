<?php

require_once('../../power_model/afinacion.php');

if($_SERVER['REQUEST_METHOD'] == 'DELETE'
    && isset($_GET['id'])){
        Afinacion::delete_afinacion($_GET['id']);
    }