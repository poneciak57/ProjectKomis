<?php
    require_once "../../Classes/form-options.controller.php";
    $OptC = new OptionsController();

    $filters = [];
    $filters["marka"] = $OptC->Brands(true);
    $filters["model"] = $OptC->Models(1, true);
    $filters["paliwo_id"] = $OptC->Fuels(true);
    $filters["skrzynia_id"] = $OptC->Gearboxes(true);
    $filters["kraj_pochodzenia_id"] = $OptC->Countries(true);
    $filters["kolor_id"] = $OptC->Colors(true);
    $filters["wypadkowosc_id"] = $OptC->Crashes(true);
    echo json_encode($filters);
?>