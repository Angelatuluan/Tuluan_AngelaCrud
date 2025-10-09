<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Purple Glow</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #a56eff, #7b42f6, #b892ff);
      background-size: 200% 200%;
      animation: gradientFlow 6s ease infinite;
    }

    @keyframes gradientFlow {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login {
      width: 380px;
      padding: 50px 40px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 18px;
      box-shadow: 0 8px 30px rgba(123, 66, 246, 0.2);
      animation: fadeIn 0.8s ease;
      backdrop-filter: blur(8px);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(25px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login h2 {
      text-align: center;
      font-size: 1.9em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #7b42f6;
      letter-spacing: 0.5px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #333;
      background: #f8f6fc;
      border: 1px solid #d5c9ff;
      outline: none;
      border-radius: 10px;
      transition: 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #7b42f6;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(123, 66, 246, 0.15);
    }

    .inputBox input::placeholder {
      color: #999;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #7b42f6;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #5d2ed2;
    }

    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #7b42f6, #9d6cff);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .login button:hover {
      background: linear-gradient(135deg, #6930c3, #8a4ef8);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(123, 66, 246, 0.3);
    }

    .error-box {
      background: rgba(147, 112, 219, 0.08);
      color: #5d2ed2;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid rgba(147, 112, 219, 0.15);
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #7b42f6;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #5d2ed2;
    }
  </style>
</head>
<body>

  <div class="login">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="inputBox">
        <input type="text" placeholder="Username" name="username" required />
      </div>

      <div class="inputBox">
        <input type="password" placeholder="Password" name="password" id="password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="group">
      <p style="font-size: 0.9em;">
        Don't have an account?
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>
</html>
