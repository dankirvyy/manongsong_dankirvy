<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Grid | System Console</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /*
        -- CSS Variables for a centralized theme --
        */
        :root {
            --color-bg-primary: #0a0a0a;
            --color-bg-secondary: rgba(18, 18, 18, 0.7);
            --color-text-primary: #f0f0f0;
            --color-accent-neon: #00ff80;
            --color-accent-pink: #ff3366;
            --color-border: #333;
            --color-input-bg: #181818;
            --color-table-header-bg: #1e1e1e;
            --color-table-row-hover: #1e1e1e;
            --font-display: 'Orbitron', sans-serif;
            --font-mono: 'Roboto Mono', monospace;
            --shadow-neon: 0 0 10px rgba(0, 255, 128, 0.5);
            --shadow-neon-pink: 0 0 10px rgba(255, 51, 102, 0.5);
        }

        body {
            background-color: var(--color-bg-primary);
            color: var(--color-text-primary);
            font-family: var(--font-mono);
            margin: 0;
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-image:
                linear-gradient(to right, rgba(0, 255, 128, 0.07) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 255, 128, 0.07) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin-top: 2rem;
            background: var(--color-bg-secondary);
            backdrop-filter: blur(8px);
            border: 1px solid var(--color-border);
            box-shadow: var(--shadow-neon);
            padding: 2.5rem;
            border-radius: 12px;
            position: relative;
            padding-bottom: 5rem; 
        }

        h1 {
            font-family: var(--font-display);
            font-size: clamp(1.5rem, 5vw, 2.5rem);
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: var(--color-accent-neon);
            text-shadow: var(--shadow-neon);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .header-controls-container {
            display: flex;
            justify-content: space-between; 
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .search-container {
            display: flex;
            align-items: center;
            flex-grow: 1; 
            max-width: 600px; 
        }
        
        .search-form {
             display:flex; 
             align-items:center; 
             width:100%;
        }

        #searchBox {
            width: 100%;
            padding: 0.7rem 1rem;
            border-radius: 6px;
            border: 1px solid var(--color-border);
            background: var(--color-input-bg);
            color: var(--color-text-primary);
            font-family: var(--font-mono);
            font-size: 1rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        #searchBox:focus {
            outline: none;
            border-color: var(--color-accent-neon);
            box-shadow: 0 0 5px var(--color-accent-neon);
        }

        .search-btn {
            padding: 0.7rem 1.2rem;
            border: 2px solid var(--color-accent-neon);
            background: transparent;
            color: var(--color-accent-neon);
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 6px;
            cursor: pointer;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            margin-left: 0.5rem;
        }

        .search-btn:hover {
            background-color: var(--color-accent-neon);
            color: var(--color-bg-primary);
            box-shadow: 0 0 20px var(--color-accent-neon);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
            border-radius: 8px;
        }

        th, td {
            padding: 1rem;
            border-bottom: 1px solid var(--color-border);
        }

        thead {
            background-color: var(--color-table-header-bg);
        }
        
        /* UPDATED: Center the text in ALL header cells */
        th {
            font-weight: 700;
            color: var(--color-accent-neon);
            text-transform: uppercase;
            text-align: center; /* This centers all the table headers */
        }
        
        /* You might want to center the data cells too for a fully centered column look */
        /* If you want the data (ID, Names, Email) left-aligned, remove the following CSS block */
        tbody td:not(:last-child) {
            text-align: center;
        }

        /* Keep the Action links readable by left-aligning the last cell (the actions column) */
        td:last-child {
            text-align: center; 
        }

        tr {
            transition: background-color 0.3s ease;
        }
        
        tbody tr:hover {
            background-color: var(--color-table-row-hover);
            box-shadow: inset 2px 0 0 0 var(--color-accent-neon);
        }

        .action-links {
            white-space: nowrap;
        }

        .action-links a {
            text-decoration: none;
            color: var(--color-accent-neon);
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }
        
        .action-links a:hover {
            border-color: var(--color-accent-neon);
            box-shadow: 0 0 5px var(--color-accent-neon);
        }

        .action-links a.delete-link {
            color: var(--color-accent-pink);
        }
        
        .action-links a.delete-link:hover {
            border-color: var(--color-accent-pink);
            box-shadow: var(--shadow-neon-pink);
        }

        .create-record-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: transparent;
            color: var(--color-accent-neon);
            text-decoration: none;
            border: 2px solid var(--color-accent-neon);
            border-radius: 8px;
            font-weight: 700;
            font-family: var(--font-display);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            text-transform: uppercase;
            white-space: nowrap; 
        }

        .create-record-btn:hover {
            background-color: var(--color-accent-neon);
            color: var(--color-bg-primary);
            box-shadow: 0 0 20px var(--color-accent-neon);
        }

        .pagination-container {
            margin-top: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .pagination-container a,
        .pagination-container strong {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            border: 2px solid var(--color-accent-neon);
            background: transparent;
            color: var(--color-accent-neon);
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 6px;
            text-decoration: none;
            text-shadow: 0 0 5px var(--color-accent-neon);
            box-shadow: 0 0 10px rgba(0, 255, 128, 0.4);
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .pagination-container a:hover {
            background-color: var(--color-accent-neon);
            color: var(--color-bg-primary);
            box-shadow: 0 0 20px var(--color-accent-neon);
        }

        .pagination-container strong {
            background-color: var(--color-accent-neon);
            color: var(--color-bg-primary);
            box-shadow: 0 0 20px var(--color-accent-neon);
            cursor: default;
        }
        
        .logout-container {
            position: absolute;
            bottom: 1.5rem; 
            right: 2.5rem; 
            z-index: 10;
        }
        
        .logout-btn {
            background-color: var(--color-accent-pink); 
            border-color: var(--color-accent-pink) !important; 
            box-shadow: 0 0 10px rgba(255, 51, 102, 0.4) !important;
            color: var(--color-bg-primary); 
            font-family: var(--font-display);
            font-weight: 700;
            text-transform: uppercase;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            text-shadow: none; 
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }
        
        .logout-btn:hover {
            background-color: #ff5e8c !important; 
            box-shadow: 0 0 20px rgba(255, 51, 102, 0.8) !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Data Grid // Access Terminal</h1>
        
        <div class="header-controls-container">
            <div class="search-container">
                <form action="<?= site_url('users/show'); ?>" method="get" class="search-form">
                    <?php
                    $q = '';
                    if(isset($_GET['q'])) {
                        $q = $_GET['q'];
                    }
                    ?>
                    <input type="text" name="q" placeholder="Search records..." value="<?= html_escape($q); ?>" id="searchBox">
                    <button type="submit" class="search-btn">Search</button>
                </form>
            </div>
            
            <?php 
                $current_role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; 
            ?>
            <?php if ($current_role === 'admin'): ?>
            <a href="<?= site_url('users/create'); ?>" class="create-record-btn" style="margin-left: 2rem;">Create New Record</a>
            <?php endif; ?>
        </div>
        
        <div class="table-responsive">
            <table id="studentsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <?php if ($current_role === 'admin'): ?>
                        <th>Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (html_escape($users) as $user): ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['last_name']; ?></td>
                            <td><?= $user['first_name']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <?php if ($current_role === 'admin'): ?>
                            <td class="action-links">
                                <a href="<?= site_url('users/update/'.$user['id']); ?>">Update</a> |
                                <a href="<?= site_url('users/delete/'.$user['id']); ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                            <?php else: ?>
                            <td></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            <?php if (isset($page)) echo $page; ?>
        </div>
        
        <div class="logout-container">
            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="<?= site_url('logout'); ?>" method="post" style="display: inline;">
                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>