<?php 
function get_admin_uri(): string
{
    return defined('CUSTOM_ADMIN_URL') ? CUSTOM_ADMIN_URL : 'admin';
}

function admin_url(string $url = '')
{
    $adminURI = get_admin_uri();
    $url = trim($url, '/'); 
    $fullPath = $url === '' ? $adminURI : $adminURI . '/' . $url;

    return rtrim(site_url($fullPath), '/') . '/';
}