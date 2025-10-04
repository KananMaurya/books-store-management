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

function get_book_labels()
{
    return array(
        array('id' => 1,  'name' => 'NEW BOOK',        'status' => 1, 'bg' => 'info'),
        array('id' => 2,  'name' => 'BESTSELLER',      'status' => 1, 'bg' => 'success'),
        array('id' => 3,  'name' => 'POPULAR',         'status' => 1, 'bg' => 'primary'),
        array('id' => 4,  'name' => 'NEW EDITION',     'status' => 1, 'bg' => 'warning'),
        array('id' => 5,  'name' => 'LIMITED EDITION', 'status' => 1, 'bg' => 'danger'),
        array('id' => 6,  'name' => 'RECOMMENDED',     'status' => 1, 'bg' => 'secondary'),
        array('id' => 7,  'name' => 'FEATURED',        'status' => 1, 'bg' => 'dark'),
        array('id' => 8,  'name' => 'EDITOR\'S PICK',  'status' => 1, 'bg' => 'success'),
        array('id' => 9,  'name' => 'DISCOUNTED',      'status' => 1, 'bg' => 'danger'),
        array('id' => 10, 'name' => 'CLASSIC',         'status' => 1, 'bg' => 'secondary'),
    );
}
