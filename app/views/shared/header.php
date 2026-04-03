<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurfSchool - Taghazout Surf Expo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/style/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo URLROOT; ?>/../index.php">🏄 SurfSchool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navNav">
                <ul class="navbar-nav ms-auto small fw-bold">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php if ($_SESSION['user_role'] === 'admin'): ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/../index.php?url=AdminController/dashboard">Dashboard</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/../index.php?url=StudentController/myAgenda">My Agenda</a></li>
                        <?php endif; ?>
                        <li class="nav-item ms-lg-3"><a class="btn btn-warning btn-sm fw-bold px-3" href="<?php echo URLROOT; ?>/../index.php?url=AuthController/logout">Sign Out</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link text-white" href="<?php echo URLROOT; ?>/../index.php?url=AuthController/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-2 px-3 fw-bold btn-sm" href="<?php echo URLROOT; ?>/../index.php?url=AuthController/register">Join Now</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-5">
