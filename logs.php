<?php
$titulo = "Code/Biblioteca/BIBLIOTECA.txt";
$nuevoarchivo = fopen($titulo, "w+"); 
fwrite($nuevoarchivo,"texto qe contiene el nuevo archivo"); 
fclose($nuevoarchivo); 
