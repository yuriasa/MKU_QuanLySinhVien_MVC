<?php
require_once 'controllers/base_controller.php';
require_once 'models/ThongKe.php';

class ThongKeController extends BaseController 
{
    public function __construct() {
        $this->folder = 'thongke';
    }
    
    // Trang thống kê tổng quan
    public function tongQuan() {
        $data = [
            'tong_sv' => ThongKe::tongSoSinhVien(),
            'theo_lop' => ThongKe::theoLop(),
            'theo_que' => ThongKe::theoQueQuan(),
            'theo_gioi_tinh' => ThongKe::theoGioiTinh()
        ];
        
        $this->render('tongquan', $data);
    }
}
?>