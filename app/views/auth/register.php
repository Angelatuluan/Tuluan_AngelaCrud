<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User | Gradient Glass</title>
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

    /* Floating gradient circles for subtle background depth */
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

    /* Glass Card for Create User */
    .create-user {
      position: relative;
      width: 420px;
      padding: 45px 40px;
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

    .create-user h2 {
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
      margin-bottom: 20px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 15px;
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

    /* Button */
    button {
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

    button:hover {
      background: linear-gradient(135deg, #2575fc, #6a11cb);
      transform: translateY(-2px);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
    }

    /* Link Section */
    .link-wrapper {
      text-align: center;
      margin-top: 20px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #fff;
      text-decoration: none;
      opacity: 0.8;
      transition: 0.3s;
    }

    .link-wrapper a:hover {
      opacity: 1;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Floating Gradient Circles -->
  <div class="bg-circle"></div>
  <div class="bg-circle"></div>

  <!-- Create User Card -->
  <div class="create-user">
    <h2>Create User</h2>
    <form method="POST" action="<?= site_url('users/create'); ?>">
      <div class="inputBox">
        <input
          type="text"
          name="username"
          placeholder="Username"
          required
          value="<?= isset($username) ? html_escape($username) : '' ?>"
        />
      </div>

      <div class="inputBox">
        <input
          type="email"
          name="email"
          placeholder="Email"
          required
          value="<?= isset($email) ? html_escape($email) : '' ?>"
        />
      </div>

      <button type="submit">Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">Return to Home</a>
    </div>
  </div>
</body>
</html>
