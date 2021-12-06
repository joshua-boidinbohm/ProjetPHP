<?php
class Security {
    private static $seed = 'cOCK5k5Y9c';

    public static function hacher($texte_en_clair) {
        $texte_seed = $texte_en_clair . Security::$seed;
        $texte_hache = hash('sha256', $texte_seed);
        return $texte_hache;
    }

    public static function generateRandomHex() {
        // Generate a 32 digits hexadecimal number
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes);
        $hex   = bin2hex($bytes);
        return $hex;
    }
}
?>