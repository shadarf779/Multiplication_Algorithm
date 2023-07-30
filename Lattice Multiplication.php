<!DOCTYPE html>
<html>
<head>
  <title>Lattice Multiplication</title>
</head>
<body>
    <a href="Lattice Multiplication.php">Lattice Multiplication</a>
<a href="Polynomial Multiplication.php">Polynomial Multiplication</a>
  <h1>Lattice Multiplication</h1>
  <form onsubmit="multiplyNumbers(); return false;">
    <label for="num1">Number 1:</label>
    <input type="number" id="num1" required><br>
    <label for="num2">Number 2:</label>
    <input type="number" id="num2" required><br>
    <button type="submit">Multiply</button>
  </form>
  <div id="result"></div>

  <script>
    function multiplyNumbers() {
      const num1 = Number(document.getElementById("num1").value);
      const num2 = Number(document.getElementById("num2").value);

      if (isNaN(num1) || isNaN(num2)) {
        alert("Please enter valid numbers.");
        return;
      }

      const result = latticeMultiplication(num1, num2);
      document.getElementById("result").innerText = `Result: ${result}`;
    }

    function latticeMultiplication(num1, num2) {
      let lattice = [];

      while (num1 > 0) {
        lattice.push(num1 % 10);
        num1 = Math.floor(num1 / 10);
      }

      let partialResults = [];
      let shift = 0;

      while (num2 > 0) {
        const digit = num2 % 10;
        let rowResult = [];

        for (let i = 0; i < lattice.length; i++) {
          rowResult.push(digit * lattice[i]);
        }

        if (shift > 0) {
          rowResult.push(...new Array(shift).fill(0));
        }

        partialResults.push(rowResult);
        num2 = Math.floor(num2 / 10);
        shift++;
      }

      let finalResult = Array(lattice.length + partialResults.length).fill(0);

      for (let i = 0; i < partialResults.length; i++) {
        for (let j = 0; j < partialResults[i].length; j++) {
          finalResult[j + i] += partialResults[i][j];
        }
      }

      let result = 0;
      let multiplier = 1;

      for (let i = 0; i < finalResult.length; i++) {
        result += finalResult[i] * multiplier;
        multiplier *= 10;
      }

      return result;
    }
  </script>
</body>
</html>
