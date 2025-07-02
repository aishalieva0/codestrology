<svg xmlns="http://www.w3.org/2000/svg" width="500" height="150">
    <style>
        .title {
            fill:
                {{ $theme === 'dark' ? '#f9a8d4' : '#be185d' }}
            ;
            font-size: 24px;
            font-family: sans-serif;
        }

        .message {
            fill:
                {{ $theme === 'dark' ? '#fff' : '#334155' }}
            ;
            font-size: 16px;
            font-family: sans-serif;
        }

        rect {
            fill:
                {{ $theme === 'dark' ? '#0f172a' : '#f1f5f9' }}
            ;
            rx: 15px;
            ry: 15px;
        }
    </style>
    <rect width="100%" height="100%" />
    <text x="20" y="50" class="title">{{ $emoji }} {{ ucfirst($sign) }} Dev</text>
    <text x="20" y="90" class="message">{{ $message }}</text>
</svg>