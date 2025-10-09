<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
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
      background: linear-gradient(135deg, #f3e5f5, #e1bee7);
    }

    .create-user {
      width: 400px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(106, 27, 154, 0.15);
      padding: 40px 35px;
      text-align: center;
      transition: 0.3s ease;
    }

    .create-user:hover {
      box-shadow: 0 12px 35px rgba(123, 31, 162, 0.2);
      transform: translateY(-2px);
    }

    .create-user h2 {
      font-size: 1.9em;
      font-weight: 600;
      color: #6a1b9a;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 15px;
      font-size: 1em;
      color: #333;
      background: #f8f9fa;
      border: 1px solid #d7c2e6;
      border-radius: 8px;
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #8e24aa;
      box-shadow: 0 0 0 3px rgba(142, 36, 170, 0.15);
      background: #fff;
    }

    .inputBox input::placeholder {
      color: #999;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(135deg, #8e24aa, #ab47bc);
      color: white;
      font-size: 1.05em;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      letter-spacing: 0.5px;
    }

    button:hover {
      background: linear-gradient(135deg, #7b1fa2, #9c27b0);
      box-shadow: 0 4px 12px rgba(156, 39, 176, 0.25);
      transform: translateY(-1px);
    }

    .link-wrapper {
      text-align: center;
      margin-top: 20px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #8e24aa;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
      color: #6a1b9a;
    }
  </style>
</head>
<body>
  <div class="create-user">
    <h2>Create User</h2>
    <form method="POST" action="<?= site_url('users/create'); ?>">
      <div class="inputBox">
        <input type="text" name="username" placeholder="Username" required value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>

      <div class="inputBox">
        <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>

      <button type="submit">Create User</button>
    </form>

    <div class="link-wrapper">
      <a href="<?= site_url('/users'); ?>">← Return to Home</a>
    </div>
  </div>
</body>
</html>
