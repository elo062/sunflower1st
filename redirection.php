<?php
/**
 * Created by PhpStorm.
 * User: gruikette
 * Date: 15/01/2018
 * Time: 09:39
 */
require_once("header.php");
// si l'utilisateur n'est pas connecté on le redirige vers la page de connexion


if(!isset($_SESSION['id'])) {
    header('Location:login.php');
}