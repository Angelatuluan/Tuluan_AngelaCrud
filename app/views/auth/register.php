<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Purple Glow</title>
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

    .register {
      width: 420px;
      padding: 45px 40px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 18px;
      border: 1px solid rgba(210, 195, 255, 0.4);
      box-shadow: 0 8px 30px rgba(123, 66, 246, 0.25);
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

    .register h2 {
      text-align: center;
      font-size: 1.9em;
      font-weight: 600;
      margin-bottom: 25px;
      color: #7b42f6;
      letter-spacing: 0.5px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input,
    .inputBox select {
      width: 100%;
      padding: 14px 45px 14px 15px;
      font-size: 1em;
      color: #333;
      background: #f8f6fc;
      border: 1px solid #d5c9ff;
      outline: none;
      border-radius: 10px;
      transition: 0.3s ease;
      appearance: none;
    }

    .inputBox input:focus,
    .inputBox select:focus {
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

    .register button {
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

    .register button:hover {
      background: linear-gradient(135deg, #6930c3, #8a4ef8);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(123, 66, 246, 0.3);
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

  <div class="register">
    <h2>Create Account</h2>

    <form method="POST" action="<?= site_url('auth/register'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required />
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required />
      </div>

      <div class="inputBox">
        <input type="password" id="password" name="password" placeholder="Password" required />
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <div class="inputBox">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required />
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="inputBox">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit">Register</button>
    </form>

    <div class="group">
      <p>Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a></p>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener("click", function () {
        const type = input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
      });
    }

    toggleVisibility("togglePassword", "password");
    toggleVisibility("toggleConfirmPassword", "confirmPassword");
  </script>
</body>
</html>
