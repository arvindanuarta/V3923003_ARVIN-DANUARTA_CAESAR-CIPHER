<?php  
// Fungsi cipher untuk enkripsi dan dekripsi
function cipher($char, $key){
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        return chr($mod + $nilai);
    } else {
        return $char;
    }
} 

// Fungsi enkripsi
function enkripsi($input, $key){
    $output = "";
    $chars = str_split($input);
    foreach($chars as $char){
        $output .= cipher($char, $key);
    }
    return $output;
}

// Fungsi dekripsi
function dekripsi($input, $key){
    return enkripsi($input, 26 - $key); // Menggunakan enkripsi terbalik
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V3923020</title>
    <link href="https://fonts.googleapis.com/css2?family=Gravitas+One&display=swap" rel="stylesheet">
    <style>
    /* CSS tema Manchester United */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Gravitas One', cursive;
        background-color: #DA291C; /* Warna merah khas Manchester United */
        color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('https://upload.wikimedia.org/wikipedia/en/thumb/7/7a/Manchester_United_FC_crest.svg/1200px-Manchester_United_FC_crest.svg.png'); /* Logo Manchester United */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 20%;
    }

    .container {
        background-color: rgba(0, 0, 0, 0.7); /* Latar belakang semi-transparan */
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        max-width: 500px;
        width: 100%;
    }

    h1 {
        color: #FFF200; /* Warna kuning seperti pada logo */
        margin-bottom: 20px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: none;
        border-radius: 5px;
    }

    input[type="text"],
    input[type="number"] {
        background-color: #FFF;
        color: #000;
    }

    textarea {
        background-color: #FFF;
        color: #000;
        height: 100px;
        resize: none;
    }

    button {
        background-color: #DA291C; /* Warna merah Manchester United */
        color: #FFF;
        border: none;
        padding: 10px 20px;
        margin: 10px 5px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #FFF200; /* Warna kuning saat hover */
        color: #DA291C;
    }

    .footer {
        margin-top: 20px;
    }

    .footer span {
        color: #FFF200; /* Warna kuning Manchester United */
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enkripsi & Dekripsi</h1>
        <form action="" method="post">
            <input type="text" name="plain" placeholder="Masukkan kalimat" required />
            <input type="number" name="key" placeholder="Masukkan kunci (0-25)" required />
            <br />
            <button type="submit" name="enkripsi" class="btn">Enkripsi</button>
            <button type="submit" name="dekripsi" class="btn">Dekripsi</button>
            <br />
            <textarea readonly placeholder="Hasil">
                <?php  
                    if (isset($_POST["enkripsi"])) { 
                        echo enkripsi($_POST["plain"], $_POST["key"]);
                    } else if (isset($_POST["dekripsi"])) {
                        echo dekripsi($_POST["plain"], $_POST["key"]);
                    }
                ?>
            </textarea>
        </form>
        <div class="footer">
            <span>ARVIN TAMPAN</span>
        </div>
    </div>
</body>
</html>
