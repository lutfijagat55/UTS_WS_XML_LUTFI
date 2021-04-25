<?php

Header('Content-type: text/xml');
$connection = mysqli_connect("localhost", "root", "", "lutfi_xml") or die("Error " . mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');
$sql = "select * from aktris ";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//membuat array
while ($row = mysqli_fetch_assoc($result)) {

    $track = $xml->addChild('aktris');
    $track->addChild('nama', $row['nama']);
    $track->addChild('judul_film', $row['judul_film']);
    $track->addChild('asal', $row['asal']);
}

print($xml->asXML());
mysqli_close($connection);
?>