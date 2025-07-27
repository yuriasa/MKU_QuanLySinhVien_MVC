<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản Lý Sinh Viên MVC</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --banner-gradient: linear-gradient(135deg, #0066cc 0%, #004080 100%);
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar-brand {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            margin-bottom: 2rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border-radius: 0.5rem 0.5rem 0 0 !important;
            padding: 1rem 1.5rem;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            background-color: var(--secondary-color);
            font-weight: 600;
        }
        
        .action-btn {
            min-width: 80px;
            margin: 0 3px;
        }
        
        .form-section {
            background: white;
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .required-label:after {
            content: " *";
            color: red;
        }
        
        .pagination {
            justify-content: center;
        }

        .banner {
            background: var(--banner-gradient);
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .quick-actions .btn {
            padding: 15px;
            font-size: 1.1rem;
            border-radius: 8px;
        }
        
        .progress {
            height: 25px;
        }
        
        .progress-bar {
            font-size: 0.9rem;
            line-height: 25px;
        }
        
        @media (max-width: 768px) {
            .banner h1 {
                font-size: 1.8rem;
            }
            
            .navbar-brand span {
                display: none !important;
            }
            
            .card {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="resources/images/logo-mku.png" alt="Logo MKU" class="me-2" style="height: 30px;">
                <span class="d-none d-lg-block">Trường Đại Học Cửu Long</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=sinhvien&action=hienthiDanhSachSV">
                            <i class="bi bi-person-lines-fill"></i> Sinh viên
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>