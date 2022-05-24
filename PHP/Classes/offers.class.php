<?php

require_once "DBh.class.php";

class Offers extends DBh
{


    public function Stack(string $statement, array $args): array
    {
        $stmt = $this->connect()->prepare($statement);
        $this->handleExec($stmt, $args);
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

    protected function Add(array $offer)
    {
        $stmt = $this->connect()->prepare("INSERT INTO `samochody`(`model_id`, `cena`, `rok_produkcji_id`, `przebieg`, `moc_silnika`, `paliwo_id`, `skrzynia_id`, `kraj_pochodzenia_id`, `kolor_id`, `Liczba_drzwi`, `Liczba_miejsc`, `Typ_opon`, `Tapicerka`, `Oryginalny_silnik`, `Emisja_CO2`, `Ostatni_serwis`, `Data_dodania`, `Liczba_kluczy`, `Numer_wewnetrzny`, `wypadkowosc_id`, `zdjecie`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,'?','?',?,?,'?','?',?,'?',?,COMPRESS('?'))");
        $this->handleExec($stmt, $offer);
        $stmt = null;
    }

    protected function Delete(int $ID): void
    {
        $stmt = $this->connect()->prepare("DELETE FROM `samochody` WHERE `ID` = ?;");
        $this->handleExec($stmt, [$ID]);
        $stmt = null;
    }

    protected function UpdateImg(int $ID, string $img)
    {
    }
    protected function Update(int $ID, array $offer)
    {
    }

    protected function CountQuerries(string $statement): int
    {
        try {
            return $this->connect()->query($statement)->fetch(PDO::FETCH_COLUMN);
        } catch (PDOException) {
            $this->error();
        }
    }
}
