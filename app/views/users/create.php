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
      background: linear-gradient(135deg, #f7f4ff 0%, #ebe3ff 100%);
    }

    .create-user {
      background: #fff;
      border-radius: 16px;
      padding: 40px 35px;
      width: 400px;
      box-shadow: 0 8px 25px rgba(120, 90, 200, 0.15);
      transition: all 0.3s ease;
    }

    .create-user:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(120, 90, 200, 0.25);
    }

    .create-user h2 {
      text-align: center;
      font-size: 1.9em;
      font-weight: 600;
      color: #5b3cc4;
      margin-bottom: 25px;
      letter-spacing: 0.5px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .inputBox input {
      width: 100%;
      padding: 14px 16px;
      font-size: 1em;
      color: #333;
      background: #f9f9ff;
      border: 1px solid #d9d3f7;
      border-radius: 10px;
      transition: 0.25s;
    }

    .inputBox input:focus {
      border-color: #7b5cf7;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(123, 92, 247, 0.15);
      outline: none;
    }

    .inputBox input::placeholder {
      color: #aaa;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(90deg, #7b5cf7, #b57aff);
      color: #fff;
      font-size: 1.05em;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    button:hover {
      background: linear-gradient(90deg, #6942f5, #a964ff);
      box-shadow: 0 0 12px rgba(123, 92, 247, 0.3);
    }

    .link-wrapper {
      text-align: center;
      margin-top: 18px;
    }

    .link-wrapper a {
      font-size: 0.95em;
      color: #7b5cf7;
      text-decoration: none;
      transition: 0.3s;
    }

    .link-wrapper a:hover {
      text-decoration: underline;
      color: #5b3cc4;
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
      <a href="<?= site_url('/users'); ?>">Return to Home</a>
    </div>
  </div>
</body>
</html>
