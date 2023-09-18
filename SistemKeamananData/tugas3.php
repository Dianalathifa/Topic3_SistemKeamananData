<!DOCTYPE html>
<html>
<head>
    <title>Vigenere Cipher</title>
    <style>
        /* CSS untuk styling halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[readonly] {
            background-color: #eee;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <h1>Vigenere Cipher</h1>
    
    <div class="container">
        <label for="plainText">Plaintext:</label>
        <input type="text" id="plainText"><br>
        
        <label for="key">Key:</label>
        <input type="text" id="key"><br>
        
        <button onclick="encrypt()">Encrypt</button>
        <button onclick="decrypt()">Decrypt</button><br><br>
        
        <label for="cipherText">Ciphertext:</label>
        <input type="text" id="cipherText" readonly><br><br>
        
        <label for="decryptedText">Decrypted Text:</label>
        <input type="text" id="decryptedText" readonly><br><br>
    </div>

    <script>
        // Fungsi untuk melakukan enkripsi dengan Vigenere Cipher
        function vigenere_encrypt(plain_text, key) {
            let encrypted_text = "";
            let key_len = key.length;
            
            for (let i = 0; i < plain_text.length; i++) {
                let char = plain_text.charAt(i);
                if (char.match(/[a-zA-Z]/)) {
                    let key_char = key.charAt(i % key_len);
                    let shift = key_char.toLowerCase().charCodeAt(0) - 'a'.charCodeAt(0);
                    let isUpperCase = char === char.toUpperCase();
                    let baseCharCode = isUpperCase ? 'A'.charCodeAt(0) : 'a'.charCodeAt(0);
                    let charCode = char.charCodeAt(0);
                    let encrypted_char = String.fromCharCode((charCode - baseCharCode + shift + 26) % 26 + baseCharCode);
                    encrypted_text += encrypted_char;
                } else {
                    encrypted_text += char;
                }
            }
            
            return encrypted_text;
        }

        // Fungsi untuk melakukan dekripsi dengan Vigenere Cipher
        function vigenere_decrypt(cipher_text, key) {
            let decrypted_text = "";
            let key_len = key.length;
            
            for (let i = 0; i < cipher_text.length; i++) {
                let char = cipher_text.charAt(i);
                if (char.match(/[a-zA-Z]/)) {
                    let key_char = key.charAt(i % key_len);
                    let shift = key_char.toLowerCase().charCodeAt(0) - 'a'.charCodeAt(0);
                    let isUpperCase = char === char.toUpperCase();
                    let baseCharCode = isUpperCase ? 'A'.charCodeAt(0) : 'a'.charCodeAt(0);
                    let charCode = char.charCodeAt(0);
                    let decrypted_char = String.fromCharCode((charCode - baseCharCode - shift + 26) % 26 + baseCharCode);
                    decrypted_text += decrypted_char;
                } else {
                    decrypted_text += char;
                }
            }
            
            return decrypted_text;
        }

        // Fungsi untuk mengenkripsi teks saat tombol "Encrypt" ditekan
        function encrypt() {
            let plainText = document.getElementById("plainText").value;
            let key = document.getElementById("key").value;
            let cipherText = vigenere_encrypt(plainText, key);
            document.getElementById("cipherText").value = cipherText;
        }

        // Fungsi untuk mendekripsi teks saat tombol "Decrypt" ditekan
        function decrypt() {
            let cipherText = document.getElementById("cipherText").value;
            let key = document.getElementById("key").value;
            let decryptedText = vigenere_decrypt(cipherText, key);
            document.getElementById("decryptedText").value = decryptedText;
        }
    </script>
</body>
</html>
