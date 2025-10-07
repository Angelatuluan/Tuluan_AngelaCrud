<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
    body {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f9f9fb;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .top-bar {
        width: 90%;
        margin: 32px auto 16px auto;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .create-btn {
        background-color: #7c3aed; /* subtle purple */
        color: #fff;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        text-decoration: none;
        box-shadow: 0 2px 6px rgba(124, 58, 237, 0.3);
        transition: all 0.2s ease;
    }

    .create-btn:hover {
        background-color: #5b21b6;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
    }

    h1 {
        text-align: center;
        margin: 24px 0;
        font-size: 2rem;
        font-weight: 700;
        color: #5b21b6;
        letter-spacing: 0.5px;
    }

    .table-container {
        width: 95%;
        margin: 0 auto 32px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        padding: 24px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        color: #333;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }

    th, td {
        padding: 16px 20px;
        text-align: left;
    }

    th {
        background-color: #ede9fe; /* light purple */
        color: #5b21b6;
        font-weight: 600;
        font-size: 1rem;
    }

    tr:nth-child(even) {
        background: #f7f6fb;
    }

    tr:nth-child(odd) {
        background: #fff;
    }

    tr:hover {
        background: #f3f0ff;
    }

    .action-btn {
        text-decoration: none;
        padding: 6px 16px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.9rem;
        margin-right: 6px;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .action-btn.edit {
        background-color: #a78bfa;
        color: #fff;
    }

    .action-btn.edit:hover {
        background-color: #7c3aed;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(124, 58, 237, 0.3);
    }

    .action-btn.delete {
        background-color: #ef4444;
        color: #fff;
    }

    .action-btn.delete:hover {
        background-color: #b91c1c;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Search bar styling */
    .table-container form input.form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 8px 12px;
    }

    .table-container form button.btn {
        border-radius: 8px;
        padding: 8px 16px;
        background-color: #5b21b6;
        border: none;
        color: #fff;
        margin-left: 8px;
        transition: all 0.2s ease;
    }

    .table-container form button.btn:hover {
        background-color: #7c3aed;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(124, 58, 237, 0.3);
    }
</style>

</head>
<body>
    <div class="top-bar">
        <a href="<?= site_url('user/create'); ?>" class="create-btn">+ Create User</a>
    </div>
    <h1>User List</h1>
    <div class="table-container">
        <form action="<?=site_url('user');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach (html_escape($index) as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <a href="<?= site_url('user/update/'.$user['id']); ?>" class="action-btn edit">Edit</a>
                        <a href="<?= site_url('user/delete/'.$user['id']); ?>" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php 
        echo $page;?>
    </div>
</body>
</html>
