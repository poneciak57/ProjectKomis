<?php

require_once "DBh.class.php";

class Offers extends DBh
{


    public function Stack(int $stack_nr, int $offers_nr): array
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
        return [];
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
