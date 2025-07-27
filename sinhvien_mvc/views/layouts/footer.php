<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="bi bi-info-circle"></i> MKU-CNTT-K5</h5>
                <p class="mb-0">Hệ thống quản lý sinh viên</p>
                <p class="mb-0">Phiên bản: 1.0.0</p>
            </div>
            <div class="col-md-6 text-md-end">
                <h5><i class="bi bi-person"></i> Liên hệ</h5>
                <p class="mb-0">Email: nhom2@mku.edu.vn</p>
                <p class="mb-0">Điện thoại: 0123.456.789</p>
            </div>
        </div>
        <hr class="my-3">
        <div class="text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> Quản Lý Sinh Viên MVC. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
// Validate form client-side
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const masv = form.querySelector('#masv');
            if (masv && masv.value.length !== 5) {
                alert('Mã sinh viên phải có đúng 5 ký tự');
                masv.focus();
                e.preventDefault();
                return false;
            }
            
            // Thêm các validation khác nếu cần
            return true;
        });
    });
});
</script>
</body>
</html>