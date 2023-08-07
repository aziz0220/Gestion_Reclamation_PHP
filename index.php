<?php

require_once 'controller/bank_controller.php';
use GestionReclam\Bank_controller;

$bankController = new Bank_controller();
$bankController->BankSettingsAction();
