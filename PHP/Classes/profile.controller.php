<?php

require_once "profile.class.php";

class ProfileController extends Profile
{
    public function GetProfile(User $User): array
    {
        return $this->Get($User)[0];
    }
    public function UpdateProfile(User $User, array $data)
    {
        if (!($this->isDataValid($data))) {
            header("location: /Pages/profile.page.php?Updated=false");
            exit;
        }

        $this->Update($User, $data["imie"], $data["nazwisko"], $data["login"], $data["email"], $data["telefon"]);
    }

    private function isDataValid(array $data): bool
    {
        return !(empty($data['login']));
    }
}
