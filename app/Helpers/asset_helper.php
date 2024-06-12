<?php

namespace App\Helpers;

if (!function_exists('asset')) {
    /**
     * Memuat file asset dari direktori public.
     *
     * @param string $path
     * @param bool $echo
     * @return string
     */
    function asset(string $path, bool $echo = true): string
    {
        $assetPath = base_url($path);

        if ($echo) {
            echo $assetPath;
        }

        return $assetPath;
    }
}
