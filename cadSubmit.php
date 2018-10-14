<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Contato.php';
$contato = new Contato();

if(!empty($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    $contato->insertDado($nome, $email);
    header('Location: index.php');
    exit();
}else{
    header('Location: index.php');
    exit();
}

