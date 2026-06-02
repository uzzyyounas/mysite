<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message from {{ $senderName }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        /* Header Section */
        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .email-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
            opacity: 0.3;
        }

        .email-header h1 {
            color: white;
            font-size: 28px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .email-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            position: relative;
            z-index: 1;
        }

        .notification-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        /* Content Section */
        .email-content {
            padding: 40px 35px;
            background: white;
        }

        /* Message Card */
        .message-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #f8f9fc 100%);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 4px solid #667eea;
        }

        .message-card h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .message-text {
            color: #555;
            line-height: 1.8;
            font-size: 15px;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-item {
            background: #f8f9fc;
            border-radius: 12px;
            padding: 18px;
            transition: transform 0.2s;
            border: 1px solid #e9ecef;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #667eea;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            word-break: break-all;
        }

        .info-value a {
            color: #667eea;
            text-decoration: none;
        }

        .info-value a:hover {
            text-decoration: underline;
        }

        /* Action Buttons */
        .action-buttons {
            background: #f8f9fc;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            margin-top: 30px;
        }

        .action-buttons h4 {
            color: #333;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 5px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-outline {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-outline:hover {
            background: #667eea;
            color: white;
        }

        /* Quick Reply Section */
        .quick-reply {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 20px;
            border-radius: 12px;
            margin-top: 25px;
        }

        .quick-reply p {
            color: #856404;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .quick-reply code {
            background: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            display: inline-block;
            font-family: monospace;
            font-size: 13px;
            color: #d63384;
        }

        /* Footer */
        .email-footer {
            background: #f8f9fc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .email-footer p {
            color: #6c757d;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .social-links {
            margin-top: 15px;
        }

        .social-links a {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e9ecef, transparent);
            margin: 20px 0;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .email-content {
                padding: 25px 20px;
            }

            .message-card {
                padding: 20px;
            }

            .btn {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Header -->
    <div class="email-header">
        <div class="notification-badge">
            ✨ NEW CONTACT FORM SUBMISSION
        </div>
        <h1>You Have a New Message</h1>
        <p>Someone wants to connect with you</p>
    </div>

    <!-- Content -->
    <div class="email-content">
        <!-- Message -->
        <div class="message-card">
            <h3>
                <span style="font-size: 24px;">💬</span>
                Message Content
            </h3>
            <div class="message-text">
                {{ nl2br(e($messageBody)) }}
            </div>
        </div>

        <!-- Sender Information -->
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">
                    <span>👤</span> SENDER NAME
                </div>
                <div class="info-value">{{ $senderName }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <span>📧</span> EMAIL ADDRESS
                </div>
                <div class="info-value">
                    <a href="mailto:{{ $senderEmail }}">{{ $senderEmail }}</a>
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <span>📝</span> SUBJECT
                </div>
                <div class="info-value">{{ $subject }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <span>🕐</span> RECEIVED AT
                </div>
                <div class="info-value">{{ now()->format('F j, Y \a\t g:i A') }}</div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="email-footer">
        <p>
            <strong>📌 Message Source:</strong> UzySolution.com
        </p>
        <p>
            This message was sent from your UzySolution.com .<br>
            You can reply directly to this email.
        </p>
        <div class="divider"></div>
        <p style="font-size: 12px;">
            © {{ date('Y') }} Muhammad Usman Younas Portfolio<br>
            Software Engineer | Oracle ERP & Full Stack Developer
        </p>
        <div class="social-links">
            <a href="#">🔗</a>
            <a href="#">💼</a>
            <a href="#">📱</a>
        </div>
    </div>
</div>
</body>
</html>
