<?php

require_once "offers.class.php";

class OffersController extends Offers
{
    private const OFFER_NR = 10;
    private $request;
    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function getStack()
    {
        $stack = $this->Stack($this->request['offer_page'], self::OFFER_NR);
        $ret = array();
        $ret["QuerriesFound"] = $this->CountQuerries();
        $ret["Offers"] = array();
        foreach ($stack as $key => $value) {
            //$value['zdjecie'] = base64_encode($value['zdjecie']);
            $ret["Offers"][$key] = $value;
        }
        return $ret;
    }
    public function getSingle()
    {
    }

    // public function addOffer()
    // {
    // }

    public function deleteOffer()
    {
        $this->delete($this->request["ID"]);
    }

    // public function updateOffer(int $ID)
    // {
    // }
}
