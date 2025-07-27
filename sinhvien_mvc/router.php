<?php
$controllers = [
    'home' => ['index', 'error'],
    'sinhvien' => ['hienthiDanhSachSV', 
                    'hienthiThemSV', 
                    'xulyThemSV', 
                    'hienthiCapNhatSV', 
                    'xulyCapNhatSV', 
                    'xulyXoaSV',
                    'timKiemSV'],
    'thongke' => ['tongQuan']
];

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'home';
    $action = 'error';
}

include_once('controllers/' . $controller . '_controller.php');
$tenClass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $tenClass;
$controller->$action();
?>