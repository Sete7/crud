<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'Contato.php';
$contato = new Contato();
?>
<a href="cadastrar.php">[CADASTRAR]</a><br/><br/>
<table border="1" width="500" style="text-align: center">
    <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Ações</td>
    </tr>
<?php
$dados = $contato->readyAll();
foreach ($dados as $list):    
    ?>
        <tr>
            <th><?php echo $list['id']; ?></th>
            <th><?php echo $list['nome']; ?></th>
            <th><?php echo $list['email']; ?></th>
            <th>
                <a href="editar.php?id=<?php echo $list['id']; ?>">[EDITAR]</a>
                <a href="excluir.php?id=<?php echo $list['id']; ?>">[EXCLUIR]</a>
            </th>
        </tr>
    <?php
endforeach;
?>
</table>
