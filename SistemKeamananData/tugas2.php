<!DOCTYPE html>
<html>
<head>
    <title>Caesar Cipher Encryption</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Caesar Cipher Encryption</h1>
        <form method="post">
            <label for="text">Teks:</label>
            <input type="text" name="text" id="text" required><br>
            <label for="shift">Kunci Pergeseran (Nomor Absen):</label>
            <input type="number" name="shift" id="shift" required><br>
            <button type="submit">Enkripsi</button>
        </form>

        <?php
        function caesar_encrypt($text, $shift) {
            /*
            Fungsi ini digunakan untuk melakukan enkripsi teks menggunakan Caesar Cipher.

            :param string $text: Teks yang akan dienkripsi.
            :param int $shift: Kunci pergeseran.
            :return string: Teks terenkripsi.
            */
            $encrypted_text = "";
            $length = strlen($text);
            for ($i = 0; $i < $length; $i++) {
                $char = $text[$i];
                if (ctype_alpha($char)) {
                    $is_upper = ctype_upper($char);
                    $char = strtolower($char);
                    $shifted_char = chr(((ord($char) - ord('a') + $shift) % 26) + ord('a'));
                    if ($is_upper) {
                        $shifted_char = strtoupper($shifted_char);
                    }
                    $encrypted_text .= $shifted_char;
                } else {
                    $encrypted_text .= $char;
                }
            }
            return $encrypted_text;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $teks = $_POST["text"];
            $nomor_absen = $_POST["shift"];

            $teks_terenkripsi = caesar_encrypt($teks, $nomor_absen);

            echo "<div class='result'>";
            echo "<strong>Plaintext:</strong> " . htmlspecialchars($teks) . "<br>";
            echo "<strong>Ciphertext:</strong> " . htmlspecialchars($teks_terenkripsi) . "<br>";
            echo "<strong>Plaintext:</strong> " . htmlspecialchars($teks) . "<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
