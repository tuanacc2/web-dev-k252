<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân - <?= htmlspecialchars($user['username']) ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/admin/css/fontawesome.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!--Robo mono-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <!-- Vollkorn -->
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <!-- Embed Code -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Sick slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <style>

        .font-nunito {
            font-family: 'Nunito', sans-serif;
        }

        .font-vollkorn {
            font-family: 'Vollkorn', serif;
        }

        .font-embed {
            font-family: 'Barlow Condensed', sans-serif;
        }

        .pagebtn {
            color: #C5A25D;
            border: 1px #C5A25D solid;
            border-radius: 8px;
            background-color: transparent;   
        }

        .pagebtn {
            color: white;
            border: none;
            border-radius: 8px;
            background-color: #C5A25D;   
        }
    </style>
</head>

<body class="bg-[#fefbf4] font-nunito">
    <?php require_once 'views/layout/header.php'; ?>

    <div class="max-w-4xl mx-auto my-10 p-6 bg-white shadow-xl rounded-2xl">
        <p class="text-3xl font-bold mb-6 text-gray-800 border-b pb-4 font-vollkorn">Hồ sơ cá nhân</p>

        <form action="<?= SITE_URL ?>/user/profile/update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <input type="hidden" name="avatar_id" id="avatar_id" value="<?= $user['avatar_id'] ?>">
            <input type="hidden" name="username" value="<?= $user['username'] ?>">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex flex-col items-center">
                    <div class="relative group mb-4">
                        <img id="avatar_preview" src="<?= SITE_URL.($user['avatar_url'] ?? '') ?>" alt="Avatar" 
                             class="w-48 h-48 rounded-full object-cover border-4 border-primary shadow-lg"
                             width="400" height="400">
                        <div class="mt-4">
                            <input type="file" name="avatar" class="file-input file-input-bordered file-input-primary w-full max-w-xs" 
                                   onchange="document.getElementById('avatar_preview').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 italic text-center">
                        ID Người dùng: #<?= $user['id'] ?><br>
                        Tên người dùng: <?= $user['username'] ?>
                    </p>
                </div>

                <div class="md:col-span-2 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold">Họ</span></label>
                            <input type="text" name="lastname" value="<?= htmlspecialchars($user['last_name']) ?>" class="input input-bordered w-full">
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold">Tên</span></label>
                            <input type="text" name="firstname" value="<?= htmlspecialchars($user['first_name']) ?>" class="input input-bordered w-full">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold">Email</span></label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="input input-bordered w-full">
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text font-bold">SDT</span></label>
                            <input type="text" name="phone" value="<?= htmlspecialchars($user['phoneNumber']) ?>" class="input input-bordered w-full">
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-bold">Mật khẩu mới</span></label>
                        <input type="password" name="password" placeholder="Để trống nếu không đổi" class="input input-bordered w-full">
                    </div>

                    <div class="flex flex-wrap gap-3 pt-6 border-t mt-6">
                        <button type="submit" class="btn btn-primary px-8 shadow-md">
                            <i class="fa fa-save"></i> Lưu thông tin
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="mt-12 p-6 bg-red-50 rounded-xl border border-red-100">
            <div class="flex flex-wrap gap-4">
                <form action="<?= SITE_URL ?>/user/restricted" method="POST" onsubmit="return confirm('Bạn có chắc muốn tự giới hạn tài khoản trong 24h?')">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-ban"></i> Tự Restricted (24h)
                    </button>
                </form>

                <form action="<?= SITE_URL ?>/user/delete" method="POST" onsubmit="return confirm('CẢNH BÁO: Hành động này sẽ xóa vĩnh viễn tài khoản của bạn. Bạn chắc chắn chứ?')">
                    <button type="submit" class="btn btn-error text-white">
                        <i class="fa fa-trash"></i> Xóa tài khoản vĩnh viễn
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once 'views/layout/footer.php'; ?>
</body>
</html>