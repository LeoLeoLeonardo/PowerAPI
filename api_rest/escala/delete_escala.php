<?php

require_once('../../power_model/escala.php');

if($_SERVER['REQUEST_METHOD'] == 'DELETE'
    && isset($_GET['id'])){
        Escala::delete_escala($_GET['id']);
    }