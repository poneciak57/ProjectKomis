<?php
    require_once "../../Classes/form-options.controller.php";
    $OptC = new OptionsController();

    $OptC->Models($_GET['ID']);
?>