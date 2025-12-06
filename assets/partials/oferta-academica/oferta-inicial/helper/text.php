<?php

if (!function_exists('render_md_strong')) {
    function render_md_strong(string $text): string
    {
        $safe = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
        return preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $safe);
    }
}
