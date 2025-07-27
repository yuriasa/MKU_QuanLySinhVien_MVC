<?php
include_once('base_controller.php');
include_once('models/sinhvien.php');

class SinhVienController extends BaseController
{
    function __construct()
    {
        $this->folder = 'sinhvien';
    }

    public function hienthiDanhSachSV()
    {
        $sinhviens = SinhVien::getAllSinhVien();
        $data = array('sinhviens' => $sinhviens);
        $this->render('danhsachsv', $data);
    }

    public function hienthiThemSV()
	{
		$data=[];
		$this->render('themsv',$data);
	}

    public function xulyThemSV()
	{
		if(isset($_POST['masv']))
			$masv=$_POST['masv'];

		if(isset($_POST['tensv']))
			$tensv=$_POST['tensv'];

		if(isset($_POST['gioitinh']))
			$gioitinh=$_POST['gioitinh'];

		if(isset($_POST['ngaysinh']))
			$ngaysinh=$_POST['ngaysinh'];

		if(isset($_POST['quequan']))
			$quequan=$_POST['quequan'];

		if(isset($_POST['malop']))
			$malop=$_POST['malop'];

		$kqthem = SinhVien::ThemSinhVien($masv,$tensv,$gioitinh,$ngaysinh,$quequan,$malop);
		if($kqthem == 1) {
        	echo "<script>
                alert('Đã thêm sinh viên thành công');
                window.location.href = 'index.php?controller=sinhvien&action=hienthiDanhSachSV';
            </script>";
   		} else {
            echo "<script>
                alert('Chưa thêm được sinh viên');
                window.location.href = 'index.php?controller=sinhvien&action=hienthiThemSV';
            </script>";
    	}
	}

    public function hienthiCapNhatSV()
    {
       if(isset($_GET['masv']))
        {
            $masv = $_GET['masv'];
            $sinhvien=SinhVien::layChiTietSV($masv);
            $data=array('sinhvien'=>$sinhvien);
        }
        else
            $data=[];
		$this->render('capnhatsv', $data);
    }
    
    public function xulyCapNhatSV()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $masv = $_POST['masv'] ?? '';
            $tensv = $_POST['tensv'] ?? '';
            $gioitinh = isset($_POST['gioitinh']) ? (int)$_POST['gioitinh'] : 1; // Mặc định là Nam nếu không có giá trị
            $ngaysinh = $_POST['ngaysinh'] ?? '';
            $quequan = $_POST['quequan'] ?? '';
            $malop = $_POST['malop'] ?? '';

            // Debug: Kiểm tra giá trị trước khi cập nhật
            error_log("Giới tính nhận được: " . print_r($gioitinh, true));
            
            $kq = SinhVien::CapNhatSinhVien($masv, $tensv, $gioitinh, $ngaysinh, $quequan, $malop);
            
            if($kq == 1) {
                $_SESSION['message'] = 'Cập nhật sinh viên thành công';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'Cập nhật sinh viên thất bại';
                $_SESSION['message_type'] = 'danger';
            }
        }
        
        header('Location: index.php?controller=sinhvien&action=hienthiDanhSachSV');
        exit();
    }

    public function xulyXoaSV()
    {
        if (isset($_GET['masv'])) {
            $masv = $_GET['masv'];
            $kqXoa = SinhVien::XoaSinhVien($masv);
            
            if ($kqXoa == 1) {
                $_SESSION['message'] = 'Đã xóa sinh viên thành công';
                $_SESSION['message_type'] = 'success';
            } elseif ($kqXoa == 0) {
                $_SESSION['message'] = 'Không tìm thấy sinh viên để xóa';
                $_SESSION['message_type'] = 'warning';
            } else {
                $_SESSION['message'] = 'Lỗi khi xóa sinh viên';
                $_SESSION['message_type'] = 'danger';
            }
        }
        
        header('Location: index.php?controller=sinhvien&action=hienthiDanhSachSV');
        exit();
    }

    public function timKiemSV()
    {
        $keyword = $_GET['keyword'] ?? '';
        
        if (!empty($keyword)) {
            $sinhviens = SinhVien::timKiemSinhVien($keyword);
        } else {
            $sinhviens = SinhVien::getAllSinhVien();
        }
        
        $data = [
            'sinhviens' => $sinhviens,
            'keyword' => $keyword
        ];
        
        $this->render('danhsachsv', $data);
    }
}
?>