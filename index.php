<!DOCTYPE html>
<html>

<head>
  <title>Kalkulator Sederhana</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
    }

    h1 {
      color: #333;
    }

    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input[type="number"],
    select {
      width: calc(100% - 22px);
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #5cb85c;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #4cae4c;
    }

    h2 {
      color: #333;
    }
  </style>
</head>

<body>
  <h1>Kalkulator Sederhana</h1>
  <form method="post">
    <input type="number" name="num1" placeholder="Angka pertama" required>
    <select name="operation">
      <option value="" disabled selected>Pilih operasi</option>
      <option value="tambah">+</option>
      <option value="kurang">-</option>
      <option value="kali">*</option>
      <option value="bagi">/</option>
    </select>
    <input type="number" name="num2" placeholder="Angka kedua" required>
    <button type="submit" name="submit" value="calculate">Hitung</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = 0;

    switch ($operation) {
      case 'tambah':
        $result = $num1 + $num2;
        break;
      case 'kurang':
        $result = $num1 - $num2;
        break;
      case 'kali':
        $result = $num1 * $num2;
        break;
      case 'bagi':
        if ($num2 != 0) {
          $result = $num1 / $num2;
        } else {
          $result = "Tidak bisa membagi dengan nol";
        }
        break;
      default:
        $result = "Operasi tidak valid";
        break;
    }

    echo "<h2>Hasil: $result</h2>";
  }
  ?>
</body>

</html>