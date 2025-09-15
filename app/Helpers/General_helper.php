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

if (!function_exists('get_cart_count_by_ip')) {
    function get_cart_count_by_ip()
    {
        $request = \Config\Services::request();
        $ip_address = $request->getIPAddress();

        $db = \Config\Database::connect();
        $count = $db->table('addtocart')
                    ->where('ip_address', $ip_address)
                    ->countAllResults();
        return $count ?? 0; 
    }
}

