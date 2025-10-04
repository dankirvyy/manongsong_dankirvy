<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | System Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-bg-primary: #0a0a0a;
            --color-bg-secondary: rgba(18, 18, 18, 0.7);
            --color-text-primary: #f0f0f0;
            --color-accent-neon: #00ff80;
            --color-danger-neon: #ff3366;
            --color-border: #333;
            --color-input-bg: #2d2d2d;
            --font-display: 'Orbitron', sans-serif;
            --font-mono: 'Roboto Mono', monospace;
            --shadow-neon: 0 0 10px rgba(0, 255, 128, 0.5);
        }

        body {
            background-color: var(--color-bg-primary);
            color: var(--color-text-primary);
            font-family: var(--font-mono);
            margin: 0;
            padding: 2rem 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image:
                linear-gradient(to right, rgba(0, 255, 128, 0.07) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 255, 128, 0.07) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .form-container {
            width: 90%;
            max-width: 500px;
            background: var(--color-bg-secondary);
            backdrop-filter: blur(8px);
            border: 1px solid var(--color-border);
            box-shadow: var(--shadow-neon);
            padding: 2.5rem;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1 {
            font-family: var(--font-display);
            font-size: clamp(1.5rem, 5vw, 2.2rem);
            font-weight: 700;
            margin-bottom: 2.5rem;
            color: var(--color-accent-neon);
            text-shadow: var(--shadow-neon);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            width: 100%;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        label {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--color-accent-neon);
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem 1rem;
            background-color: var(--color-input-bg);
            border: 1px solid var(--color-border);
            border-radius: 6px;
            color: var(--color-text-primary);
            font-family: var(--font-mono);
            font-size: 1rem;
            box-sizing: border-box;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--color-accent-neon);
            box-shadow: 0 0 5px var(--color-accent-neon);
        }

        .error {
            color: var(--color-danger-neon);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 1rem 0;
            background-color: transparent;
            color: var(--color-accent-neon);
            border: 2px solid var(--color-accent-neon);
            border-radius: 8px;
            font-weight: 700;
            font-size: clamp(1rem, 3vw, 1.2rem);
            font-family: var(--font-display);
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-top: 1rem;
        }

        button[type="submit"]:hover {
            background-color: var(--color-accent-neon);
            color: var(--color-bg-primary);
            box-shadow: 0 0 20px var(--color-accent-neon);
        }

        .back-link {
            display: inline-block;
            margin-top: 2rem;
            text-decoration: none;
            color: var(--color-text-primary);
            font-size: 0.9rem;
            font-weight: 400;
            transition: color 0.2s ease;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .back-link:hover {
            color: var(--color-accent-neon);
            border-color: var(--color-accent-neon);
            box-shadow: 0 0 5px var(--color-accent-neon);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>// LOGIN</h1>
        <?php if(isset($error)): ?>
            <div class="error"><?=$error;?></div>
        <?php endif; ?>
        <form action="<?=site_url('login');?>" method="post">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group" style="position: relative;">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span id="togglePassword" style="position: absolute; right: 10px; top: 35px; cursor: pointer; color: var(--color-accent-neon); font-size: 1.2rem;">👁️</span>
            </div>

            <button type="submit">Login</button>
        </form>
        <a href="<?=site_url('register');?>" class="back-link">// Register</a>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    </script>
</body>
</html>
