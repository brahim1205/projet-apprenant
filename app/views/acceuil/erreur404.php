<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/erreur.css">
  <title>404 - Page perdue dans la galaxie</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Orbitron', sans-serif;
      background: radial-gradient(ellipse at center, #0b0c2a 0%, #000 100%);
      height: 100vh;
      overflow: hidden;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .stars {
      position: absolute;
      width: 100%;
      height: 100%;
      background: url('https://raw.githubusercontent.com/VincentGarreau/particles.js/master/demo/media/star.png') repeat;
      animation: moveStars 100s linear infinite;
      opacity: 0.3;
    }

    @keyframes moveStars {
      from {background-position: 0 0;}
      to {background-position: 10000px 10000px;}
    }

    .container {
      text-align: center;
      position: relative;
      z-index: 2;
    }

    .astronaut {
      width: 200px;
      margin: 0 auto 2rem;
      animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }

    h1 {
      font-size: 6rem;
      color: #ff4c60;
      margin-bottom: 1rem;
      animation: flicker 3s infinite;
    }

    @keyframes flicker {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.6; }
    }

    h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    p {
      font-size: 1.2rem;
      max-width: 500px;
      margin: 0 auto 2rem;
    }

    a.button {
      padding: 12px 24px;
      background: #ff4c60;
      color: #fff;
      text-decoration: none;
      border-radius: 30px;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    a.button:hover {
      background: #ff1c3c;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 76, 96, 0.4);
    }
  </style>
</head>
<body>
  <div class="stars"></div>
  <div class="container">
  <lottie-player
  src="https://assets10.lottiefiles.com/packages/lf20_jcikwtux.json"
  background="transparent"
  speed="1"
  style="width: 200px; height: 200px; margin: 0 auto 2rem;"
  loop
  autoplay>
</lottie-player>
    <h1>404</h1>
    <h2>Oops... Page introuvable</h2>
    <p>Notre astronaute s'est perdu dans l'immensité de l'univers. Impossible de retrouver cette page.</p>
    <a href="/login" class="button">Retour à la base</a>
  </div>
</body>
</html>
