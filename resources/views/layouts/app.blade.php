<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema de Inventario</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

:root{
    --primary:#6366f1;
    --secondary:#8b5cf6;
    --success:#10b981;
    --danger:#ef4444;
    --warning:#f59e0b;
    --dark:#111827;
}

*{
    font-family:'Inter',sans-serif;
}

body{
    background: linear-gradient(
        135deg,
        #eef2ff,
        #f5f3ff
    );
    min-height:100vh;
}

.sidebar{
    width:260px;
    position:fixed;
    top:0;
    left:0;
    height:100vh;
    background:white;
    box-shadow:0 0 30px rgba(0,0,0,.08);
    padding:30px 20px;
}

.logo{
    font-size:1.4rem;
    font-weight:700;
    color:var(--primary);
    margin-bottom:40px;
}

.menu a{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    color:#4b5563;
    padding:14px;
    border-radius:12px;
    margin-bottom:8px;
    transition:.3s;
}

.menu a:hover{
    background:#eef2ff;
    color:var(--primary);
}

.content{
    margin-left:280px;
    padding:40px;
}

.glass-card{
    background:rgba(255,255,255,.8);
    backdrop-filter:blur(12px);
    border:none;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
}

.page-title{
    font-weight:700;
    color:#111827;
    margin-bottom:25px;
}

.table-modern{
    overflow:hidden;
    border-radius:20px;
}

.table-modern table{
    margin:0;
}

thead{
    background:var(--primary);
    color:white;
}

.badge-stock{
    padding:8px 14px;
    border-radius:999px;
}

.metric-number{
    font-size:2rem;
    font-weight:700;
}

.metric-label{
    color:#6b7280;
}

</style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        <i class="fa-solid fa-cubes"></i>
        Inventario
    </div>

    <div class="menu">

        <a href="{{ route('reports.summary') }}">
            <i class="fa-solid fa-chart-line"></i>
            Dashboard
        </a>

        <a href="{{ route('reports.low-stock') }}">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Bajo Stock
        </a>

        <a href="{{ route('reports.top-value') }}">
            <i class="fa-solid fa-trophy"></i>
            Top Valor
        </a>

    </div>

</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>