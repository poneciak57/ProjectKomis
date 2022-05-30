<?php
    require_once "DBh.class.php";

    class Profile extends DBh 
    {
        public function GetProfile($User) 
        {
            try{
            return $this->connect()
                ->query("SELECT `Imie`, `Nazwisko`, `Login`, `E-mail`, `Telefon` FROM `users` WHERE Login = '$User->Login'")
                ->fetchAll();
            }
            catch (PDOException) {
                $this->error();
            }
        } 
        public function UpdateProfile($User, $Imie, $Nazwisko, $Login, $Email, $Telefon)
        {
                
               $smth = $this->connect()->prepare("UPDATE `users` SET  `Imie` = ?, `Nazwisko` = ?, `Login` = ?, `E-mail` = ?, `Telefon` = ?  WHERE `Login` = ?;");
               $this->handleExec($smth, [$Imie, $Nazwisko, $Login, $Email, $Telefon, $User->Login]);
               $smth = null;
        }
    }
    
    
?>