<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User | System Console</title>

  <!-- Fonts & Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Source+Code+Pro&display=swap" rel="stylesheet" />

  <style>
    :root {
      --color-bg: #000;
      --color-panel: #0d0d0d;
      --color-border: #00ff99;
      --color-text: #fff;
      --color-accent: #00ff99;
      --font-title: 'Orbitron', sans-serif;
      --font-body: 'Source Code Pro', monospace;
    }

    body {
      background-color: var(--color-bg);
      background-image: radial-gradient(circle at center, #001a0a 0%, #000 80%);
      color: var(--color-text);
      font-family: var(--font-body);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: var(--color-panel);
      border: 1px solid var(--color-border);
      box-shadow: 0 0 20px var(--color-accent);
      border-radius: 10px;
      padding: 2.5rem 3rem;
      width: 400px;
      text-align: center;
      position: relative;
    }

    h1 {
      font-family: var(--font-title);
      color: var(--color-accent);
      font-size: 1.8rem;
      letter-spacing: 2px;
      margin-bottom: 2rem;
      text-shadow: 0 0 8px var(--color-accent);
      text-transform: uppercase;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.4rem;
      width: 100%;
    }

    label {
      display: block;
      text-align: left;
      margin-bottom: 0.3rem;
      color: var(--color-accent);
      font-size: 0.9rem;
      text-transform: uppercase;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 0.8rem 1rem;
      background-color: #222;
      border: 1px solid var(--color-border);
      border-radius: 6px;
      color: var(--color-text);
      font-family: var(--font-body);
      font-size: 1rem;
      box-sizing: border-box;
      transition: 0.3s ease;
    }

    input:focus {
      outline: none;
      border-color: var(--color-accent);
      box-shadow: 0 0 6px var(--color-accent);
    }

    button[type="submit"] {
      width: 100%;
      padding: 0.8rem;
      font-family: var(--font-title);
      font-size: 1.1rem;
      color: var(--color-accent);
      background-color: transparent;
      border: 2px solid var(--color-accent);
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
      text-shadow: 0 0 10px var(--color-accent);
      text-transform: uppercase;
      margin-top: 0.5rem;
    }

    button[type="submit"]:hover {
      background-color: var(--color-accent);
      color: #000;
      box-shadow: 0 0 15px var(--color-accent);
    }

    .back-link {
      display: block;
      margin-top: 1.5rem;
      color: var(--color-text);
      text-decoration: none;
      font-size: 0.95rem;
      transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    .back-link:hover {
      color: var(--color-accent);
      text-shadow: 0 0 10px var(--color-accent),
                   0 0 20px var(--color-accent);
    }

    @media (max-width: 420px) {
      .form-container {
        width: 90%;
        padding: 2rem;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>// CREATE USER_REC</h1>

    <form action="<?=site_url('users/create');?>" method="post">
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required>
      </div>

      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <button type="submit">Submit Record</button>
    </form>

    <a href="<?=site_url('users/show');?>" class="back-link">// Back to Dashboard</a>
  </div>
</body>
</html>