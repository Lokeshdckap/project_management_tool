<?php


class Guestiddleware{
  
    public function handler(){
        if (isset($_SESSION['login'])) {
            header('Location: /');
        }
    }
}