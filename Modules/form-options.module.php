<?php
require_once  __DIR__ . "/../PHP/Classes/form-options.controller.php";
$OptC = new OptionsController();
?>

<form>
    <select name="models">
        <option value=null class="option-all">wszystkie</option>
        <?php // TUTAJ TRZEBA ID MIEC MARKI NIE DO KONCA WIEM JAK TO CHCEMY ROBIC // 
        ?>
    </select>
    <select name="brands">
        <option value=null class="option-all">wszystkie</option>
        <?php $OptC->Brands(); ?>
    </select>
    <select name="fuels">
        <option value=null class="option-all">wszystkie</option>
        <?php $OptC->Fuels(); ?>
    </select>
    <select name="gearboxes">
        <option value=null class="option-all">wszystkie</option>
        <?php $OptC->Gearboxes(); ?>
    </select>
    <select name="countries">
        <option value=null class="option-all">wszystkie</option>
        <?php $OptC->Countries(); ?>
    </select>
    <select name="colors">
        <option value=null class="option-all">wszystkie</option>
        <?php $OptC->Colors(); ?>
    </select>
</form>