<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="bi bi-graph-up"></i> Thống Kê Sinh Viên</h5>
        </div>
        <div class="card-body">
            <!-- Thống kê tổng quan -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-body text-center">
                            <h3><?= $tong_sv ?></h3>
                            <p class="mb-0">Tổng Sinh Viên</p>
                        </div>
                    </div>
                </div>
                
                <?php foreach ($theo_gioi_tinh as $gt): ?>
                <div class="col-md-4">
                    <div class="card text-white <?= $gt['gioi_tinh'] == 'Nam' ? 'bg-success' : 'bg-danger' ?>">
                        <div class="card-body text-center">
                            <h3><?= $gt['so_luong'] ?></h3>
                            <p class="mb-0">SV <?= $gt['gioi_tinh'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Thống kê theo lớp -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6><i class="bi bi-building"></i> Phân Bố Theo Lớp</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Lớp</th>
                                    <th>Số Lượng</th>
                                    <th>Tỷ Lệ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; foreach ($theo_lop as $lop): ?>
                                <tr>
                                    <td><?= $stt++ ?></td>
                                    <td><?= htmlspecialchars($lop['MaLop']) ?></td>
                                    <td><?= $lop['so_luong'] ?></td>
                                    <td><?= round($lop['so_luong']/$tong_sv*100, 2) ?>%</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Thống kê theo quê quán -->
            <div class="card">
                <div class="card-header">
                    <h6><i class="bi bi-geo-alt"></i> Phân Bố Theo Quê Quán</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Quê Quán</th>
                                    <th>Số Lượng</th>
                                    <th>Tỷ Lệ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; foreach ($theo_que as $que): ?>
                                <tr>
                                    <td><?= $stt++ ?></td>
                                    <td><?= htmlspecialchars($que['QueQuan']) ?></td>
                                    <td><?= $que['so_luong'] ?></td>
                                    <td><?= round($que['so_luong']/$tong_sv*100, 2) ?>%</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>