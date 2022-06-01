<?php

require_once "DBh.class.php";
require_once "Structs/option.struct.php";

class Options extends DBh
{
    public static function row_maper(int $value, string $name): Option
    {
        return new Option($value, $name);
    }

    protected function getOptions(string $name, string $column, string $sql_conditions = ""): array
    {
        try {
            return $this->connect()
                ->query("SELECT `ID` as `value`, `$name`as `name` FROM `$column` $sql_conditions;")
                ->fetchAll(PDO::FETCH_FUNC, "Options::row_maper");
        } catch (PDOException) {
            $this->error();
        }
    }
    protected function getOffer($ID)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM `samochody` WHERE `ID` = ?;");
        $this->handleExec($stmt, [$ID]);
        $fetched = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $stmt = null;
        return $fetched;
    }
}
