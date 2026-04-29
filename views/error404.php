<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="<?= BASE_DIR ?? '' ?>/assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_DIR ?? '' ?>/assets/admin/css/fontawesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 60px 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-code {
            font-size: 120px;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            line-height: 1;
        }

        .error-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin: 20px 0 10px;
        }

        .error-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .error-icon {
            font-size: 80px;
            color: #667eea;
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .btn-custom {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-secondary-custom {
            background: #f0f0f0;
            color: #333;
            border: 2px solid #ddd;
        }

        .btn-secondary-custom:hover {
            background: #e8e8e8;
            border-color: #bbb;
            color: #333;
        }

        .suggestions {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 2px solid #f0f0f0;
            text-align: left;
        }

        .suggestions h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .suggestions ul {
            list-style: none;
            padding-left: 0;
        }

        .suggestions li {
            color: #666;
            padding: 8px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .suggestions li:before {
            content: "→";
            color: #667eea;
            margin-right: 10px;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .error-container {
                padding: 40px 20px;
            }

            .error-code {
                font-size: 80px;
            }

            .error-title {
                font-size: 24px;
            }

            .button-group {
                flex-direction: column;
                gap: 10px;
            }

            .btn-custom {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>

        <h1 class="error-code">404</h1>
        <h2 class="error-title">Page Not Found</h2>
        <p class="error-message">
            Sorry! The page you're looking for doesn't exist or has been moved. 
            It might have been deleted or the URL might be incorrect.
        </p>

        <div class="button-group">
            <a href="<?= SITE_URL ?? '/' ?>" class="btn-custom btn-primary-custom">
                <i class="fas fa-home"></i> Go to Home
            </a>
            <button class="btn-custom btn-secondary-custom" onclick="history.back()">
                <i class="fas fa-arrow-left"></i> Go Back
            </button>
        </div>

        <div class="suggestions">
            <h4><i class="fas fa-lightbulb"></i> What can you do?</h4>
            <ul>
                <li>Check the URL for typos</li>
                <li>Return to the&nbsp;<strong>home page</strong>&nbsp;and navigate from there</li>
                <li><a href="<?= SITE_URL ?? '' ?>/help">Visit our help page</a>&nbsp;for more assistance</li>
                <li><a href="<?= SITE_URL ?? '' ?>/contact">Contact us</a>&nbsp;if you need further help</li>
            </ul>
        </div>
    </div>

    <script src="<?= BASE_DIR ?? '' ?>/assets/admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_DIR ?? '' ?>/assets/admin/js/fontawesome.min.js"></script>
</body>
</html>
