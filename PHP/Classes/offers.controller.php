
<?php

require_once "offers.class.php";

class OffersController extends Offers
{
    private const OFFER_NR = 10;
    private $stack_querries;
    public function __construct(private array $request = [])
    {
        $this->stack_querries = json_decode(file_get_contents(__DIR__ . "/Structs/offer-stack.queries.json"), true);
    }

    public function getStack()
    {
        $stmt = $this->prepareStackStatement();
        $stack = $this->Stack($stmt["stmt"], $stmt["args"]);

        $ret = array();
        $ret["QuerriesFound"] = $this->CountQuerries($this->prepareCountStatement());
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

    public function addOffer($imgData)
    {
        $offer = $this->retrieveOfferFromRequest();
        $offer[] = base64_encode($imgData);
        $this->Add($offer);
    }

    public function deleteOffer($Id)
    {
        $this->delete($Id);
    }

    public function updateOffer(int $ID, $imgData)
    {
        if ($imgData != null)
            $this->UpdateImg($ID, img: base64_encode($imgData));

        $this->Update($ID, offer: $this->retrieveOfferFromRequest());
    }

    private function prepareStackStatement(): array
    {
        $ret = [];
        $ret["args"] = [];
        $ret["stmt"] = "SELECT samochody.ID, marka, model,rok_produkcji, cena, typ_paliwa, przebieg, skrzynia, Data_dodania, UNCOMPRESS(`zdjecie`) as zdjecie 
        FROM samochody, marka, model, paliwo, skrzynia_biegow ,rok_produkcji
        WHERE model.ID = samochody.model_id 
        AND marka.ID = model.ID_marka 
        AND paliwo.ID = samochody.paliwo_id 
        AND skrzynia_biegow.ID = skrzynia_id
        AND rok_produkcji.ID = rok_produkcji_id ";

        foreach ($this->request["specs"] as $key => $value) {
            if ($value != null) {
                array_push($ret["args"], ...$value);
                $ret["stmt"] .= $this->stack_querries[$key];
            }
        }

        $ret["stmt"] .= "ORDER BY samochody.ID ASC LIMIT ?, ?;";
        array_push($ret["args"], ...[($this->request['offer_page'] - 1) * self::OFFER_NR, self::OFFER_NR]);

        return $ret;
    }

    private function prepareCountStatement(): string
    {
        $stmt = "SELECT COUNT(samochody.ID)
        FROM samochody, marka, model, paliwo, skrzynia_biegow ,rok_produkcji
        WHERE model.ID = samochody.model_id 
        AND marka.ID = model.ID_marka 
        AND paliwo.ID = samochody.paliwo_id 
        AND skrzynia_biegow.ID = skrzynia_id
        AND rok_produkcji.ID = rok_produkcji_id ";
        $pattern = '/\?/';
        foreach ($this->request["specs"] as $key => $value) {
            if ($value != null) {
                $temp =  $this->stack_querries[$key];
                foreach ($value as $k => $v) {
                    $temp = preg_replace($pattern, $v, $temp, 1);
                }
                $stmt .= $temp;
            }
        }
        $stmt .= ";";
        return $stmt;
    }

    private function retrieveOfferFromRequest(): array
    {
        return [
            $this->request['model_id'],
            $this->request['cena'],
            $this->request['rok_produkcji_id'],
            $this->request['przebieg'],
            $this->request['moc_silnika'],
            $this->request['paliwo_id'],
            $this->request['skrzynia_id'],
            $this->request['kraj_pochodzenia_id'],
            $this->request['kolor_id'],
            $this->request['Liczba_drzwi'],
            $this->request['Liczba_miejsc'],
            $this->request['Typ_opon'],
            $this->request['Tapicerka'],
            $this->request['Oryginalny_silnik'],
            $this->request['Emisja_CO2'],
            $this->request['Ostatni_serwis'],
            $this->request['Data_dodania'],
            $this->request['Liczba_kluczy'],
            $this->request['Numer_wewnetrzny'],
            $this->request['wypadkowosc_id']
        ];
    }
}
