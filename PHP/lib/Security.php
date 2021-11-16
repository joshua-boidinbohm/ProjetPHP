<?php
class Security {
    private static $seed = 'cOCK5k5Y9c';

    public static function hacher($texte_en_clair) {
        $texte_seed = $texte_en_clair . Security::$seed;
        $texte_hache = hash('sha256', $texte_seed);
        return $texte_hache;
    }
}
?>