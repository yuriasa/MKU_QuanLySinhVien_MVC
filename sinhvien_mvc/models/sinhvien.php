<?php
class SinhVien 
{
    public $MaSV;
    public $TenSV;
    public $GioiTinh;
    public $NgaySinh;
    public $QueQuan;
    public $MaLop;

    function __construct($ma, $ten, $gioitinh, $ngaysinh, $quequan, $malop)
    {
        $this->MaSV = $ma;
        $this->TenSV = $ten;
        $this->GioiTinh = $gioitinh;
        $this->NgaySinh = $ngaysinh;
        $this->QueQuan = $quequan;
        $this->MaLop = $malop;
    }

    public static function getAllSinhVien()
    {
        $list = [];
        $db = DB::getInstance();
        $result = $db->prepare('SELECT * FROM sinhvien');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        foreach ($result->fetchAll() as $item) {
            $list[] = new SinhVien($item['MaSV'], $item['TenSV'], $item['GioiTinh'], $item['NgaySinh'], $item['QueQuan'], $item['MaLop']);
        }
        return $list;
    }

    public static function layChiTietSV($masv)
    {
        $list = [];
        $db = DB::getInstance();
        $result = $db->prepare('SELECT * FROM sinhvien WHERE MaSV = :ma');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array('ma' => $masv));
        foreach ($result->fetchAll() as $item) {
            $list[] = new SinhVien($item['MaSV'], $item['TenSV'], $item['GioiTinh'], $item['NgaySinh'], $item['QueQuan'], $item['MaLop']);
        }
        return $list;
    }

    public static function ThemSinhVien($masv, $tensv, $gioitinh, $ngaysinh, $quequan, $malop)
    {
        $db = DB::getInstance();
        try {
            // Kiểm tra trùng khóa chính
            $sql = $db->prepare('SELECT MaSV FROM sinhvien WHERE MaSV = :ma');
            $sql->execute(array('ma' => $masv));
            $item = $sql->fetch();

            // Kiểm tra dữ liệu hợp lệ
            if (isset($item['MaSV'])) {
                return 0; // Sinh viên đã tồn tại
            } else {
                // Bắt đầu giao dịch
                $db->beginTransaction();

                $sql_themsv = 'INSERT INTO sinhvien (MaSV, TenSV, GioiTinh, NgaySinh, QueQuan, MaLop)
                               VALUES (:ma, :tensv, :gioitinh, :ngaysinh, :quequan, :malop)';
                
                $stmt = $db->prepare($sql_themsv);
                $stmt->bindParam(':ma', $masv);
                $stmt->bindParam(':tensv', $tensv);
                $stmt->bindParam(':gioitinh', $gioitinh);
                $stmt->bindParam(':ngaysinh', $ngaysinh);
                $stmt->bindParam(':quequan', $quequan);
                $stmt->bindParam(':malop', $malop);
                
                $dpdExec = $stmt->execute();
                
                if ($dpdExec) {
                    $db->commit(); // Cam kết giao dịch
                    return 1; // Thêm thành công
                } else {
                    $db->rollBack(); // Hoàn tác giao dịch
                    return 0; // Thêm không thành công
                }
            }
        } catch (Exception $e) {
            // Xử lý lỗi
            $db->rollBack();
            return 0; // Thêm không thành công
        }
    }

    public static function CapNhatSinhVien($masv, $tensv, $gioitinh, $ngaysinh, $quequan, $malop)
    {
        $db = DB::getInstance();
        try {
            $db->beginTransaction();

            $sql = 'UPDATE sinhvien SET 
                    TenSV = :tensv, 
                    GioiTinh = :gioitinh, 
                    NgaySinh = :ngaysinh, 
                    QueQuan = :quequan, 
                    MaLop = :malop 
                    WHERE MaSV = :ma';
            
            $stmt = $db->prepare($sql);
            
            // Bind các tham số với kiểu dữ liệu chính xác
            $stmt->bindParam(':ma', $masv, PDO::PARAM_STR);
            $stmt->bindParam(':tensv', $tensv, PDO::PARAM_STR);
            $stmt->bindParam(':gioitinh', $gioitinh, PDO::PARAM_INT); // Quan trọng: PARAM_INT cho giới tính
            $stmt->bindParam(':ngaysinh', $ngaysinh);
            $stmt->bindParam(':quequan', $quequan, PDO::PARAM_STR);
            $stmt->bindParam(':malop', $malop, PDO::PARAM_STR);
            
            $result = $stmt->execute();
            
            if ($result) {
                $db->commit();
                return 1;
            } else {
                $db->rollBack();
                return 0;
            }
        } catch (PDOException $e) {
            $db->rollBack();
            error_log("Lỗi khi cập nhật sinh viên: " . $e->getMessage());
            return -1;
        }
    }

    public static function XoaSinhVien($masv)
    {
        $db = DB::getInstance();
        try {
            $db->beginTransaction();

            $sql = 'DELETE FROM sinhvien WHERE MaSV = :ma';
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':ma', $masv);
            $result = $stmt->execute();

            if ($result && $stmt->rowCount() > 0) {
                $db->commit();
                return 1; // Xóa thành công
            } else {
                $db->rollBack();
                return 0; // Không tìm thấy sinh viên để xóa
            }
        } catch (Exception $e) {
            $db->rollBack();
            return -1; // Lỗi khi xóa
        }
    }

    public static function timKiemSinhVien($keyword)
    {
        $db = DB::getInstance();
        $keyword = "%$keyword%";
        
        $sql = "SELECT * FROM sinhvien 
                WHERE MaSV LIKE :keyword 
                OR TenSV LIKE :keyword 
                OR QueQuan LIKE :keyword 
                OR MaLop LIKE :keyword";
        
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        
        $list = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $list[] = new SinhVien(
                $item['MaSV'],
                $item['TenSV'],
                $item['GioiTinh'],
                $item['NgaySinh'],
                $item['QueQuan'],
                $item['MaLop']
            );
        }
        return $list;
    }
}
?>