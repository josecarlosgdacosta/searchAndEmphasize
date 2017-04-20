<?php

/**
 * Created by PhpStorm.
 * User: José Carlos Gonçalves da Costa <josecarlosgdacosta@gmail.com>
 * Date: 20/04/17
 * Time: 13:37
 */
class SearchAndEmphasize
{
    private $_textToTransform = null;
    private $_term = null;

    /**
     * Construtor padrão da classe.
     * SearchAndEmphasize constructor.
     * @param $textToTransform Texto que será transformado.
     * @param $term Termo que será localizado dentro do texto.
     */
    public function __construct($textToTransform, $term)
    {
        $this->_textToTransform = $textToTransform;
        $this->_term = $term;
    }

    /**
     * Método que remove os caracteres especiais de uma string e os substitui pelos normais.
     * @param $text Texto que será transformado.
     * @return mixed Texto sem os caracteres especiais.
     */
    private function removeSpecialChars($text)
    {
        /*
         * Aqui eu utilizei expressões regulares para substituir os caracteres especiais pelos
         * caracteres normais.
         */
        return preg_replace(
            array(
                "/(á|à|ã|â|ä)/",
                "/(Á|À|Ã|Â|Ä)/",
                "/(é|è|ê|ë)/",
                "/(É|È|Ê|Ë)/",
                "/(í|ì|î|ï)/",
                "/(Í|Ì|Î|Ï)/",
                "/(ó|ò|õ|ô|ö)/",
                "/(Ó|Ò|Õ|Ô|Ö)/",
                "/(ú|ù|û|ü)/",
                "/(Ú|Ù|Û|Ü)/",
                "/(ç)/",
                "/(Ç)/"
            ), explode(" ", "a A e E i I o O u U c C"), strtolower($text));
    }

    /**
     * Método que retorna a posição do termo pesquisado dentro do texto.
     * @param $term Termo pesquisado.
     * @return int Posição do termo dentro da string do texto.
     */
    private function getInitPositionTerm($term)
    {
        $noSpecialCharsText = $this->removeSpecialChars($this->_textToTransform);
        return stripos($noSpecialCharsText, $term);
    }

    /**
     * Método que verifica se o termo foi encontrado no texto.
     * @return bool
     */
    private function termWasLocated()
    {
        $pos = $this->getInitPositionTerm($this->_term);
        if ($pos > 0) {
            return true;
        }
        return false;
    }

    /**
     * Método que transforma o texto.
     * @return mixed|string Texto transformado ou mensagem de erro.
     */
    public function transform()
    {
        if ($this->termWasLocated()) {

            $pos = $this->getInitPositionTerm($this->_term);

            $finalText = str_replace(
                mb_substr($this->_textToTransform, $pos, strlen($this->_term)),
                "<u>" . mb_substr($this->_textToTransform, $pos, strlen($this->_term)) ."</u>",
                $this->_textToTransform
            );

            return $finalText;
        } else {
            $msg = "Não localizamos o termo que você procura.";
            return $msg;
        }
    }
}

