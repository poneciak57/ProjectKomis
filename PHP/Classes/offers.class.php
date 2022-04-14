<?php

require_once "DBh.class.php";

class Offers extends DBh
{


    public function Stack(int $stack_nr, int $offers_nr): array
    {
        $stmt = $this->connect()->prepare("SELECT samochody.ID, marka, model, cena, rok_produkcji, przebieg, moc_silnika, typ_paliwa, czy_manual, kraj_pochodzenia, kolor, czy_wypadkowy, zdjecie FROM samochody, model, marka, rok_produkcji, paliwo, kraj_pochodzenia, kolor 
        WHERE model.ID = samochody.model_id 
        AND marka.ID = model.ID_marka 
        AND rok_produkcji.ID = samochody.rok_produkcji_id 
        AND paliwo.ID = samochody.paliwo_id 
        AND kraj_pochodzenia.ID = samochody.kraj_pochodzenia_id 
        AND kolor.ID = samochody.kolor_id 
        ORDER BY samochody.ID ASC LIMIT ?,?;");

        $this->handleExec($stmt, [($stack_nr - 1) * $offers_nr, $offers_nr]);
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $fetched;
    }

    protected function Single(int $ID): array
    {
        return [];
    }

    // protected function Add()
    // {
    // }

    // protected function Delete(int $ID)
    // {
    // }

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
