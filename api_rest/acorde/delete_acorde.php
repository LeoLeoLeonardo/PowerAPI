<?php

require_once('../../power_model/acorde.php');

if($_SERVER['REQUEST_METHOD'] == 'DELETE'
    && isset($_GET['id'])){
        Acorde::delete_acorde($_GET['id']);
    }