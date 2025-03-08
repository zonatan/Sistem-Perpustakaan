<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan Tondano</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <style>
        body {
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }
        
        .login-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px 25px;
            width: 100%;
            max-width: 360px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
            font-size: 1.5rem;
            color: #495057;
            margin-bottom: 1.2rem;
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        .form-group label {
            font-size: 0.85rem;
            color: #495057;
            display: block;
            margin-bottom: 0.3rem;
            font-weight: 500;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-login {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .footer-text {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 1rem;
        }

        .footer-text a {
            color: #007bff;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        .credentials {
            margin-top: 1.5rem;
            font-size: 0.85rem;
            text-align: left;
        }

        .credentials h6 {
            margin: 0.2rem 0;
            font-weight: normal;
            color: #6c757d;
        }

        .btn-register {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Perpustakaan</h2>
        
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $data['error']; ?>
            </div>
        <?php endif; ?>
        
        <form action="<?= BASEURL; ?>/login/authenticate" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <div class="credentials">
            <h6>Admin Username: zon</h6>
            <h6>Admin Password: admin123</h6>
            <h6>Petugas Username: sam</h6>
            <h6>Petugas Password: sam123</h6>
        </div>

        <a href="http://localhost/perpustakaanA2/public/daftar/" class="btn btn-register">Link Pendaftaran Member</a>
    </div>
    
    <script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
</body>
</html>
