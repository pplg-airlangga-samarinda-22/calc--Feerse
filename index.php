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

<?php
$num1 = $_POST['num1'] ?? '';
$operation = $_POST['operation'] ?? '';
$num2 = $_POST['num2'] ?? '';
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
      $result = $num2 != 0 ? $num1 / $num2 : 'Tidak dapat dibagi dengan nol.';
      break;
  }

  if (isset($_POST['isNum1InputResult'])) {
    $num1 = $result;
?>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.getElementById('isNum1InputResult');
        if (checkbox) {
          checkbox.checked = true;
        }
      });
    </script>
<?php
  } else {
    $num1 = '';
  }
}
?>

<body>
  <h1>Kalkulator Sederhana</h1>
  <form method="post">
    <input step="any" type="number" value="<?= $num1 ?>" name="num1" placeholder="Angka pertama" required />
    <select name="operation" required>
      <option value="" disabled selected>Pilih operasi</option>
      <option value="tambah">Tambah (+)</option>
      <option value="kurang">Kurang (-)</option>
      <option value="kali">Kali (*)</option>
      <option value="bagi">Bagi (/)</option>
    </select>
    <input step="any" type="number" name="num2" placeholder="Angka kedua" required />
    <div>
      <input type="checkbox" name="isNum1InputResult" id="isNum1InputResult" />
      <label for="isNum1InputResult">Isi otomatis bilangan pertama berdasarkan hasil</label>
    </div>
    <br>
    <button type="submit">Hitung</button>
  </form>

  <?php if ($result !== ''): ?>
    <h2>Hasil: <?= $result ?></h2>
  <?php endif; ?>
</body>

</html>