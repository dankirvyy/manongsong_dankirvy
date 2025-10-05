<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>// LOGIN</title>

<!-- Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Source+Code+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  :root {
    --color-bg: #000;
    --color-panel: #0d0d0d;
    --color-border: #00ff99;
    --color-text-primary: #fff;
    --color-accent-neon: #00ff99;
    --color-input-bg: #222;
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
    color: var(--color-text-primary);
    margin: 0;
  }

  .form-container {
    background-color: var(--color-panel);
    border: 1px solid var(--color-border);
    box-shadow: 0 0 20px var(--color-accent-neon);
    border-radius: 10px;
    padding: 2.5rem 3rem;
    width: 360px;
    position: relative;
  }

  h1 {
    font-family: var(--font-title);
    color: var(--color-accent-neon);
    font-size: 1.8rem;
    letter-spacing: 2px;
    margin-bottom: 2rem;
    text-shadow: 0 0 8px var(--color-accent-neon);
    text-align: center;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 1.2rem;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align label and input to the left */
  }

  label {
    color: var(--color-accent-neon);
    font-size: 0.9rem;
    margin-bottom: 0.4rem;
    text-align: left;
  }

  .input-wrapper {
    position: relative;
    width: 100%;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 0.8rem 2.8rem 0.8rem 1rem;
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
    box-shadow: 0 0 6px var(--color-accent-neon);
  }

  .toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: var(--color-accent-neon);
    font-size: 1rem;
    background: transparent;
    border: none;
  }

  .toggle-password:hover {
    opacity: 0.8;
    transform: translateY(-50%) scale(1.1);
  }

  button[type="submit"] {
    width: 100%;
    padding: 0.8rem;
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
  }

  button[type="submit"]:hover {
    background-color: var(--color-accent-neon);
    color: #000;
    box-shadow: 0 0 15px var(--color-accent-neon);
  }

  .back-link {
    display: block;
    margin-top: 1.5rem;
    color: var(--color-text-primary);
    text-decoration: none;
    font-size: 0.95rem;
    text-align: center;
    transition: color 0.3s ease, text-shadow 0.3s ease;
  }

  .back-link:hover {
    color: var(--color-accent-neon);
    text-shadow: 0 0 10px var(--color-accent-neon),
                 0 0 20px var(--color-accent-neon);
  }

  .error {
    color: #ff3366;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    text-align: center;
  }
</style>
</head>

<body>
  <div class="form-container">
    <h1>// LOGIN</h1>

    <?php if(isset($error)): ?>
      <div class="error"><?=$error;?></div>
    <?php endif; ?>

    <form action="<?=site_url('login');?>" method="post" autocomplete="on">
      <div class="form-group">
        <label for="username">USERNAME OR EMAIL</label>
        <div class="input-wrapper">
          <input type="text" id="username" name="username" required autocomplete="username">
        </div>
      </div>

      <div class="form-group">
        <label for="password">PASSWORD</label>
        <div class="input-wrapper">
          <input type="password" id="password" name="password" required autocomplete="current-password">
          <button type="button" id="togglePassword" class="toggle-password" aria-label="Show password" aria-pressed="false">
            <i class="fa-solid fa-eye-slash"></i>
          </button>
        </div>
      </div>

      <button type="submit">LOGIN</button>
    </form>

    <a href="<?=site_url('register');?>" class="back-link">// Register</a>
  </div>

<script>
  const toggleBtn = document.getElementById('togglePassword');
  const pwd = document.getElementById('password');
  const icon = toggleBtn.querySelector('i');

  toggleBtn.addEventListener('click', () => {
    const isHidden = pwd.type === 'password';
    pwd.type = isHidden ? 'text' : 'password';
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
    toggleBtn.setAttribute('aria-pressed', String(isHidden));
    toggleBtn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
  });
</script>
</body>
</html>