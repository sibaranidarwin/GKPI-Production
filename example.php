<?php
    $pass = "itdel1234";
    
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    echo($hash);