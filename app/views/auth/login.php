<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Gradient Glass</title>
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
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      overflow: hidden;
    }

    /* Floating gradient circles for depth */
    .bg-circle {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.6;
      animation: float 12s ease-in-out infinite alternate;
      z-index: 0;
    }
    .bg-circle:nth-child(1) {
      width: 250px;
      height: 250px;
      background: #ff9ff3;
      top: 10%;
      left: 15%;
    }
    .bg-circle:nth-child(2) {
      width: 300px;
      height: 300px;
      background: #18dcff;
      bottom: 15%;
      right: 10%;
      animation-delay: 2s;
    }
    @keyframes float {
      from {
        transform: translateY(0px);
      }
      to {
        transform: translateY(-30px);
      }
    }

    /* Login Card */
    .login {
      position: relative;
      width: 380px;
      padding: 50px 40px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
      z-index: 2;
      animation: fadeIn 1.2s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #fff;
      letter-spacing: 1px;
    }

    /* Input Fields */
    .inputBox {
      position: relative;
      margin-bottom: 25px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #fff;
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      outline: none;
      border-radius: 10px;
      transition: 0.3s ease;
    }

    .inputBox input:focus {
      background: rgba(255, 255, 255, 0.25);
      border-color: #fff;
    }

    .inputBox input::placeholder {
      color: #e0e0e0;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #fff;
      opacity: 0.8;
      transition: 0.3s;
    }

    .toggle-password:hover {
      opacity: 1;
    }

    /* Button */
    .login button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
      text-transform: uppercase;
      box-shadow: 0 0 10px rgba(37, 117, 252, 0.5);
    }

    .login button:hover {
      background: linear-gradient(135deg, #2575fc, #6a11cb);
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
    }

    /* Error Message */
    .error-box {
      background: rgba(255, 0, 0, 0.15);
      color: #ffbcbc;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      text-align: center;
      font-size: 0.9em;
      border: 1px solid rgba(255, 100, 100, 0.3);
    }

    .group {
      text-align: center;
      margin-top: 20px;
    }

    .group a {
      font-size: 0.95em;
      color: #fff;
      text-decoration: none;
      opacity: 0.8;
      transition: 0.3s;
    }

    .group a:hover {
      opacity: 1;
      text-decoration: underline;
    }

  </style>
</head>
<body>
  <!-- Floating Gradient Circles -->
  <div class="bg-circle"></div>
  <div class="bg-circle"></div>

  <!-- Login Card -->
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
        Don't have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
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
