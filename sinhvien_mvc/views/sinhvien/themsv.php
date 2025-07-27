<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-person-plus me-2"></i>
                        <?= isset($sinhvien) ? 'CẬP NHẬT' : 'THÊM MỚI' ?> SINH VIÊN
                    </h5>
                </div>
                
                <div class="card-body">
                    <form method="post" action="index.php?controller=sinhvien&action=<?= isset($sinhvien) ? 'xulyCapNhatSV' : 'xulyThemSV' ?>">
                        <?php if (isset($sinhvien)): ?>
                        <input type="hidden" name="masv" value="<?= $sinhvien[0]->MaSV ?>">
                        <?php endif; ?>
                        
                        <div class="row g-3">
                            <?php if (!isset($sinhvien)): ?>
                            <div class="col-md-6">
                                <label for="masv" class="form-label required-label">Mã sinh viên</label>
                                <input type="text" class="form-control" id="masv" name="masv" 
                                       required pattern="[A-Za-z0-9]{5}" title="Mã sinh viên phải có 5 ký tự"
                                       value="<?= isset($sinhvien) ? $sinhvien[0]->MaSV : '' ?>">
                                <div class="form-text">Nhập đúng 5 ký tự (chữ hoặc số)</div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="col-md-6">
                                <label for="tensv" class="form-label required-label">Họ và tên</label>
                                <input type="text" class="form-control" id="tensv" name="tensv" required
                                       value="<?= isset($sinhvien) ? $sinhvien[0]->TenSV : '' ?>">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="gioitinh" class="form-label required-label">Giới tính</label>
                                <select class="form-select" id="gioitinh" name="gioitinh" required>
                                    <option value="">-- Chọn --</option>
                                    <option value="1" <?= isset($sinhvien) && $sinhvien[0]->GioiTinh == 1 ? 'selected' : '' ?>>Nam</option>
                                    <option value="0" <?= isset($sinhvien) && $sinhvien[0]->GioiTinh == 0 ? 'selected' : '' ?>>Nữ</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="ngaysinh" class="form-label required-label">Ngày sinh</label>
                                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required
                                       value="<?= isset($sinhvien) ? date('Y-m-d', strtotime($sinhvien[0]->NgaySinh)) : '' ?>">
                            </div>
                            
                            <div class="col-12">
                                <label for="quequan" class="form-label required-label">Quê quán</label>
                                <input type="text" class="form-control" id="quequan" name="quequan" required
                                       value="<?= isset($sinhvien) ? $sinhvien[0]->QueQuan : '' ?>">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="malop" class="form-label required-label">Mã lớp</label>
                                <input type="text" class="form-control" id="malop" name="malop" required
                                       value="<?= isset($sinhvien) ? $sinhvien[0]->MaLop : '' ?>">
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="d-flex justify-content-end">
                                    <a href="index.php?controller=sinhvien&action=hienthiDanhSachSV" 
                                       class="btn btn-secondary me-2">
                                       <i class="bi bi-arrow-left"></i> Quay lại
                                    </a>
                                    <button type="reset" class="btn btn-outline-secondary me-2">
                                        <i class="bi bi-arrow-counterclockwise"></i> Hoàn Tác
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> <?= isset($sinhvien) ? 'Cập nhật' : 'Lưu lại' ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>