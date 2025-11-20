<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Todo App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="margin:0; background:#020617; color:#e5e7eb; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;">
    <div style="display:flex; min-height:100vh;">

        {{-- SIDEBAR LINKS --}}
        <aside style="width:240px; background:#020617; border-right:1px solid #1e293b; display:flex; flex-direction:column;">
            <div style="padding:16px; border-bottom:1px solid #1e293b;">
                <div style="display:flex; align-items:center; gap:8px;">
                    <div style="height:32px; width:32px; border-radius:9999px; background:#22c55e; display:flex; align-items:center; justify-content:center; font-weight:700; color:#020617;">
                        L
                    </div>
                    <div>
                        <div style="font-weight:600;">Todo App</div>
                        <div style="font-size:11px; color:#64748b;">Student dashboard</div>
                    </div>
                </div>
            </div>

            <nav style="flex:1; padding:12px; font-size:14px;">
                <a href="#"
                   style="display:flex; align-items:center; justify-content:space-between; padding:8px 10px; border-radius:10px; background:#020617; border:1px solid #22c55e33; text-decoration:none; color:#e5e7eb; margin-bottom:4px;">
                    <span>Vandaag</span>
                    <span style="font-size:11px; background:#22c55e22; color:#4ade80; padding:2px 8px; border-radius:9999px;">4</span>
                </a>
                <a href="#"
                   style="display:block; padding:8px 10px; border-radius:10px; text-decoration:none; color:#cbd5f5; margin-bottom:2px;">
                    Deze week
                </a>
                <a href="#"
                   style="display:block; padding:8px 10px; border-radius:10px; text-decoration:none; color:#cbd5f5; margin-bottom:2px;">
                    Alles
                </a>

                <div style="margin-top:16px; font-size:11px; text-transform:uppercase; letter-spacing:.08em; color:#64748b; padding:0 4px;">
                    Categorieën
                </div>
                <a href="#" style="display:block; padding:8px 10px; border-radius:10px; text-decoration:none; color:#cbd5f5;">School</a>
                <a href="#" style="display:block; padding:8px 10px; border-radius:10px; text-decoration:none; color:#cbd5f5;">Werk</a>
                <a href="#" style="display:block; padding:8px 10px; border-radius:10px; text-decoration:none; color:#cbd5f5;">Side-projecten</a>
                <a href="#" style="display:block; padding:8px 10px; border-radius:10px; text-decoration:none; color:#cbd5f5;">Privé</a>
            </nav>

            <div style="padding:10px 14px; border-top:1px solid #1e293b; font-size:11px; color:#64748b;">
                Voorbeeld UI • Laravel Todo
            </div>
        </aside>

        {{-- HOOFDCONTENT RECHTS --}}
        <main style="flex:1; padding:24px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
