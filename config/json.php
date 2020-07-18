<?php 
$con = mysqli_connect("localhost","root","");

/*if ($con){
    echo "result:1"; 
}*/
if (!$con){
    die('Could not connect: ' . mysql_error());
    return json_encode(array('rusult' => '1', 'data' => '伺服器連接失敗'));
}

$selected = mysqli_select_db($con, "project") ;
//mysql_select_db("project", $con);

//http://stackoverflow.com/a/2467974
$query="SELECT * FROM store LIMIT 20"; 
$result=$mysqli->query($query,$con)
	or die ($mysqli->error);
//store the entire response
$response = array();
//the array that will hold the titles and links
$posts = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{ 
$title=$row['title']; 
$url=$row['url']; 
//each item from the rows go in their respective vars and into the posts array
$posts[] = array('title'=> $title, 'url'=> $url); 
} 
//the posts array goes into the response
$response['posts'] = $posts;
//creates the file
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
/* Final Output
{"posts": [
  {
    "title":"output_from_table",
    "url":"output_from_table"
  },  
  ...
]}
*/
?> 