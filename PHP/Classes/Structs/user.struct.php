<?php
class User
{
    public function __construct(
        public $ID,
        public $Login,
        public $Password,
        public $Privileges
    ) {
    }
}
