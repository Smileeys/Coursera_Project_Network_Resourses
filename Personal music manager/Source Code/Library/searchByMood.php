<html>
<body>
	<link rel="stylesheet" type="text/css" href="style1.css">

<?php
echo"hello";
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Music";
$mood2 = $_POST['Moods'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "$mood2";
$sql = "select A.artist_name,T.track_name,G.genre_name,Al.album_name,T.year,T.link from Artist A join Tracks T join Genre G join Album al join Mood M on A.id=T.id AND T.genre_id=G.genre_id AND Al.album_id=T.album_id and M.track_no=T.track_no where mood_description='$mood2'; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
for($i = 0; $i < $result->num_rows; $i++) 
	{
      $row = $result->fetch_assoc();
      echo "Artist name: " . $row["artist_name"]. "<br>";
      echo " Track Name: " . $row["track_name"].  "<br>"; 
      echo " Genre: " . $row["genre_name"] . "<br>";
      echo "Album Name :" . $row["album_name"] ."<br>";
      echo "Year :" . $row["year"] . "<br>";
  //    echo "LINK :" . $row["link"] ."<br>";
      
      $ho = $row["link"];
      
          echo "<audio controls='controls'>";
	echo "<source src='$ho'  />";
	echo "</audio>";
    echo "<br>";
    echo "----------------------------------------"."<br>";
    }
} else {
    echo "<h1>0 results</h1>";
}
$conn->close();
?>
<form action="SearchByMood1.php" method="post">
<button name="subject" type="submit" value="search">back</button>
</form>
<form action="firstpageSorted2.php" method="post">
<button name="subject" type="submit" value="search">Main Page</button>
</form>
</body>
</html>