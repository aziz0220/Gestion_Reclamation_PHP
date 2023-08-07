<?php
namespace GestionReclam;
require_once 'model/Bank.php';

use GestionReclam\bank;
class Bank_controller
{
    private $bankModel;

    public function __construct()
    {
        $this->bankModel = new Bank();
    }

    public function BankSettingsAction()
    {
        $bank_settings = $this->bankModel->getBankSettings();
        require_once 'views/acceuil.php';
    }

}
