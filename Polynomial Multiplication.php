<!DOCTYPE html>
<html>
<head>
  <title>Polynomial Multiplication</title>
  
</head>
<body>
<a href="Lattice Multiplication.php">Lattice Multiplication</a>
<a href="Polynomial Multiplication.php">Polynomial Multiplication</a>

  <h1>Polynomial Multiplication</h1>
  <form onsubmit="multiplyPolynomials(); return false;">
    <label for="poly1">Number 1:</label>
    <input type="text" id="poly1" name="poly1" required><br>
    <label for="poly2">Number 2:</label>
    <input type="text" id="poly2" name="poly2" required><br>
    <button type="submit">Multiply</button>
  </form>
  <div id="result"></div>

  <script>
    function multiplyPolynomials() {
  const poly1Input = document.getElementById('poly1').value;
  const poly2Input = document.getElementById('poly2').value;

  const poly1Coefficients = poly1Input.split(' ').map(parseFloat);
  const poly2Coefficients = poly2Input.split(' ').map(parseFloat);

  const result = polynomialMultiplication(poly1Coefficients, poly2Coefficients);
  displayResult(result);
}

function polynomialMultiplication(poly1, poly2) {
  const resultLength = poly1.length + poly2.length - 1;
  const result = new Array(resultLength).fill(0);

  for (let i = 0; i < poly1.length; i++) {
    for (let j = 0; j < poly2.length; j++) {
      result[i + j] += poly1[i] * poly2[j];
    }
  }

  return result;
}

function displayResult(result) {
  const resultDiv = document.getElementById('result');
  resultDiv.innerHTML = '<h2>Result:</h2>';
  resultDiv.innerHTML += result.join(' ');
}

  </script>
  <script src="script.js"></script>
</body>
</html>
