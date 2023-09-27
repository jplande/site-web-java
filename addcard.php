<?php

session_start();
require_once('class/Card.php');
Card::addToCard($_POST['idcli'],$_POST['idpro']);