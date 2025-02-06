<?php

require_once('../../power_model/acorde.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
        Acorde::get_all_acorde();
    }