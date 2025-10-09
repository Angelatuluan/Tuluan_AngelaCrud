<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User | Gradient Glass</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
      from { transform: translateY(0px); }
      to { transform: translateY(-30px); }
    }

    /* Form Card */
    .form-card {
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
      color: #fff;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .form-card h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #fff;
      letter-spacing: 1px;
    }

    .form-group {
      position: relative;
      margin-bottom: 25px;
    }

    .form-group input,
    .form-group select {
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

    .form-group input:focus,
    .form-group select:focus {
      background: rgba(255, 255, 255, 0.25);
      border-color: #fff;
    }

    .form-group input::placeholder {
      color: #e0e0e0;
    }

    /* Password toggle icon */
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

    /* Submit button */
    .btn-submit {
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

    .btn-submit:hover {
      background: linear-gradient(135deg, #2575fc, #6a11cb);
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
    }

    /* Return link */
    .btn-return {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #fff;
      opacity: 0.9;
      font-size: 0.95em;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-return:hover {
      opacity: 1;
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .form-card {
        width: 90%;
        padding: 35px 25px;
      }
    }
  </style>
</head>
<body>
  <!-- Floating background -->
  <div class="bg-circle"></div>
  <div class="bg-circle"></div>

  <!-- Update User Card -->
  <div class="form-card">
    <h2>Update User</h2>
    <form action="<?= site_url('users/update/'.$user['id']) ?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?= html_escape($user['username']); ?>" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" value="<?= html_escape($user['email']); ?>" placeholder="Email" required>
      </div>

      <?php if (!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div class="form-group">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      <?php endif; ?>

      <button type="submit" class="btn-submit">Update User</button>
    </form>

    <a href="<?= site_url('/users'); ?>" class="btn-return">Return to Home</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    if (togglePassword && password) {
      togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
