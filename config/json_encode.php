<?php 
//http://stackoverflow.com/a/6282007
$return_arr = array();
$fetch = mysql_query("SELECT * FROM table"); 
while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
    $row_array['id'] = $row['id'];
    $row_array['col1'] = $row['col1'];
    $row_array['col2'] = $row['col2'];
    array_push($return_arr,$row_array);
}
echo json_encode($return_arr);
/*returns a string like so:
[{"id":"1","col1":"col1_value","col2":"col2_value"},{"id":"2","col1":"col1_value","col2":"col2_value"}]
*/
?>