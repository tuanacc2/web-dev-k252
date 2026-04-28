<?php

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <style type="text/tailwindcss">
        </style>
    <body class="h-full flex flex-row">
        <div class="container">
            <h1 class="text-2xl font-bold mb-4">Register</h1>
            <?php if (isset($error_message)): ?>
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    <?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= $base_url ?>/auth/register" class="max-w-sm">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username:</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Address:</label>
                    <input type="text" id="address" name="address" class="w-full px-3 py-2 border rounded">
                </div> 
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Register</button>
            </form>
        </div>
    </body>
</html>