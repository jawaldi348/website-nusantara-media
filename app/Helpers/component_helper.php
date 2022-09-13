<?php
if (!function_exists("assets")) {
    function assets()
    {
        $assets = base_url() . '/assets/';
        return $assets;
    }
}
