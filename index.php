
<?php
require('controller/classController.php');

$control = new controller();
if (isset($_GET['action'])) {
    //Front End
    if ($_GET['action'] == 'mentionLegale') {

        $control->mentionLegale();

    }
    //BAck End


    if ($_GET['action'] == 'adminAccueil') {

        $control->adminAccueil();

    }

    if ($_GET['action'] == 'login') {

        $control->login();

    }

    if ($_GET['action'] == 'actionLogin') {

        $control->connexion();

    }
    
    if ($_GET['action'] == 'switchMpd') {

        $control->switchMpd();

    }

    if ($_GET['action'] == 'actionSwitchPass') {

        $control->actionSwitchMPD();

    }


}

else {

    $control->index();

}



?>