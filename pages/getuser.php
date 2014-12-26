<?php

/*$q = intval($_GET['q']);

$query = "SELECT * FROM \"Batiment\" WHERE nom = '" . $q . "'";
$resultset = $this->_db->prepare($query);
$resultset->execute();
$array = array();
$i = 0;
while ($data = $resultset->fetch()) {
    $array[$i]["id_batiment"] = utf8_encode($data["id_batiment"]);
    $array[$i]["nom"] = utf8_encode($data["nom"]);
    $array[$i]["lieu_bat"] = utf8_encode($data["lieu_bat"]);
    $i++;
}
return $array;*/

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

/*while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";*/

?>