
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
        $stack = $this->Stack($this->request['specs'], $this->request['offer_page'], self::OFFER_NR);
        $ret = array();
        $ret["QuerriesFound"] = $this->CountQuerries();
        $ret["Offers"] = $stack;
        return $ret;
    }
    public function getSingle()
    {
        $single = $this->Single($this->request['ID'], self::OFFER_NR);
        $ret = array();
        if ($single)
            $ret["Offer"] = $single[0];
        else
            $ret["Offer"] = null;
        return $ret;
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
