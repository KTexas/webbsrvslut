<?php

namespace App;

class filters
{
    /**
     * Filters string from unwanted variables, trims, lowers string
     *
     * @param string $string String desired to be filtered
     * @return string
     */
    public static function filterString( string $string ) : string
    {
        $variable = trim( $string );
        $unwanted_array = [ 'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y' ];
        $variable = strtr( $variable, $unwanted_array );
        $variable = strtolower( $variable );
        return filter_var(
            $variable,
            FILTER_SANITIZE_STRING,
            FILTER_FLAG_STRIP_LOW
        );
    }

    /**
     * Filters string from unwanted variables, trims, lowers string & unsets it from $_POST
     *
     * @param string $string String desired to be filtered
     * @return string The filtered string
     */
    public static function filterStringAndUnsetPost( string $string ) : string {
        $filters = new filters();
        $variable = $_POST[$string];
        unset($_POST[$string]);

        return $filters->filterString($variable);
    }
}