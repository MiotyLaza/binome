<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'FitSpace') ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary:    #1a1a2e;
      --accent:     #e94560;
      --accent2:    #0f3460;
      --surface:    #f7f7fa;
      --border:     #e2e2ea;
      --text:       #1a1a2e;
      --muted:      #7b7b96;
      --sidebar-w:  240px;
      --nav-h:      64px;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--surface);
      color: var(--text);
      margin: 0;
    }

    h1, h2, h3, .brand { font-family: 'Syne', sans-serif; }

    .nav-public {
      background: var(--primary);
      height: var(--nav-h);
      display: flex;
      align-items: center;
      padding: 0 2rem;
      gap: 2rem;
    }
    .nav-public .brand {
      color: #fff;
      font-size: 1.4rem;
      font-weight: 800;
      text-decoration: none;
      letter-spacing: -0.5px;
    }
    .nav-public .brand span { color: var(--accent); }
    .nav-public .nav-links { margin-left: auto; display: flex; align-items: center; gap: 1rem; }
    .nav-public .nav-links a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      font-size: 0.9rem;
      font-weight: 500;
      transition: color 0.15s;
    }
    .nav-public .nav-links a:hover { color: #fff; }
    .btn-nav-primary {
      background: var(--accent);
      color: #fff !important;
      border-radius: 6px;
      padding: 8px 18px;
    }
    .btn-nav-primary:hover { background: #c73250 !important; }

    .hero {
      background: var(--primary);
      padding: 80px 2rem 100px;
      text-align: center;
    }
    .hero-eyebrow {
      display: inline-block;
      background: rgba(233,69,96,0.15);
      color: var(--accent);
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 20px;
      margin-bottom: 1.5rem;
    }
    .hero h1 {
      color: #fff;
      font-size: clamp(2rem, 5vw, 3.2rem);
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 1rem;
    }
    .hero h1 em { color: var(--accent); font-style: normal; }
    .hero p {
      color: rgba(255,255,255,0.6);
      font-size: 1.05rem;
      max-width: 540px;
      margin: 0 auto 2rem;
    }
    .hero-ctas { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
    .btn-hero {
      padding: 12px 28px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.95rem;
      text-decoration: none;
      transition: all 0.15s;
    }
    .btn-hero-primary { background: var(--accent); color: #fff; }
    .btn-hero-primary:hover { background: #c73250; color: #fff; }
    .btn-hero-outline { border: 1.5px solid rgba(255,255,255,0.3); color: #fff; }
    .btn-hero-outline:hover { border-color: #fff; color: #fff; }

    .stats-band {
      background: var(--accent2);
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: center;
      gap: 3rem;
      flex-wrap: wrap;
    }
    .stat-item { text-align: center; }
    .stat-item .num { font-family: 'Syne', sans-serif; font-size: 1.6rem; font-weight: 800; color: #fff; }
    .stat-item .lbl { font-size: 0.75rem; color: rgba(255,255,255,0.5); margin-top: 2px; }
  </style>

  <?= $this->renderSection('head') ?>
</head>
<body>
  <?= $this->renderSection('content') ?>
</body>
</html>

