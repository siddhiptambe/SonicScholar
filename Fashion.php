<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpentry Game</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/fashion.css">
</head>
<body>
    <!-- Navigation Bar -->
    <header class="bg-brown text-light p-3" id="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center">
                <img src="logo.jpg" alt="SonicScholars Logo" class="logo-img">
                <span class="ms-3">SonicScholars</span>
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="#" class="nav-link text-light">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light">Carpentry</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light">Fashion</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light">User</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="voiceOutput"></div>
    <div id="feedback"></div>
    <button id="startCarpentry">Start Fashion</button>
    
    <!-- Main Content -->
    <main class="container text-center my-5 pt-4" id="main-content">
        <h1 class="mb-5">Welcome to Fashion Game</h1>
        <div class="zigzag-container w-100">
            <!-- Stage 1: Materials for Carpentry -->
            <div id="stage1-wrapper" class="stage-wrapper">
                <button id="stage1" class="stage1 btn btn-brown rounded-circle">
                    <i class="fa-solid fa-cubes stage-icon"></i>
                    <span class="stage-text">Materials</span>
                </button>
            </div>
            <!-- Curved Line 1 -->
            <div id="line1-wrapper" class="line-wrapper">
                <div id="line1" class="curved-line"></div>
            </div><br><br><br><br><br><br>

            <!-- Stage 2: Tools for Carpentry -->
            <div id="stage2-wrapper" class="stage-wrapper">
                <button id="stage2" class="stage2 btn btn-brown rounded-circle" disabled aria-label="Tools for Carpentry">
                    <i class="fa-solid fa-hammer stage-icon"></i>
                    <span class="stage-text">Tools</span>
                </button>
            </div>
            <!-- Curved Line 2 -->
            <div id="line2-wrapper" class="line-wrapper">
                <div id="line2" class="curved-line1"></div>
            </div>

            <!-- Stage 3: Cutting Techniques -->
            <div id="stage3-wrapper" class="stage-wrapper">
                <button id="stage3" class="stage3 btn btn-brown rounded-circle" disabled aria-label="Cutting Techniques">
                    <i class="fa-solid fa-tools stage-icon"></i>
                    <span class="stage-text">Techniques</span>
                </button>
            </div>
            <!-- Curved Line 3 -->
            <div id="line3-wrapper" class="line-wrapper">
                <div id="line3" class="curved-line2"></div>
            </div>

            <!-- Stage 4: Practice -->
            <div id="stage4-wrapper" class="stage-wrapper">
                <button id="stage4" class="stage4 btn btn-brown rounded-circle" disabled aria-label="Practice">
                    <i class="fa-solid fa-cut stage-icon"></i>
                    <span class="stage-text">Practice</span>
                </button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center p-3 bg-brown text-light" id="footer">
        <p>&copy; 2024 SonicScholars. All rights reserved.</p>
    </footer>

    <!-- JavaScript -->
    <script src="fash.js"></script>
</body>
</html>
