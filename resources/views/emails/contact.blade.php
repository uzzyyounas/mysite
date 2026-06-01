<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Portfolio Contact Message</title>
    <style>
        body { font-family: 'DM Sans', Arial, sans-serif; background: #0d1117; color: #e6edf3; margin: 0; padding: 0; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #161b22; border-radius: 12px; overflow: hidden; border: 1px solid #30363d; }
        .header { background: linear-gradient(135deg, #00b4d8, #0077b6); padding: 32px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; color: #fff; letter-spacing: -0.5px; }
        .body { padding: 32px; }
        .field { margin-bottom: 20px; }
        .field label { display: block; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #8b949e; margin-bottom: 6px; }
        .field .value { background: #0d1117; border-radius: 8px; padding: 12px 16px; border: 1px solid #30363d; color: #e6edf3; font-size: 15px; }
        .message-body { white-space: pre-wrap; line-height: 1.7; }
        .footer { padding: 20px 32px; background: #0d1117; border-top: 1px solid #30363d; text-align: center; font-size: 12px; color: #8b949e; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>📬 New Portfolio Message</h1>
        </div>
        <div class="body">
            <div class="field">
                <label>From</label>
                <div class="value">{{ $senderName }}</div>
            </div>
            <div class="field">
                <label>Email</label>
                <div class="value"><a href="mailto:{{ $senderEmail }}" style="color:#00b4d8;">{{ $senderEmail }}</a></div>
            </div>
            <div class="field">
                <label>Subject</label>
                <div class="value">{{ $subject }}</div>
            </div>
            <div class="field">
                <label>Message</label>
                <div class="value message-body">{{ $messageBody }}</div>
            </div>
        </div>
        <div class="footer">
            Received via <strong>uzzy.younas.dev</strong> portfolio contact form
        </div>
    </div>
</body>
</html>
