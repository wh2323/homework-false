<?php
$sum = 0;
for ($i = 1; $i <= 30; $i++) {
  $sum += $i;
}

echo "1 + 2 + 3 + 4 + 5 + 6 + 7 + 8 + 9 + 10 + 11 + 12 + 13 + 14 + 15 + 16 + 17 + 18 + 19 + 20 + 21 + 22 + 23 + 24 + 25 + 26 + 27 + 28 + 29 + 30 = " . $sum;
?>

<?php
$factorial = 1;
for ($i = 1; $i <= 30; $i++) {
  $factorial *= $i;
}

echo "<br>1 x 2 x 3 x 4 x 5 x 6 x 7 x 8 x 9 x 10 x 11 x 12 x 13 x 14 x 15 x 16 x 17 x 18 x 19 x 20 x 21 x 22 x 23 x 24 x 25 x 26 x 27 x 28 x 29 x 30 = " . $factorial;
?>

<?php
$n = 30; // 생성할 랜덤 숫자 개수
$numbers = array(); // 랜덤 숫자들을 저장할 배열

// $n 개의 랜덤한 숫자를 생성하여 배열에 저장
for ($i = 0; $i < $n; $i++) {
    $numbers[] = rand(10, 100);
}

// 생성된 랜덤한 숫자들을 출력
echo "<br>생성된 랜덤한 숫자: ";
for ($i = 0; $i < $n; $i++) {
    echo $numbers[$i] . " ";
}
echo "\n";

// 배열을 오름차순으로 정렬
sort($numbers);

// 정렬된 숫자들을 출력
echo "<br>오름차순으로 정렬된 숫자: ";
for ($i = 0; $i < $n; $i++) {
    echo $numbers[$i] . " ";
}
echo "<br>";
?>

<?php
$prev = 0;
$current = 1;

for($i = 1; $i <= 5; $i++) {
  $ratio = ($prev == 0) ? 0 : $current / $prev; // 이전 항이 0인 경우 0으로 처리
  echo $i." ".$current." ".$ratio."<br>";
  $next = $prev + $current;
  $prev = $current;
  $current = $next;
}
?>

<?php
if(isset($_POST["submit"])) {
  $shape = $_POST["shape"];
  $result = "";

  switch($shape) {
    case "triangle":
      $width = $_POST["width"];
      $height = $_POST["height"];
      $result = "삼각형의 면적은 " . ($width * $height / 2) . "입니다.";
      break;
    case "rectangle":
      $width = $_POST["width"];
      $height = $_POST["height"];
      $result = "직사각형의 면적은 " . ($width * $height) . "입니다.";
      break;
    case "circle":
      $radius = $_POST["radius"];
      $result = "원의 면적은 " . (pi() * $radius * $radius) . "입니다.";
      break;
    case "cuboid":
      $width = $_POST["width"];
      $height = $_POST["height"];
      $length = $_POST["length"];
      $result = "직육면체의 체적은 " . ($width * $height * $length) . "입니다.";
      break;
    case "cylinder":
      $radius = $_POST["radius"];
      $height = $_POST["height"];
      $result = "원기둥의 체적은 " . (pi() * $radius * $radius * $height) . "입니다.";
      break;
    case "sphere":
      $radius = $_POST["radius"];
      $result = "구의 체적은 " . (4/3 * pi() * $radius * $radius * $radius) . "입니다.";
      break;
    default:
      $result = "도형을 선택해주세요.";
      break;
  }
  echo $result;
}
?>

<form method="post">
  <select name="shape">
    <option value="triangle">삼각형</option>
    <option value="rectangle">직사각형</option>
    <option value="circle">원</option>
    <option value="cuboid">직육면체</option>
    <option value="cylinder">원기둥</option>
    <option value="sphere">구</option>
  </select>
  <br>
  <input type="number" name="width" placeholder="가로/반지름">
  <input type="number" name="height" placeholder="세로/높이/반지름 (원기둥)">
  <input type="number" name="length" placeholder="길이 (직육면체)">
  <input type="submit" name="submit" value="계산">
</form>

<?php
$year = $_POST["year"] ?? date("Y");
$month = $_POST["month"] ?? date("n");
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$firstDayOfMonth = date("w", strtotime("$year-$month-01"));
$lastDayOfMonth = date("w", strtotime("$year-$month-$daysInMonth"));

echo "<table>";
echo "<caption>{$year}년 {$month}월</caption>";
echo "<tr><th>일</th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th><th>토</th></tr>";
echo "<tr>";
for ($i = 0; $i < $firstDayOfMonth; $i++) {
  echo "<td></td>";
}
for ($i = 1; $i <= $daysInMonth; $i++) {
  echo "<td>{$i}</td>";
  if (($i + $firstDayOfMonth - 1) % 7 == 6 && $i < $daysInMonth) {
    echo "</tr><tr>";
  }
}
for ($i = $lastDayOfMonth; $i < 6; $i++) {
  echo "<td></td>";
}
echo "</tr>";
echo "</table>";
?>

<form method="post">
  <label for="year">연도:</label>
  <input type="number" name="year" value="<?php echo $year; ?>">
  <label for="month">월:</label>
  <input type="number" name="month" value="<?php echo $month; ?>">
  <input type="submit" value="달력 보기">
</form>