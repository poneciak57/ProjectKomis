<?php
if (isset($_GET['login'])) {
    require_once "../Classes/DBh.class.php";
    class LoginCheck extends DBh
    {
        public function __construct($login)
        {
            $stmt = $this->connect()->prepare("SELECT ID FROM users WHERE Login = ?;");
            if (!$stmt->execute([$login])) {
                $stmt = null;
                header("location: ../../index.php?error=StmtError");
                exit();
            }
            $response = ["IsLoginCorrect" => false];

            if ($stmt->rowCount() > 0) {
                $response["IsLoginCorrect"] = true;
            }
            $stmt = null;

            $json = json_encode($response);
            echo $json;
        }
    }
    $lc = new LoginCheck($_GET['login']);
}
