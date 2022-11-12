<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$is_City = FALSE;

if (isset($_GET['lookup']) || !empty($_GET['lookup'])){
  if (isset($_GET['country']) || !empty($_GET['country'])){
    $country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code = country_code WHERE countries.name LIKE '%$country%'");
    $is_City = TRUE;
  }
  else{
    $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities");
    $is_City = TRUE;
  }
}
if (!isset($_GET['lookup']) || empty($_GET['lookup'])){
  if (isset($_GET['country']) || !empty($_GET['country'])){
    $country = filter_var($_GET['country'], FILTER_SANITIZE_STRING);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $is_City = FALSE;
  }
  else{
  $stmt = $conn->query("SELECT * FROM countries");
  $is_City = FALSE;
  }
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($is_City == TRUE): ?>
  <table>
    <tr>
      <th>Name</th>
      <th>District</th>
      <th>Population</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
      </tr>
      <?php endforeach; ?>
</table>
<?php endif; ?>

<?php if ($is_City == FALSE): ?>
  <table>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </tr>

    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['continent']; ?></td>
        <td><?= $row['independence_year']; ?></td>
        <td><?= $row['head_of_state']; ?></td>
      </tr>
      <?php endforeach; ?>
  </table>
<?php endif; ?>
