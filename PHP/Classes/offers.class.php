<?php

require_once "DBh.class.php";

class Offers extends DBh
{


    public function Stack(array $specs, int $stack_nr, int $offers_nr): array
    {
        $stmt = $this->connect()->prepare("SELECT samochody.ID, marka, model,rok_produkcji, cena, typ_paliwa, przebieg, skrzynia, Data_dodania, UNCOMPRESS(`zdjecie`) as zdjecie 
        FROM samochody, marka, model, paliwo, skrzynia_biegow ,rok_produkcji
        WHERE model.ID = samochody.model_id 
        AND marka.ID = model.ID_marka 
        AND paliwo.ID = samochody.paliwo_id 
        AND skrzynia_biegow.ID = skrzynia_id
        AND rok_produkcji.ID = rok_produkcji_id
        ORDER BY samochody.ID ASC LIMIT ?, ?");

        $this->handleExec($stmt, [($stack_nr - 1) * $offers_nr, $offers_nr]);
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $fetched;
    }

    protected function Single(int $ID): array
    {
        $stmt = $this->connect()->prepare("SELECT samochody.ID, marka, model, cena, rok_produkcji, przebieg, moc_silnika, typ_paliwa, skrzynia, kraj_pochodzenia, kolor, wypadkowosc_id, UNCOMPRESS(zdjecie) as zdjecie, Liczba_drzwi, Liczba_miejsc, Liczba_kluczy, Typ_opon, Tapicerka, Oryginalny_silnik, Emisja_CO2, Ostatni_serwis, Data_dodania, Numer_wewnetrzny 
        FROM samochody, model, marka, rok_produkcji, paliwo, kraj_pochodzenia, kolor, skrzynia_biegow 
        WHERE model.ID = samochody.model_id 
        AND marka.ID = model.ID_marka 
        AND rok_produkcji.ID = samochody.rok_produkcji_id 
        AND paliwo.ID = samochody.paliwo_id 
        AND kraj_pochodzenia.ID = samochody.kraj_pochodzenia_id 
        AND kolor.ID = samochody.kolor_id 
        AND skrzynia_biegow.ID = skrzynia_id 
        AND samochody.ID = ?");

        $this->handleExec($stmt, [$ID]);
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $fetched;
    }

    // protected function Add()
    // {
    // }

    protected function Delete(int $ID): void
    {
        $stmt = $this->connect()->prepare("DELETE FROM `samochody` WHERE `ID` = ?;");
        $this->handleExec($stmt, [$ID]);
        $stmt = null;
    }

    // protected function Update(int $ID)
    // {
    // }

    protected function CountQuerries(): int
    {
        try {
            return $this->connect()->query("SELECT COUNT(ID) FROM `samochody`;")->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException) {
            $this->error();
        }
    }
}
