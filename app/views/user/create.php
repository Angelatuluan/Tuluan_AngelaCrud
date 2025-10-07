<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create User</title>
<style>
    body {
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f9f9fb;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .form-container {
        background: #fff;
        padding: 36px 40px;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
        width: 380px;
        animation: fadeIn 0.5s ease-in-out;
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 28px;
        font-size: 2rem;
        font-weight: 700;
        color: #5b21b6; /* subtle purple */
        letter-spacing: 0.5px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-top: 16px;
        margin-bottom: 6px;
        color: #5b21b6;
    }

    input[type="text"], input[type="email"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #d1c4e9; /* light purple border */
        border-radius: 8px;
        outline: none;
        background: #fdfaff;
        box-shadow: 0 2px 6px rgba(124, 58, 237, 0.1);
        transition: all 0.2s ease;
        font-size: 15px;
    }

    input[type="text"]:focus, input[type="email"]:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 8px rgba(124, 58, 237, 0.3);
    }

    input[type="submit"] {
        margin-top: 28px;
        width: 100%;
        padding: 14px;
        background-color: #7c3aed; /* purple button */
        color: #fff;
        font-size: 1rem;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(124, 58, 237, 0.3);
    }

    input[type="submit"]:hover {
        background-color: #5b21b6;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
</head>
<body>
<div class="form-container">
    <h1>Create User</h1>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" value="Submit User">
    </form>
</div>
</body>
</html>
