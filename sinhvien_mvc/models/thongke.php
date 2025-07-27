<?php
class ThongKe 
{
    // Thống kê tổng số sinh viên theo lớp
    public static function theoLop() 
    {
        $db = DB::getInstance();
        return $db->query("SELECT MaLop, COUNT(*) as so_luong FROM sinhvien GROUP BY MaLop ORDER BY MaLop")
                ->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Thống kê số sinh viên theo quê quán
    public static function theoQueQuan() 
    {
        $db = DB::getInstance();
        return $db->query("SELECT QueQuan, COUNT(*) as so_luong 
                          FROM sinhvien 
                          GROUP BY QueQuan 
                          ORDER BY so_luong DESC 
                          LIMIT 5")
                ->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Thống kê số sinh viên theo giới tính
    public static function theoGioiTinh() 
    {
        $db = DB::getInstance();
        return $db->query("SELECT 
                            CASE WHEN GioiTinh = 1 THEN 'Nam' ELSE 'Nữ' END as gioi_tinh, 
                            COUNT(*) as so_luong 
                           FROM sinhvien 
                           GROUP BY GioiTinh")
                ->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Tổng số sinh viên
    public static function tongSoSinhVien() 
    {
        $db = DB::getInstance();
        return $db->query("SELECT COUNT(*) FROM sinhvien")->fetchColumn();
    }
}
?>