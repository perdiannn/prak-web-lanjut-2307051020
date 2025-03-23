<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 50px;
    background: linear-gradient(to right, #0375bd,rgb(146, 18, 18));
    color: #fff;
}

.profile-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background-color: #eee;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 50px;
    color: #555;
    border: 2px solid #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.profile-pic:hover {
    transform: scale(1.1);
    box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.5);
}

.profile-info {
    margin-top: 20px;
    width: 100%;
    max-width: 300px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    backdrop-filter: blur(5px);
}

.info-box {
    background: rgba(255, 255, 255, 0.3);
    padding: 12px;
    margin: 10px auto;
    width: 80%;
    font-size: 18px;
    border-radius: 5px;
    transition: background 0.3s;
}

.info-box:hover {
    background: rgba(255, 255, 255, 0.5);
}

.button {
    background-color: #fff;
    color: #0375bd;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    margin-top: 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s, color 0.3s;
}

.button:hover {
    background-color: #0375bd;
    color: #fff;
}
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-pic">&#128100;</div>
        <div class="profile-info">
            <div class="info-box">Nama : FERDIAN</div>
            <div class="info-box">NPM : 2307051020</div>
            <div class="info-box">Kelas : D3 MI</div>
        </div>
    </div>
</body>
</html>