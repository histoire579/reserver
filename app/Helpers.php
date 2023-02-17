<?php 

function getPrix($prix)
{
    $prix=floatval($prix);
    return number_format($prix, 2, '.', ' '). ' FCFA';
}

function getMontant($prix)
{
    $prix=floatval($prix);
    return number_format($prix, 2, '.', ' ');
}