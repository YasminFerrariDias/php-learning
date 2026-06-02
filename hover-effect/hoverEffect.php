<!-- Exibe três imagens lado a lado com efeito hover de borda colorida diferente para cada uma. -->
<!DOCTYPE html>
<style type="text/css">
    body {
        margin-top: 140px;
        margin-left: 90px;
        background-color: royalblue;
        display: flex;
        gap: 10px;
        align-items: center;
    }

    img {
        display: flex;
        justify-content: center;
        gap: 10px;
        width: 400px; 
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }

    .img1:hover {
        border-color: blue;
    }

    .img2:hover {
        border-color: yellow;
    }

    .img3:hover {
        border-color: red;
    }
</style>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagem Efeito Hover</title>
</head>
<body>
    <img src="./img1.jpg" alt="Programação" border="20px" class="img1">
    <img src="./img2.jpeg" alt="Programação" border="20px" class="img2">
    <img src="./img3.jpeg" alt="Programação" border="20px" class="img3">
</body>

</html>