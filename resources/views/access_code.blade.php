<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accès au site</title>
    <link rel="stylesheet" href="/css/access.css">
</head>
<body>

<div class="access-container">

    <h2>Entrer le code d'accès</h2>

    @if ($errors->any())
        <p class="error-message">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('access.code.check') }}">
        @csrf
        <input type="password" name="code" placeholder="Code secret">
        <button type="submit">Entrer</button>
    </form>

</div>


<style>
    /* ====== RESET ====== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

/* ====== PAGE ====== */
body {
    background: #0d0d0d;
    color: #ffffff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* ====== CONTAINER ====== */
.access-container {
    background: #111111;
    padding: 40px 35px;
    border-radius: 12px;
    width: 380px;
    text-align: center;
    border: 1px solid rgba(76, 175, 80, 0.25);
    box-shadow: 0 0 25px rgba(76, 175, 80, 0.08);
}

/* ====== TITLE ====== */
.access-container h2 {
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: 600;
    color: #4CAF50;
    letter-spacing: 1px;
}

/* ====== INPUT ====== */
.access-container input[type="password"] {
    width: 100%;
    padding: 14px;
    border-radius: 8px;
    border: 1px solid #333;
    background: #1a1a1a;
    color: #fff;
    font-size: 16px;
    margin-bottom: 20px;
    outline: none;
    transition: 0.3s;
}

.access-container input[type="password"]:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
}

/* ====== BUTTON ====== */
.access-container button {
    width: 100%;
    padding: 14px;
    background: #4CAF50;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    color: #000;
    transition: 0.3s;
}

.access-container button:hover {
    background: #45a049;
    transform: translateY(-2px);
}

/* ====== ERROR MESSAGE ====== */
.error-message {
    color: #ff6b6b;
    margin-bottom: 15px;
    font-size: 14px;
}
</style>

</body>
</html>