<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>// UPDATE USER | System Console</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Source+Code+Pro&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --color-bg: #000;
      --color-panel: #0d0d0d;
      --color-border: #00ff99;
      --color-text-primary: #fff;
      --color-accent-neon: #00ff99;
      --color-input-bg: #1a1a1a;
      --font-title: 'Orbitron', sans-serif;
      --font-mono: 'Source Code Pro', monospace;
    }

    body {
      background-color: var(--color-bg);
      background-image: radial-gradient(circle at center, #001a0a 0%, #000 80%);
      font-family: var(--font-mono);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: var(--color-text-primary);
      padding: 1rem;
    }

    .form-container {
      background-color: var(--color-panel);
      border: 1px solid var(--color-border);
      box-shadow: 0 0 25px var(--color-accent-neon);
      border-radius: 12px;
      padding: 2.5rem 3rem;
      width: 400px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      font-family: var(--font-title);
      color: var(--color-accent-neon);
      font-size: 1.8rem;
      letter-spacing: 2px;
      margin-bottom: 2rem;
      text-shadow: 0 0 10px var(--color-accent-neon);
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.3rem;
    }

    .form-group {
      text-align: left;
    }

    label {
      display: block;
      color: var(--color-accent-neon);
      font-size: 0.9rem;
      margin-bottom: 0.4rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 0.9rem 1rem;
      background-color: var(--color-input-bg);
      border: 1px solid var(--color-border);
      border-radius: 6px;
      color: var(--color-text-primary);
      font-family: var(--font-mono);
      font-size: 1rem;
      box-sizing: border-box;
      transition: 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: var(--color-accent-neon);
      box-shadow: 0 0 8px var(--color-accent-neon);
    }

    button[type="submit"] {
      width: 100%;
      padding: 0.9rem;
      font-family: var(--font-title);
      font-size: 1.1rem;
      color: var(--color-accent-neon);
      background-color: transparent;
      border: 2px solid var(--color-accent-neon);
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
      text-shadow: 0 0 10px var(--color-accent-neon);
      margin-top: 0.5rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    button[type="submit"]:hover {
      background-color: var(--color-accent-neon);
      color: #000;
      box-shadow: 0 0 18px var(--color-accent-neon);
    }

    .back-link {
      display: inline-block;
      margin-top: 1.8rem;
      color: var(--color-text-primary);
      text-decoration: none;
      font-size: 0.95rem;
      transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .back-link:hover {
      color: var(--color-accent-neon);
      text-shadow: 0 0 10px var(--color-accent-neon), 0 0 20px var(--color-accent-neon);
    }

    /* RESPONSIVE DESIGN */
    @media (max-width: 480px) {
      .form-container {
        width: 100%;
        padding: 1.8rem;
        box-shadow: 0 0 15px var(--color-accent-neon);
      }

      h1 {
        font-size: 1.4rem;
        letter-spacing: 1px;
      }

      button[type="submit"] {
        font-size: 1rem;
      }
    }

    @media (max-height: 600px) {
      body {
        align-items: flex-start;
        padding-top: 3rem;
      }
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h1>// UPDATE USER_REC</h1>

    <form action="<?=site_url('users/update/'.$user['id']);?>" method="post">
      <div class="form-group">
        <label for="last_name">LAST NAME</label>
        <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>" required>
      </div>

      <div class="form-group">
        <label for="first_name">FIRST NAME</label>
        <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>" required>
      </div>

      <div class="form-group">
        <label for="email">EMAIL</label>
        <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>" required>
      </div>

      <button type="submit">UPDATE RECORD</button>
    </form>

    <a href="<?=site_url('users/show');?>" class="back-link">// Back to Dashboard</a>
  </div>
</body>
</html>