<?php

$user = session_id("user_id");

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Post List</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
        </style>
    <body class="h-full flex flex-row">
        <nav class="bg-sky-100 h-full flex flex-col p-4">
            <button class="" onclick="toggleSidebar()"></button>
            <a href="/about"        class="m-2 p-2 hover:bg-sky-200 rounded-full">About</a>
            <a href="/contact"      class="m-2 p-2 hover:bg-sky-200 rounded-full">Contact</a>
            <a href="/help"         class="m-2 p-2 hover:bg-sky-200 rounded-full">Help</a>
            <a href="/auth/login"   class="m-2 p-2 hover:bg-sky-200 rounded-full">Login</a>
            <a href="/profile">
                <img 
                    src="<?= $user["avatar"] ?? "/assets/default_user_avatar/avatar1.jpg" ?>" 
                    alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
            <a href="/setting">
                <img src="" alt="setting" class="w-10 h-10 rounded-full">
            </a>
        </nav>
        <main class="h-full flex-1 p-4">
            <header>
                <h1>Post List</h1>
            </header>
            <div>
                <?php foreach ($posts as $post): ?>
                    <div class="border p-4 mb-4">
                        <h2 class="text-xl font-bold"><?= htmlspecialchars($post['title']) ?></h2>
                        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
        <script>
            function toggleSidebar() {
                // Implement sidebar toggle functionality here
            }  
        </script>     
    </body>
</html>