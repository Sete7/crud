<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Contato.php';
$contato = new Contato();

if (!empty($_POST['id'])):
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (!empty($email)):
        $contato->updateDado($nome, $email, $id);
    endif;
    header('Location: index.php');  
endif;
