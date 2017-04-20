# Search and Emphasize
Esta classe localiza um termo dentro de um texto com caracteres especiais.

**ATENÇÃO**: o termo a ser pesquisado não deve conter caracteres espciais.

Exemplo de uso:

<code>
<pre>
$meuTexto = "O Diego é gordão, o José é magrelo e o Vinícius é fortão. Coloquei outra frase com José no nome só pra mostrar que o termo será sublinhado em todas as ocorrências."
$termo = "jose";
$searchAndEmphasize = new SearchAndEmphasize($meuTexto, $termo);
$finalText = $searchAndEmphasize->transform();
echo $finalText;
</pre>
</code>
