<?php
require_once "form-options.class.php";
require_once "Structs/option.struct.php";

class OptionsController extends Options
{
    private $offer;
    public function __construct(private $offerID = null)
    {
        $this->offer = $offerID ? $this->getOffer($offerID) : null;                          
    }
    public function Models(int $brand_id, bool $pack = false): array | null
    {
        return $pack ? $this->pack($this->getOptions('model', 'model')) : $this->display($this->getOptions('model', 'model', " WHERE ID_marka = $brand_id "),$this->offer["model_id"]);
    }
    public function Brands(bool $pack = false): array | null
    {
        $options = $this->getOptions('marka', 'marka');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["marka_id"]);
    }
    public function Fuels(bool $pack = false): array | null
    {
        $options = $this->getOptions('typ_paliwa', 'paliwo');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["paliwo_id"]);
    }
    public function Gearboxes(bool $pack = false): array | null
    {
        $options = $this->getOptions('skrzynia', 'skrzynia_biegow');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["skrzynia_id"]);
    }
    public function Countries(bool $pack = false): array | null
    {
        $options = $this->getOptions('kraj_pochodzenia', 'kraj_pochodzenia');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["kraj_pochodzenia_id"]);
    }
    public function Colors(bool $pack = false): array | null
    {
        $options = $this->getOptions('kolor', 'kolor');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["kolor_id"]);
    }
    public function Crashes(bool $pack = false): array | null
    {
        $options = $this->getOptions('wypadkowosc', 'wypadkowosc');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["wypadkowosc_id"]);
    }
    public function Year(bool $pack = false): array | null
    {
        $options = $this->getOptions('rok_produkcji', 'rok_produkcji');
        return $pack ? $this->pack($options) : $this->display($options,$this->offer["rok_prudukcji_id"]);
    }
    private function display(array $options,$ID)
    {
        foreach ($options as $value) {
            echo $value->display($ID);
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
