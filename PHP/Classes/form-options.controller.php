<?php
require_once "form-options.class.php";
require_once "Structs/option.struct.php";

class OptionsController extends Options
{

    public function Models(int $brand_id, bool $pack = false): array | null
    {
        return $pack ? $this->pack($this->getOptions('model', 'model')) : $this->display($this->getOptions('model', 'model', " WHERE ID_marka = $brand_id "));
    }
    public function Brands(bool $pack = false): array | null
    {
        $options = $this->getOptions('marka', 'marka');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    public function Fuels(bool $pack = false): array | null
    {
        $options = $this->getOptions('typ_paliwa', 'paliwo');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    public function Gearboxes(bool $pack = false): array | null
    {
        $options = $this->getOptions('skrzynia', 'skrzynia_biegow');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    public function Countries(bool $pack = false): array | null
    {
        $options = $this->getOptions('kraj_pochodzenia', 'kraj_pochodzenia');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    public function Colors(bool $pack = false): array | null
    {
        $options = $this->getOptions('kolor', 'kolor');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    public function Crashes(bool $pack = false): array | null
    {
        $options = $this->getOptions('wypadkowosc', 'wypadkowosc');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    public function Year(bool $pack = false): array | null
    {
        $options = $this->getOptions('rok_produkcji', 'rok_produkcji');
        return $pack ? $this->pack($options) : $this->display($options);
    }
    private function display(array $options)
    {
        foreach ($options as $value) {
            echo $value->display();
        }
    }

    private function pack(array $options): array
    {
        $packet = [];
        foreach ($options as $value) {
            $value->pack($packet);
        }
        return $packet;
    }
}
