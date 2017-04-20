<?php
/**
 * Created by PhpStorm.
 * User: José Carlos Gonçalves da Costa <josecarlosgdacosta@gmail.com>
 * Date: 20/04/17
 * Time: 13:36
 */
require_once ("src/SearchAndEmphasize.php");

$texto = "O Diego é gordão, o José é magrelo e o Vinícius é fortão. Coloquei outra frase com José no nome só pra mostrar que o termo será sublinhado em todas as ocorrências.";

$searchAndEmphasize = new SearchAndEmphasize($texto, "jose");
$textoTransformado = $searchAndEmphasize->transform();

echo $textoTransformado;