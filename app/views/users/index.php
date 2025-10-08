<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Students Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      background: #0f0f1a;
      color: #fff;
      overflow-x: hidden;
      position: relative;
    }

    /* Floating background circles (same as register page) */
    .circles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .circles li {
      position: absolute;
      display: block;
      list-style: none;
      width: 25px;
      height: 25px;
      background: rgba(255, 255, 255, 0.1);
      animation: animate 20s linear infinite;
      bottom: -150px;
      border-radius: 50%;
    }

    .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-duration: 15s; }
    .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-duration: 10s; }
    .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-duration: 20s; }
    .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-duration: 18s; }
    .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-duration: 12s; }
    .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-duration: 25s; }
    .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-duration: 35s; }
    .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-duration: 45s; }
    .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-duration: 11s; }
    .circles li:nth-child(10){ left: 85%; width: 150px; height: 150px; animation-duration: 30s; }

    @keyframes animate {
      0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
      100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
    }

    .dashboard-container {
      position: relative;
      max-width: 1200px;
      margin: 80px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.07);
      border-radius: 20px;
      backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 0 30px rgba(0, 255, 255, 0.3);
      z-index: 1;
    }

    .dashboard-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .dashboard-header h2 {
      font-size: 2em;
      font-weight: 700;
      color: #00ffa3;
      text-shadow: 0 0 12px #00ffa3;
    }

    .logout-btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      color: #fff;
      font-weight: 600;
      box-shadow: 0 0 10px rgba(255, 75, 43, 0.5);
      transition: 0.3s;
    }
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 25px rgba(255, 65, 108, 0.8);
    }

    .user-status {
      background: rgba(0, 255, 255, 0.1);
      border: 1px solid rgba(0, 255, 255, 0.2);
      padding: 12px 18px;
      border-radius: 10px;
      margin-bottom: 25px;
      color: #00e5ff;
      font-weight: 500;
    }

    .user-status.error {
      background: rgba(255, 65, 108, 0.1);
      border-color: rgba(255, 65, 108, 0.3);
      color: #ff416c;
    }

    .table-card {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      padding: 25px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
    }

    table {
      width: 100%;
      text-align: center;
      border-collapse: collapse;
      color: #fff;
    }

    th {
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      text-transform: uppercase;
      font-weight: 600;
      padding: 12px;
    }

    td {
      background: rgba(255,255,255,0.05);
      padding: 10px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    a.btn-action {
      padding: 6px 14px;
      border-radius: 6px;
      font-size: 13px;
      text-decoration: none;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
      margin: 0 2px;
    }

    a.btn-update {
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      box-shadow: 0 0 10px rgba(0,255,255,0.4);
    }
    a.btn-update:hover {
      box-shadow: 0 0 20px rgba(0,255,255,0.8);
    }

    a.btn-delete {
      background: linear-gradient(90deg, #ff416c, #ff4b2b);
      box-shadow: 0 0 10px rgba(255,65,108,0.4);
    }
    a.btn-delete:hover {
      box-shadow: 0 0 20px rgba(255,65,108,0.8);
    }

    .btn-create {
      display: block;
      width: 100%;
      padding: 14px;
      border: none;
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      color: #0f0f1a;
      font-size: 1.1em;
      border-radius: 10px;
      font-weight: 600;
      transition: 0.3s;
      text-align: center;
      margin-top: 25px;
      text-transform: uppercase;
      text-decoration: none;
      box-shadow: 0 0 15px rgba(0,255,255,0.4);
    }
    .btn-create:hover {
      opacity: 0.9;
      box-shadow: 0 0 25px rgba(0,255,255,0.7);
    }

    .search-form input {
      border-radius: 8px;
      border: 1px solid rgba(0,255,255,0.4);
      background: rgba(255,255,255,0.08);
      color: #fff;
    }
    .search-form input:focus {
      outline: none;
      border-color: #00e5ff;
      box-shadow: 0 0 10px #00e5ff;
    }

    .search-form button {
      background: linear-gradient(90deg, #00ffa3, #00e5ff);
      border: none;
      color: #0f0f1a;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
      transition: 0.3s;
    }
    .search-form button:hover {
      box-shadow: 0 0 15px #00e5ff;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 25px;
    }
  </style>
</head>
<body>
  <ul class="circles">
    <li></li><li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li><li></li>
  </ul>

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h2><?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>
      <a href="<?= site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
    </div>

    <?php if(!empty($logged_in_user)): ?>
      <div class="user-status">
        <strong>Welcome:</strong> <?= html_escape($logged_in_user['username']); ?>
      </div>
    <?php else: ?>
      <div class="user-status error">
        Logged in user not found
      </div>
    <?php endif; ?>

    <div class="table-card">
      <form action="<?= site_url('users'); ?>" method="get" class="d-flex mb-3 search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input name="q" type="text" class="form-control me-2" placeholder="Search" value="<?= html_escape($q); ?>">
        <button type="submit">Search</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($user as $user): ?>
          <tr>
            <td><?= html_escape($user['id']); ?></td>
            <td><?= html_escape($user['username']); ?></td>
            <td><?= html_escape($user['email']); ?></td>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <td>*******</td>
              <td><?= html_escape($user['role']); ?></td>
            <?php endif; ?>
            <td>
              <a href="<?= site_url('/users/update/'.$user['id']); ?>" class="btn-action btn-update">Update</a>
              <a href="<?= site_url('/users/delete/'.$user['id']); ?>" class="btn-action btn-delete">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>
    </div>

    <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>
