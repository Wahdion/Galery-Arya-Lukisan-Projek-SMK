<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f4f6f9;
        }

        .header {
            background: linear-gradient(135deg, #6f42c1, #0d6efd);
            color: white;
            padding: 2rem;
            border-radius: 1.5rem;
            text-align: center;
        }

        .gallery-card {
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
            border-radius: 1.5rem;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .gallery-image {
            width: 100%;
            height: auto;
            border-radius: 1rem;
        }

        .gallery-card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 1rem;
        }

        .gallery-card-description {
            font-size: 1rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }

        .btn-action {
            transition: 0.3s ease;
        }

        .btn-action:hover {
            transform: scale(1.1);
        }

        /*piginition*/
        
.pagination .page-link {
    color: #0d6efd;
    font-weight: 500;
    padding: 0.6rem 1.1rem;
    margin: 0 3px;
    border-radius: 1rem;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination .page-item.active .page-link {
    background-color: #6610f2;
    border-color: #6610f2;
    color: white;
    font-weight: bold;
    box-shadow: 0 3px 10px rgba(102,16,242,0.4);
}

.pagination .page-link:hover {
    background-color: #e0e0ff;
    color: #0d6efd;
}

.pagination .page-item.disabled .page-link {
    color: #999;
    background-color: #f1f1f1;
    border: 1px solid #dee2e6;
}
/* Hover animation */
.page-link {
    transition: all 0.3s ease-in-out;
}
.page-link:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* Dark mode basic (optional if not using Tailwind) */
body.dark .pagination {
    background-color: #2d2d2d;
}
body.dark .page-link {
    background-color: #3d3d3d;
    color: #ddd;
}
body.dark .page-link:hover {
    background-color: #4a90e2;
    color: white;
}

    </style>
</head>

<body>

    <div class="container mt-4">
        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Konten Halaman -->
        @yield('content')
    </div>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
