<?php
require_once "form-options.class.php";
require_once "Structs/option.struct.php";

class OptionsController extends Options
{

    public function Models(int $brand_id): void
    {
    }
    public function Brands(): void
    {
        $this->display($this->getOptions('marka', 'marka'));
    }
    public function Fuels(): void
    {
        $this->display($this->getOptions('typ_paliwa', 'paliwo'));
    }
    public function Gearboxes(): void
    {
        $this->display($this->getOptions('skrzynia', 'skrzynia_biegow'));
    }
    public function Countries(): void
    {
        $this->display($this->getOptions('kraj_pochodzenia', 'kraj_pochodzenia'));
    }
    public function Colors(): void
    {
        $this->display($this->getOptions('kolor', 'kolor'));
    }

    private function display(array $options)
    {
        foreach ($options as $value) {
            echo $value->display();
        }
    }
}
