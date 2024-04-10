<?php
    $numero = $_POST['Numero'];
    $factorial = 1;

    for ($i = 0; $i <= 10; $i++){
        $resultadoMulti = $numero * $i; 
    }

    for ($f = $numero; $f >= 1; $f--) {
        $factorial *= $f;
    }

?>
<table border="1">
    <?php
        for ($i = 0; $i <= 10; $i++):
            ?>
            <tr>
                <td><? "$numero x $i:" ?></td>
                <td><? $resultadoMulti ?></td>
            </tr>
        <?php endfor; ?>
    <?php

       
    ?>
    <tr>
        <td><?= "$numero!" ?></td>
        <td><?= $factorial ?></td>
    </tr>
</table>