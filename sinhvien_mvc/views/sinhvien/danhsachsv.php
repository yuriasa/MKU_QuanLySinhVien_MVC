<div class="container py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>DANH SÁCH SINH VIÊN</h5>
            <div class="d-flex align-items-center" style="width: 60%;">
                <!-- Form tìm kiếm -->
                <form action="index.php?controller=sinhvien&action=timKiemSV" method="get" class="w-100 me-3">
                    <input type="hidden" name="controller" value="sinhvien">
                    <input type="hidden" name="action" value="timKiemSV">
                    
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" 
                               placeholder="Nhập mã SV, tên SV, quê quán hoặc lớp..." 
                               value="<?= htmlspecialchars($keyword ?? '') ?>">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                
                <!-- Nút Thêm mới -->
                <a href="index.php?controller=sinhvien&action=hienthiThemSV" class="btn btn-success flex-shrink-0">
                    <i class="bi bi-plus-circle"></i> Thêm mới
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- Hiển thị thông báo -->
            <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            endif; 
            ?>
            
            <!-- Thông báo kết quả tìm kiếm -->
            <?php if (!empty($keyword)): ?>
            <div class="alert alert-info mb-3">
                Kết quả tìm kiếm cho: <strong><?= htmlspecialchars($keyword) ?></strong>
                <a href="index.php?controller=sinhvien&action=hienthiDanhSachSV" class="float-end">
                    <i class="bi bi-x-circle"></i> Xóa bộ lọc
                </a>
            </div>
            <?php endif; ?>
            
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="10%">Mã SV</th>
                            <th width="20%">Họ tên</th>
                            <th width="10%">Giới tính</th>
                            <th width="15%">Ngày sinh</th>
                            <th width="20%">Quê quán</th>
                            <th width="10%">Lớp</th>
                            <th width="15%" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sinhviens as $sv): ?>
                        <tr>
                            <td><?= htmlspecialchars($sv->MaSV) ?></td>
                            <td><?= htmlspecialchars($sv->TenSV) ?></td>
                            <td class="text-center">
                                <span class="badge bg-<?= $sv->GioiTinh == 1 ? 'primary' : 'danger' ?>">
                                    <?= $sv->GioiTinh == 1 ? 'Nam' : 'Nữ' ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y', strtotime($sv->NgaySinh)) ?></td>
                            <td><?= htmlspecialchars($sv->QueQuan) ?></td>
                            <td><?= htmlspecialchars($sv->MaLop) ?></td>
                            <td class="text-center">
                                <a href="index.php?controller=sinhvien&action=hienthiCapNhatSV&masv=<?= $sv->MaSV ?>" 
                                   class="btn btn-sm btn-primary action-btn" title="Sửa">
                                   <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="index.php?controller=sinhvien&action=xulyXoaSV&masv=<?= $sv->MaSV ?>" 
                                   class="btn btn-sm btn-danger action-btn" 
                                   title="Xóa"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa sinh viên <?= htmlspecialchars($sv->TenSV) ?>?')">
                                   <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Phân trang (nếu có) -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>