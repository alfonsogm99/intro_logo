<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title></title>
</head>
<style>
  body {
    margin: 0;
    background: #000;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    color: white;
    overflow: hidden;
  }

  .intro {
    position: fixed;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;

    background: radial-gradient(circle at center, #0a0a0a, #000);
    perspective: 1200px;
  }

  .light {
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 60%);
    filter: blur(40px);
    animation: glow 6s ease-in-out infinite;
  }

  @keyframes glow {
    0%,100% { transform: scale(1); opacity: 0.4; }
    50% { transform: scale(1.3); opacity: 0.7; }
  }

  .logo-wrap {
    transform-style: preserve-3d;
  }

  @font-face {
    font-family: "AR_font";
    src: url("./font/BLACEB__.TTF") format("truetype");
    font-weight: 400;
    font-style: normal;
    font-display: swap;
  }

  .logo {
    font-family: "AR_font", sans-serif;
    font-size: 5rem;
    font-weight: 600;
    /*letter-spacing: 14px;*/
    color: white;

    opacity: 0;
    filter: blur(18px);
    transform: scale(0.8) translateZ(-200px);
  }

  .intro.active .logo {
    animation: appleIn 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
  }

  @keyframes appleIn {
    0% {
      opacity: 0;
      filter: blur(20px);
      transform: scale(0.85) translateZ(-250px);
    }

    60% {
      opacity: 1;
      filter: blur(4px);
      transform: scale(1.05) translateZ(40px);
    }

    100% {
      opacity: 1;
      filter: blur(0px);
      transform: scale(1) translateZ(0px);
    }
  }

  /* out */
  .intro.hide {
    animation: appleOut 0.5s ease forwards;
  }

  @keyframes appleOut {
    to {
      opacity: 0;
      filter: blur(10px);
      visibility: hidden;
    }
  }

  .content {
    opacity: 0;
    transform: translateY(20px);
    animation: show 2s ease forwards;
    animation-delay: 3s;
    padding: 40px;
  }

  @keyframes show {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>
<body>

<div class="intro" id="intro">
  <div class="light"></div>

  <div class="logo-wrap">
    <div class="logo">AR</div>
  </div>
</div>

<div class="content">
  <h1>¡Hola, mundo!</h1>
</div>

<script>
  window.addEventListener("load", () => {
    const intro = document.getElementById("intro");

    // entrada suave
    setTimeout(() => {
      intro.classList.add("active");
    }, 150);

    // salida limpia
    setTimeout(() => {
      intro.classList.add("hide");
    }, 2600);
  });
</script>
</body>
</html>
