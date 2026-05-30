<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Sayfa Kayıp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Inter:wght@300;400;500;600&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter','system-ui',sans-serif;background:#07060e;color:#fff;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;cursor:default}

        /* Mouse glow */
        #mouseGlow{position:fixed;width:600px;height:600px;border-radius:50%;pointer-events:none;z-index:0;background:radial-gradient(circle,rgba(212,168,83,0.04),transparent 70%);transform:translate(-50%,-50%);transition:left 0.15s ease-out,top 0.15s ease-out}

        /* Background layers */
        .bg{position:fixed;inset:0;z-index:0;background:#07060e}
        .bg::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 40%,rgba(212,168,83,0.04),transparent 60%),radial-gradient(ellipse at 80% 70%,rgba(212,168,83,0.02),transparent 50%)}
        .bg::after{content:'';position:absolute;inset:0;background-image:url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4a853' fill-opacity='0.015'%3E%3Cpath d='M50 50l4-4-4-4-4 4 4 4zm0-40l4-4-4-4-4 4 4 4zM10 50l4-4-4-4-4 4 4 4zM30 70l4-4-4-4-4 4 4 4zM70 30l4-4-4-4-4 4 4 4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")}

        /* Floating numbers */
        .float-num{position:absolute;font-family:'Playfair Display',serif;font-weight:900;color:rgba(212,168,83,0.03);pointer-events:none;animation:numFloat var(--dur,25s) linear infinite;font-size:var(--size,120px);left:var(--x);top:var(--y)}
        @keyframes numFloat{0%{transform:translateY(0) rotate(0deg);opacity:0}10%{opacity:1}90%{opacity:1}100%{transform:translateY(-100vh) rotate(360deg);opacity:0}}

        /* Gold particles */
        .particle{position:absolute;width:var(--p-size);height:var(--p-size);background:var(--p-color,#d4a853);border-radius:50%;opacity:0;animation:float var(--p-dur,10s) ease-in-out var(--p-delay,0s) infinite;left:var(--p-x);top:var(--p-y);box-shadow:0 0 4px rgba(212,168,83,0.3)}
        @keyframes float{0%,100%{transform:translateY(0) translateX(0) scale(1);opacity:0}10%{opacity:0.6}30%{opacity:0.3;transform:translateY(-80px) translateX(20px) scale(1.8)}50%{transform:translateY(-160px) translateX(40px) scale(0.6);opacity:0.2}80%{opacity:0}}

        /* Main card */
        .card{position:relative;z-index:1;text-align:center;padding:60px 56px 48px;max-width:560px;width:90%;background:rgba(10,8,18,0.65);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);border:1px solid rgba(212,168,83,0.12);border-radius:20px;box-shadow:0 30px 80px rgba(0,0,0,0.5),0 0 0 1px rgba(212,168,83,0.05) inset,0 0 60px rgba(212,168,83,0.03)}

        /* Ornamental corners */
        .card::before{content:'';position:absolute;top:8px;left:8px;width:48px;height:48px;border-top:1px solid rgba(212,168,83,0.15);border-left:1px solid rgba(212,168,83,0.15);border-radius:4px 0 0 0;pointer-events:none}
        .card::after{content:'';position:absolute;bottom:8px;right:8px;width:48px;height:48px;border-bottom:1px solid rgba(212,168,83,0.15);border-right:1px solid rgba(212,168,83,0.15);border-radius:0 0 4px 0;pointer-events:none}
        .card-inner-top,.card-inner-bot{position:absolute;pointer-events:none}
        .card-inner-top{top:8px;right:8px;width:48px;height:48px;border-top:1px solid rgba(212,168,83,0.1);border-right:1px solid rgba(212,168,83,0.1);border-radius:0 4px 0 0}
        .card-inner-bot{bottom:8px;left:8px;width:48px;height:48px;border-bottom:1px solid rgba(212,168,83,0.1);border-left:1px solid rgba(212,168,83,0.1);border-radius:0 0 0 4px}

        /* Diamond dot ornaments */
        .orn-dot{position:absolute;width:4px;height:4px;background:#d4a853;border-radius:50%;opacity:0.3;box-shadow:0 0 6px rgba(212,168,83,0.4)}
        .orn-dot.tl{top:6px;left:6px}.orn-dot.tr{top:6px;right:6px}.orn-dot.bl{bottom:6px;left:6px}.orn-dot.br{bottom:6px;right:6px}

        /* 404 text – 3D gold */
        .code-wrap{position:relative;display:inline-block;margin-bottom:6px}
        .code{font-size:170px;font-weight:900;font-family:'Playfair Display',serif;line-height:1;background:linear-gradient(180deg,#f5e6b0 0%,#d4a853 30%,#b8933f 55%,#8c6e2e 70%,#d4a853 85%,#f0d080 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:-6px;position:relative;filter:drop-shadow(0 0 30px rgba(212,168,83,0.1));animation:shine 5s ease-in-out infinite}
        @keyframes shine{0%,100%{background-position:0% 50%}50%{background-position:100% 50%}}
        .code-3d{position:absolute;top:0;left:0;font-size:170px;font-weight:900;font-family:'Playfair Display',serif;line-height:1;letter-spacing:-6px;color:transparent;pointer-events:none;z-index:-2;text-shadow:0 1px 0 rgba(180,140,60,0.4),0 2px 0 rgba(160,125,50,0.3),0 3px 0 rgba(140,110,40,0.25),0 4px 0 rgba(120,95,30,0.2),0 5px 3px rgba(0,0,0,0.3),0 8px 12px rgba(0,0,0,0.2),0 0 40px rgba(212,168,83,0.08)}
        .code-glow{position:absolute;inset:0;font-size:170px;font-weight:900;font-family:'Playfair Display',serif;line-height:1;letter-spacing:-6px;color:transparent;z-index:-3;filter:blur(35px);background:linear-gradient(180deg,#d4a853,transparent);-webkit-background-clip:text;opacity:0.25}

        /* Ornate divider */
        .divider{width:100px;height:1px;background:linear-gradient(90deg,transparent,rgba(212,168,83,0.3),transparent);margin:28px auto;position:relative}
        .divider::before{content:'◇';position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);color:#d4a853;font-size:7px;opacity:0.5;line-height:1}
        .divider-line{position:absolute;top:-8px;left:50%;transform:translateX(-50%);width:20px;height:1px;background:rgba(212,168,83,0.15)}

        /* Typography */
        .title{font-family:'Playfair Display',serif;font-weight:400;font-size:26px;color:rgba(255,255,255,0.85);margin-bottom:14px;letter-spacing:0.3px;opacity:0;animation:fadeSlide 0.8s ease-out 0.3s forwards}
        .title em{font-style:italic;color:#d4a853}
        .desc{color:rgba(255,255,255,0.35);font-size:14px;font-weight:300;line-height:1.8;margin-bottom:32px;opacity:0;animation:fadeSlide 0.8s ease-out 0.5s forwards;letter-spacing:0.2px}
        .desc em{color:rgba(212,168,83,0.5);font-style:normal}
        @keyframes fadeSlide{0%{transform:translateY(18px);opacity:0}100%{transform:translateY(0);opacity:1}}

        /* Buttons */
        .btn-group{opacity:0;animation:fadeSlide 0.8s ease-out 0.7s forwards}
        .btn{display:inline-flex;align-items:center;gap:10px;padding:13px 34px;background:linear-gradient(135deg,#d4a853 0%,#c49a3f 40%,#b89038 100%);color:#fff;text-decoration:none;border-radius:10px;font-size:13px;font-weight:500;letter-spacing:0.3px;transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);border:none;cursor:pointer;position:relative;overflow:hidden;box-shadow:0 4px 20px rgba(212,168,83,0.18),0 0 0 1px rgba(255,255,255,0.04) inset}
        .btn::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,transparent,rgba(255,255,255,0.12),transparent);transform:translateX(-100%);transition:transform 0.6s}
        .btn:hover::before{transform:translateX(100%)}
        .btn:hover{transform:translateY(-2px) scale(1.02);box-shadow:0 10px 35px rgba(212,168,83,0.3),0 0 0 1px rgba(255,255,255,0.06) inset}
        .btn:active{transform:translateY(0) scale(0.98)}
        .btn-outline{display:inline-flex;align-items:center;gap:10px;padding:13px 34px;background:transparent;color:rgba(212,168,83,0.7);text-decoration:none;border-radius:10px;font-size:13px;font-weight:400;letter-spacing:0.3px;transition:all 0.4s;border:1px solid rgba(212,168,83,0.15);cursor:pointer;margin-left:14px;position:relative}
        .btn-outline::before{content:'';position:absolute;inset:-1px;border-radius:10px;background:linear-gradient(135deg,rgba(212,168,83,0.1),transparent 50%,rgba(212,168,83,0.05));opacity:0;transition:opacity 0.4s;z-index:-1}
        .btn-outline:hover::before{opacity:1}
        .btn-outline:hover{color:#d4a853;border-color:rgba(212,168,83,0.35);transform:translateY(-2px);box-shadow:0 0 25px rgba(212,168,83,0.06)}

        /* Links */
        .links{margin-top:36px;display:flex;justify-content:center;flex-wrap:wrap;gap:18px;opacity:0;animation:fadeSlide 0.8s ease-out 1s forwards}
        .links a{color:rgba(255,255,255,0.18);text-decoration:none;font-size:12px;font-weight:400;letter-spacing:0.5px;text-transform:uppercase;transition:all 0.4s;position:relative}
        .links a::after{content:'';position:absolute;bottom:-3px;left:50%;transform:translateX(-50%);width:0;height:1px;background:linear-gradient(90deg,transparent,#d4a853,transparent);transition:width 0.4s}
        .links a:hover{color:rgba(212,168,83,0.6)}
        .links a:hover::after{width:80%}

        /* Search emoji */
        .search-emoji{font-size:36px;margin-top:18px;opacity:0;animation:fadeSlide 0.8s ease-out 1.2s forwards,searchAnim 1.8s ease-in-out 1.2s infinite;filter:grayscale(0.3)}
        @keyframes searchAnim{0%,100%{transform:translateX(-8px) rotate(-3deg)}50%{transform:translateX(8px) rotate(3deg)}}

        /* Brand */
        .brand-section{margin-top:44px;padding-top:28px;position:relative;opacity:0;animation:fadeSlide 0.8s ease-out 1.4s forwards}
        .brand-divider{width:80px;height:1px;background:linear-gradient(90deg,transparent,rgba(212,168,83,0.2),transparent);margin:0 auto 18px}
        .brand{text-decoration:none;display:block;cursor:pointer}
        .brand:hover .brand-icon{transform:rotate(180deg) scale(1.1);opacity:0.8}
        .brand-icon{font-size:18px;color:#d4a853;margin-bottom:6px;display:block;transition:all 0.6s cubic-bezier(0.68,-0.55,0.27,1.55);opacity:0.5;font-family:'Cormorant Garamond',serif}
        .brand-name{font-family:'Cormorant Garamond',serif;font-weight:400;font-style:italic;font-size:16px;color:rgba(212,168,83,0.5);letter-spacing:5px;text-transform:uppercase;transition:color 0.4s}
        .brand:hover .brand-name{color:rgba(212,168,83,0.7)}
        .brand-tagline{font-size:10px;color:rgba(255,255,255,0.12);letter-spacing:4px;text-transform:uppercase;margin-top:5px;font-weight:300}

        /* Explosion */
        .explosion-container{position:fixed;inset:0;z-index:2;pointer-events:none;display:flex;align-items:center;justify-content:center}
        .exp{position:absolute;width:6px;height:6px;background:linear-gradient(135deg,#f0d080,#d4a853);border-radius:50%;opacity:0;box-shadow:0 0 8px rgba(212,168,83,0.6)}
        .exp-1{animation:explode 1s ease-out 0s forwards;--ex:-200px;--ey:-200px}
        .exp-2{animation:explode 1s ease-out 0.05s forwards;--ex:200px;--ey:-180px}
        .exp-3{animation:explode 1s ease-out 0.1s forwards;--ex:-180px;--ey:200px}
        .exp-4{animation:explode 1s ease-out 0.15s forwards;--ex:200px;--ey:180px}
        .exp-5{animation:explode 1s ease-out 0.02s forwards;--ex:-280px;--ey:0px;width:4px;height:4px}
        .exp-6{animation:explode 1s ease-out 0.07s forwards;--ex:280px;--ey:-20px;width:5px;height:5px}
        .exp-7{animation:explode 1s ease-out 0.12s forwards;--ex:0px;--ey:-250px}
        .exp-8{animation:explode 1s ease-out 0.17s forwards;--ex:-20px;--ey:250px;width:3px;height:3px}
        .exp-9{animation:explode 1s ease-out 0.03s forwards;--ex:-220px;--ey:-120px;width:4px;height:4px}
        .exp-10{animation:explode 1s ease-out 0.08s forwards;--ex:220px;--ey:120px}
        .exp-11{animation:explode 1s ease-out 0.13s forwards;--ex:120px;--ey:-220px;width:3px;height:3px}
        .exp-12{animation:explode 1s ease-out 0.18s forwards;--ex:-120px;--ey:220px}
        .exp-13{animation:explode 1s ease-out 0.06s forwards;--ex:300px;--ey:80px;width:5px;height:5px}
        .exp-14{animation:explode 1s ease-out 0.11s forwards;--ex:-300px;--ey:-80px}
        .exp-15{animation:explode 1s ease-out 0.16s forwards;--ex:80px;--ey:300px;width:4px;height:4px}
        .exp-16{animation:explode 1s ease-out 0.2s forwards;--ex:-80px;--ey:-300px}
        .exp-x{position:absolute;width:80px;height:80px;opacity:0;animation:flashX 0.7s ease-out 0s forwards}
        .exp-x::before,.exp-x::after{content:'';position:absolute;top:50%;left:50%;width:100%;height:1.5px;background:linear-gradient(90deg,transparent,#d4a853,transparent);transform:translate(-50%,-50%) rotate(45deg);border-radius:2px;box-shadow:0 0 12px rgba(212,168,83,0.3)}
        .exp-x::after{transform:translate(-50%,-50%) rotate(-45deg)}
        @keyframes explode{0%{transform:translate(0,0) scale(1);opacity:1}40%{opacity:0.9}100%{transform:translate(var(--ex),var(--ey)) scale(0);opacity:0}}
        @keyframes flashX{0%{opacity:0;transform:scale(0.3)}15%{opacity:1;transform:scale(1.1)}35%{transform:scale(0.85);opacity:0.7}55%{transform:scale(1.05);opacity:0.4}100%{opacity:0;transform:scale(1.4)}}

        /* Glitch text */
        .glitch{position:fixed;font-family:'Playfair Display',serif;font-weight:900;color:rgba(212,168,83,0.015);pointer-events:none;font-size:var(--gs,300px);top:var(--gy,10%);left:var(--gx,10%);animation:glitchFloat var(--gd,25s) linear infinite}
        @keyframes glitchFloat{0%{transform:translate(0,0) rotate(0deg)}25%{transform:translate(25px,-15px) rotate(2deg)}50%{transform:translate(-15px,8px) rotate(-1deg)}75%{transform:translate(12px,25px) rotate(3deg)}100%{transform:translate(0,0) rotate(0deg)}}

        /* Spinning rings under 404 */
        .ring-group{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);pointer-events:none;z-index:-1}
        .ring{position:absolute;top:50%;left:50%;width:280px;height:280px;transform:translate(-50%,-50%);border-radius:50%;border:1px solid rgba(212,168,83,0.06);animation:spin 14s linear infinite}
        .ring:nth-child(2){width:220px;height:220px;border-color:rgba(212,168,83,0.04);animation-duration:10s;animation-direction:reverse}
        .ring:nth-child(3){width:160px;height:160px;border-color:rgba(212,168,83,0.05);animation-duration:7s}
        .ring .dot{position:absolute;width:5px;height:5px;background:#d4a853;border-radius:50%;opacity:0.4;box-shadow:0 0 8px rgba(212,168,83,0.3)}
        .ring .dot.t{top:-3px;left:50%;transform:translateX(-50%)}
        .ring .dot.r{top:50%;right:-3px;transform:translateY(-50%)}
        .ring .dot.b{bottom:-3px;left:50%;transform:translateX(-50%)}
        .ring .dot.l{top:50%;left:-3px;transform:translateY(-50%)}
        @keyframes spin{0%{transform:translate(-50%,-50%) rotate(0deg)}100%{transform:translate(-50%,-50%) rotate(360deg)}}

        /* Responsive */
        @media(max-width:640px){
            .card{padding:40px 24px 36px}.code{font-size:110px}.code-3d,.code-glow{font-size:110px}
            .title{font-size:21px}.desc{font-size:13px}
            .btn,.btn-outline{margin:0;width:100%;justify-content:center}.btn-outline{margin-top:12px}
            .ring{width:200px;height:200px}.ring:nth-child(2){width:160px;height:160px}.ring:nth-child(3){width:110px;height:110px}
            .card::before,.card::after,.card-inner-top,.card-inner-bot{width:28px;height:28px}
        }
    </style>
</head>
<body>
    <div id="mouseGlow"></div>
    <div class="bg"></div>

    {{-- Patlama --}}
    <div class="explosion-container" id="explosion">
        <div class="exp exp-1"></div><div class="exp exp-2"></div><div class="exp exp-3"></div>
        <div class="exp exp-4"></div><div class="exp exp-5"></div><div class="exp exp-6"></div>
        <div class="exp exp-7"></div><div class="exp exp-8"></div><div class="exp exp-9"></div>
        <div class="exp exp-10"></div><div class="exp exp-11"></div><div class="exp exp-12"></div>
        <div class="exp exp-13"></div><div class="exp exp-14"></div><div class="exp exp-15"></div>
        <div class="exp exp-16"></div><div class="exp-x"></div>
    </div>

    {{-- Glitch 404 --}}
    <div class="glitch" style="--gs:380px;--gy:3%;--gx:-6%;--gd:28s">404</div>
    <div class="glitch" style="--gs:220px;--gy:65%;--gx:72%;--gd:32s">404</div>
    <div class="glitch" style="--gs:160px;--gy:25%;--gx:82%;--gd:24s">404</div>
    <div class="glitch" style="--gs:320px;--gy:75%;--gx:-12%;--gd:30s">404</div>

    {{-- Particles --}}
    <div class="particle" style="--p-x:8%;--p-y:15%;--p-dur:9s;--p-delay:0s;--p-size:3px"></div>
    <div class="particle" style="--p-x:88%;--p-y:25%;--p-dur:11s;--p-delay:1.5s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:50%;--p-y:8%;--p-dur:10s;--p-delay:0.8s;--p-size:4px"></div>
    <div class="particle" style="--p-x:15%;--p-y:75%;--p-dur:7s;--p-delay:1.2s;--p-size:2px;--p-color:#e8c566"></div>
    <div class="particle" style="--p-x:78%;--p-y:85%;--p-dur:9s;--p-delay:2.2s;--p-size:3px"></div>
    <div class="particle" style="--p-x:65%;--p-y:35%;--p-dur:10s;--p-delay:0.5s;--p-size:2px"></div>
    <div class="particle" style="--p-x:30%;--p-y:92%;--p-dur:12s;--p-delay:1.8s;--p-size:3px;--p-color:#e8c566"></div>

    {{-- Main card --}}
    <div class="card">
        <div class="card-inner-top"></div>
        <div class="card-inner-bot"></div>
        <div class="orn-dot tl"></div><div class="orn-dot tr"></div>
        <div class="orn-dot bl"></div><div class="orn-dot br"></div>

        <div class="code-wrap">
            <div class="ring-group">
                <div class="ring"><span class="dot t"></span><span class="dot r"></span><span class="dot b"></span><span class="dot l"></span></div>
                <div class="ring"><span class="dot t"></span><span class="dot r"></span><span class="dot b"></span><span class="dot l"></span></div>
                <div class="ring"><span class="dot t"></span><span class="dot r"></span><span class="dot b"></span><span class="dot l"></span></div>
            </div>
            <div class="code-glow">404</div>
            <div class="code-3d">404</div>
            <div class="code">404</div>
        </div>

        <div class="divider"><span class="divider-line"></span></div>

        <h1 class="title">Bir şeyler <em>kayıp</em> gibi.</h1>
        <p class="desc">Ya adresi yanlış yazdık, ya da bu sayfa sessizce <em>emekli oldu</em>.<br>Üzülme, seni yönlendirelim.</p>

        <div class="btn-group">
            <a href="{{ url('/') }}" class="btn"><i class="fas fa-arrow-left"></i>Beni Kurtar</a>
            <a href="{{ url('/magazalar') }}" class="btn-outline"><i class="fas fa-store"></i>Mağazalarımıza Göz Atın</a>
        </div>

        <div class="links">
            <a href="{{ url('/') }}">Ana Sayfa</a>
            <a href="{{ url('/products') }}">Ürünler</a>
            <a href="{{ url('/magazalar') }}">Mağazalar</a>
            <a href="{{ url('/blog') }}">Blog</a>
            <a href="{{ url('/contact') }}">İletişim</a>
        </div>

        <div class="search-emoji">🔍</div>

        <div class="brand-section">
            <div class="brand-divider"></div>
            <a href="{{ url('/') }}" class="brand">
                <span class="brand-icon">✧</span>
                <p class="brand-name">kisiyeozel.org</p>
                <p class="brand-tagline">Her Ürün Size Özel</p>
            </a>
        </div>
    </div>

    {{-- Game elements --}}
    <div id="cat">🐱</div>
    <div id="gameTrail"></div>
    <div id="gameHud">
        <span id="scoreDisplay">⭐ 0</span>
        <span id="livesDisplay">❤️❤️❤️</span>
        <span id="timerDisplay">⏱ 0s</span>
    </div>

    <style>
        #cat{position:fixed;font-size:36px;z-index:1000;filter:drop-shadow(0 0 12px rgba(212,168,83,0.3));pointer-events:none;line-height:1;transition:none;display:none}
        #cat.visible{display:block}
        .cat-trail{position:fixed;font-size:28px;z-index:999;pointer-events:none;line-height:1;opacity:0;animation:trailFade 0.6s ease-out forwards}
        @keyframes trailFade{0%{opacity:0.5;transform:scale(1) translateY(0)}100%{opacity:0;transform:scale(0.3) translateY(-20px)}}
        #gameHud{position:fixed;top:12px;left:50%;transform:translateX(-50%);z-index:1001;display:none;gap:20px;font-size:13px;background:rgba(10,8,18,0.8);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border:1px solid rgba(212,168,83,0.12);border-radius:8px;padding:6px 18px;font-family:'Inter',sans-serif}
        #gameHud.visible{display:flex}
        #gameHud span{color:rgba(255,255,255,0.6);white-space:nowrap}
        .collect{position:fixed;font-size:24px;z-index:998;pointer-events:none;line-height:1;animation:collectSpin 1.5s ease-in-out infinite;filter:drop-shadow(0 0 8px rgba(212,168,83,0.5));cursor:default}
        @keyframes collectSpin{0%,100%{transform:translateY(0) scale(1)}50%{transform:translateY(-8px) scale(1.15)}}
        .collect.caught{animation:collectPop 0.4s ease-out forwards}
        @keyframes collectPop{0%{transform:scale(1);opacity:1}100%{transform:scale(2);opacity:0}}
        .obstacle{position:fixed;font-size:26px;z-index:997;pointer-events:none;line-height:1;cursor:default;transition:none;filter:drop-shadow(0 0 6px rgba(255,0,0,0.3))}
        .obstacle-hit{animation:hitShake 0.5s ease-out}
        @keyframes hitShake{0%,100%{transform:translateX(0)}20%{transform:translateX(-8px)}40%{transform:translateX(8px)}60%{transform:translateX(-5px)}80%{transform:translateX(5px)}}
        .popup-text{position:fixed;font-size:16px;font-weight:700;z-index:1002;pointer-events:none;line-height:1;animation:popupFloat 0.8s ease-out forwards;color:#d4a853;text-shadow:0 0 10px rgba(212,168,83,0.5)}
        @keyframes popupFloat{0%{transform:translateY(0);opacity:1}100%{transform:translateY(-40px);opacity:0}}
        .game-overlay-msg{position:fixed;inset:0;z-index:2000;display:none;align-items:center;justify-content:center;background:rgba(0,0,0,0.5);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px)}
        .game-overlay-msg.show{display:flex}
        .game-overlay-msg .box{text-align:center;padding:40px 48px;background:rgba(10,8,18,0.92);border:1px solid rgba(212,168,83,0.15);border-radius:16px;max-width:380px;box-shadow:0 20px 60px rgba(0,0,0,0.4)}
        .game-overlay-msg .box h2{font-family:'Playfair Display',serif;font-size:26px;font-weight:400;margin-bottom:10px;color:rgba(255,255,255,0.85)}
        .game-overlay-msg .box p{color:rgba(255,255,255,0.4);font-size:13px;margin-bottom:20px;font-weight:300}
        .game-overlay-msg .box .btn{margin:0 auto}
        .btn-restart{display:inline-block;padding:8px 24px;background:transparent;color:rgba(255,255,255,0.3);border:1px solid rgba(255,255,255,0.08);border-radius:8px;font-size:12px;cursor:pointer;transition:all 0.3s;margin-top:6px;letter-spacing:0.5px}
        .btn-restart:hover{background:rgba(212,168,83,0.1);border-color:rgba(212,168,83,0.2);color:#d4a853}
        .cat-glow-near{filter:drop-shadow(0 0 25px rgba(212,168,83,0.8)) drop-shadow(0 0 50px rgba(212,168,83,0.4))!important}
        #cat.saved{animation:catSaved 0.8s ease-out forwards}
        @keyframes catSaved{0%{transform:scale(1);opacity:1}50%{transform:scale(1.5) rotate(360deg);opacity:0.7}100%{transform:scale(3);opacity:0}}
    </style>

    <div class="game-overlay-msg" id="winOverlay">
        <div class="box">
            <h2>🎉 Kurtuldun!</h2>
            <p id="finalScore">Puan: 0 · Süre: 0s</p>
            <a href="{{ url('/') }}" class="btn"><i class="fas fa-arrow-left"></i>Ana Sayfaya Dön</a>
            <div><button class="btn-restart" onclick="location.reload()">↻ Tekrar Oyna</button></div>
        </div>
    </div>

    <div class="game-overlay-msg" id="loseOverlay">
        <div class="box">
            <h2>💫 Enerji Tükendi</h2>
            <p>Kediciğimiz yoruldu. Bir kez daha dene.</p>
            <div><button class="btn-restart" onclick="location.reload()">↻ Tekrar Dene</button></div>
        </div>
    </div>

    <script>
    (function(){
        const cat = document.getElementById('cat');
        const hud = document.getElementById('gameHud');
        const scoreDisp = document.getElementById('scoreDisplay');
        const livesDisp = document.getElementById('livesDisplay');
        const timerDisp = document.getElementById('timerDisplay');

        let cx = 20, cy = 20;
        let saved = false;
        let score = 0;
        let lives = 3;
        let gameOver = false;
        let startTime = Date.now();
        let timerInterval;
        let animFrame;
        let obstacles = [];
        let collectibles = [];
        let keys = {};

        const COLLECT_EMOJIS = ['⭐','🌟','💎','✨'];
        const OBSTACLE_EMOJIS = ['💀','🌑','🕳️','⚡'];

        function getBtn() {
            return document.querySelector('.btn');
        }

        function getBounds(el) {
            const r = el.getBoundingClientRect();
            return {l:r.left, t:r.top, r:r.right, b:r.bottom, w:r.width, h:r.height};
        }

        function overlap(ax, ay, aw, ah, bx, by, bw, bh) {
            return ax < bx + bw && ax + aw > bx && ay < by + bh && ay + ah > by;
        }

        function dist(x1,y1,x2,y2) {
            return Math.hypot(x2-x1, y2-y1);
        }

        function random(min, max) {
            return Math.random() * (max - min) + min;
        }

        function randi(min, max) {
            return Math.floor(random(min, max + 1));
        }

        function spawnObstacle() {
            if (obstacles.length >= 3 || gameOver) return;
            const size = 28;
            let ox, oy, attempts = 0;
            do {
                ox = random(size, window.innerWidth - size - 20);
                oy = random(80, window.innerHeight - 80);
                attempts++;
            } while (attempts < 20 && dist(ox + size/2, oy + size/2, cx + 18, cy + 18) < 150);
            const el = document.createElement('div');
            el.className = 'obstacle';
            el.textContent = OBSTACLE_EMOJIS[randi(0, OBSTACLE_EMOJIS.length - 1)];
            el.style.left = ox + 'px';
            el.style.top = oy + 'px';
            el.style.fontSize = randi(22, 30) + 'px';
            document.body.appendChild(el);
            const dirX = Math.random() > 0.5 ? 1 : -1;
            const dirY = Math.random() > 0.5 ? 1 : -1;
            obstacles.push({el, x:ox, y:oy, vx:random(0.3,0.8)*dirX, vy:random(0.2,0.6)*dirY, size});
        }

        function spawnCollectible() {
            if (collectibles.length >= 5 || gameOver) return;
            const size = 26;
            let ox, oy, attempts = 0;
            do {
                ox = random(size, window.innerWidth - size - 20);
                oy = random(80, window.innerHeight - 80);
                attempts++;
            } while (attempts < 20 && dist(ox + size/2, oy + size/2, cx + 18, cy + 18) < 120);
            const el = document.createElement('div');
            el.className = 'collect';
            el.textContent = COLLECT_EMOJIS[randi(0, COLLECT_EMOJIS.length - 1)];
            el.style.left = ox + 'px';
            el.style.top = oy + 'px';
            document.body.appendChild(el);
            collectibles.push({el, x:ox, y:oy, size, caught:false});
        }

        function addTrail() {
            const t = document.createElement('div');
            t.className = 'cat-trail';
            t.textContent = '🐱';
            t.style.left = (cx - 4) + 'px';
            t.style.top = (cy - 4) + 'px';
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 700);
        }

        function showPopup(x, y, text) {
            const p = document.createElement('div');
            p.className = 'popup-text';
            p.textContent = text;
            p.style.left = x + 'px';
            p.style.top = y + 'px';
            document.body.appendChild(p);
            setTimeout(() => p.remove(), 900);
        }

        function updateHud() {
            scoreDisp.textContent = `⭐ ${score}`;
            livesDisp.textContent = '❤️'.repeat(Math.max(0, lives));
            const elapsed = Math.floor((Date.now() - startTime) / 1000);
            timerDisp.textContent = `⏱ ${elapsed}s`;
        }

        function loseLife() {
            if (gameOver) return;
            lives--;
            updateHud();
            cat.style.transform = 'scale(0.6) rotate(10deg)';
            setTimeout(() => cat.style.transform = '', 300);
            if (lives <= 0) {
                gameOver = true;
                document.getElementById('loseOverlay').classList.add('show');
                if (timerInterval) clearInterval(timerInterval);
                return;
            }
        }

        function collectItem(idx) {
            const item = collectibles[idx];
            if (!item || item.caught) return;
            item.caught = true;
            item.el.classList.add('caught');
            score += 10;
            updateHud();
            showPopup(item.x, item.y - 10, '+10 ⭐');
            setTimeout(() => {
                item.el.remove();
                collectibles.splice(idx, 1);
            }, 500);
        }

        function win() {
            if (gameOver) return;
            gameOver = true;
            saved = true;
            if (timerInterval) clearInterval(timerInterval);
            const elapsed = Math.floor((Date.now() - startTime) / 1000);
            const bonus = Math.max(0, 30 - elapsed) * 5;
            score += bonus;
            document.getElementById('finalScore').textContent = `Puan: ${score} · Süre: ${elapsed}s · Zaman Bonusu: +${bonus}`;
            cat.classList.add('saved');
            setTimeout(() => {
                document.getElementById('winOverlay').classList.add('show');
            }, 400);
        }

        function setupGame() {
            cat.textContent = '🐱';
            cat.classList.add('visible');
            cat.style.left = cx + 'px';
            cat.style.top = cy + 'px';
            hud.classList.add('visible');
            updateHud();

            for (let i = 0; i < 3; i++) setTimeout(() => spawnCollectible(), i * 300);
            for (let i = 0; i < 2; i++) setTimeout(() => spawnObstacle(), i * 500 + 600);

            timerInterval = setInterval(updateHud, 1000);

            document.addEventListener('keydown', e => {
                keys[e.key] = true;
                if (e.key.startsWith('Arrow')) e.preventDefault();
            });
            document.addEventListener('keyup', e => { keys[e.key] = false; });

            let tx = 0, ty = 0;
            document.addEventListener('touchstart', e => {
                const t = e.touches[0];
                tx = t.clientX; ty = t.clientY;
            }, {passive:true});
            document.addEventListener('touchmove', e => {
                e.preventDefault();
                if (gameOver || saved) return;
                const t = e.touches[0];
                const dx = t.clientX - tx;
                const dy = t.clientY - ty;
                if (Math.abs(dx) > 10 || Math.abs(dy) > 10) {
                    const step = Math.min(15, Math.max(4, Math.hypot(dx,dy) * 0.3));
                    if (Math.abs(dx) > Math.abs(dy)) {
                        cx += Math.sign(dx) * step;
                    } else {
                        cy += Math.sign(dy) * step;
                    }
                    tx = t.clientX; ty = t.clientY;
                }
            }, {passive:false});

            document.addEventListener('click', e => {
                if (gameOver || saved) return;
                const target = e.target;
                if (target.closest('.btn') || target.closest('.btn-outline') || target.closest('.links') || target.closest('.brand')) return;
                const dx = e.clientX - cx;
                const dy = e.clientY - cy;
                const d = Math.hypot(dx, dy);
                if (d > 20) {
                    const step = 18;
                    cx += (dx / d) * step;
                    cy += (dy / d) * step;
                }
            });

            gameLoop();
        }

        function gameLoop() {
            if (gameOver) return;

            const step = 2.5;
            let moved = false;

            if (keys['ArrowUp'] || keys['w']) { cy = Math.max(0, cy - step); moved = true; }
            if (keys['ArrowDown'] || keys['s']) { cy = Math.min(window.innerHeight - 40, cy + step); moved = true; }
            if (keys['ArrowLeft'] || keys['a']) { cx = Math.max(0, cx - step); moved = true; }
            if (keys['ArrowRight'] || keys['d']) { cx = Math.min(window.innerWidth - 40, cx + step); moved = true; }

            if (moved && Math.random() < 0.3) addTrail();

            cat.style.left = cx + 'px';
            cat.style.top = cy + 'px';

            for (const o of obstacles) {
                o.x += o.vx;
                o.y += o.vy;
                if (o.x < 0 || o.x > window.innerWidth - 30) o.vx *= -1;
                if (o.y < 60 || o.y > window.innerHeight - 60) o.vy *= -1;
                o.el.style.left = o.x + 'px';
                o.el.style.top = o.y + 'px';

                if (!gameOver && !saved && overlap(cx, cy, 32, 32, o.x, o.y, 28, 28)) {
                    o.el.classList.add('obstacle-hit');
                    showPopup(cx, cy - 10, '💥 -1 ❤️');
                    loseLife();
                    setTimeout(() => o.el.classList.remove('obstacle-hit'), 600);
                }
            }

            for (let i = collectibles.length - 1; i >= 0; i--) {
                const item = collectibles[i];
                if (item.caught) continue;
                if (!gameOver && !saved && overlap(cx, cy, 32, 32, item.x, item.y, 26, 26)) {
                    collectItem(i);
                }
            }

            const btn = getBtn();
            if (btn && !gameOver && !saved) {
                const b = getBounds(btn);
                const d = dist(cx + 18, cy + 18, b.l + b.w/2, b.t + b.h/2);
                if (d < 80) {
                    cat.classList.add('cat-glow-near');
                    cat.textContent = '😸';
                } else {
                    cat.classList.remove('cat-glow-near');
                    cat.textContent = '🐱';
                }
                if (keys['Enter']) {
                    keys['Enter'] = false;
                    if (overlap(cx, cy, 36, 36, b.l, b.t, b.w, b.h)) {
                        win();
                    }
                }
            }

            cx = Math.max(0, Math.min(window.innerWidth - 36, cx));
            cy = Math.max(0, Math.min(window.innerHeight - 40, cy));

            animFrame = requestAnimationFrame(gameLoop);
        }

        setTimeout(setupGame, 2000);
    })();
    </script>
</body>
</html>
