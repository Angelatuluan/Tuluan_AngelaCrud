<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: radial-gradient(circle at top left, #1a1b2e, #151627, #0f1021);
      overflow: hidden;
      position: relative;
    }

    /* Subtle floating glow */
    body::before,
    body::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      filter: blur(180px);
      opacity: 0.4;
      animation: float 10s infinite alternate ease-in-out;
    }

    body::before {
      width: 400px;
      height: 400px;
      background: #b388ff;
      top: -120px;
      left: -150px;
    }

    body::after {
      width: 500px;
      height: 500px;
      background: #7f7fff;
      bottom: -160px;
      right: -180px;
      animation-delay: 3s;
    }

    @keyframes float {
      from { transform: translateY(0); }
      to { transform: translateY(50px); }
    }

    /* Glassmorphic card */
    .form-card {
      position: relative;
      width: 380px;
      padding: 40px;
      border-radius: 15px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 25px rgba(179,136,255,0.3),
                  0 0 50px rgba(127,127,255,0.2);
      text-align: center;
      z-index: 1;
    }

    .form-card h1 {
      font-size: 2em;
      color: #d0b3ff;
      font-weight: 700;
      margin-bottom: 25px;
      text-shadow: 0 0 12px #b388ff;
    }

    .form-group {
      position: relative;
      margin-bottom: 18px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      font-size: 1em;
      border-radius: 8px;
      border: 2px solid transparent;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      transition: 0.3s;
    }

    .form-group input::placeholder {
      color: #bdbdbd;
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: #b388ff;
      box-shadow: 0 0 10px #b388ff, 0 0 20px #7f7fff;
      background: rgba(255, 255, 255, 0.15);
    }

    /* Password eye icon */
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #b388ff;
      cursor: pointer;
      transition: 0.3s;
    }

    .toggle-password:hover {
      color: #d0b3ff;
    }

    /* Button */
    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(90deg, #b388ff, #7f7fff);
      color: #000;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 0 15px rgba(179,136,255,0.6);
      transition: 0.3s;
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 0 25px rgba(127,127,255,0.8),
                  0 0 45px rgba(179,136,255,0.6);
    }

    /* Return link */
    .btn-return {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 18px;
      border-radius: 8px;
      color: #b388ff;
      text-decoration: none;
      border: 1px solid #b388ff;
      transition: 0.3s;
      font-weight: 500;
    }

    .btn-return:hover {
      background: #b388ff;
      color: #000;
      box-shadow: 0 0 12px #b388ff;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .form-card {
        width: 90%;
        padding: 25px;
      }
    }
  </style>
</head>
<body>
  <div class
