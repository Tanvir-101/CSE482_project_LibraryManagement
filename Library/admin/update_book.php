<?php

$student_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "SELECT * FROM books WHERE book_id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>Book Name</td>
      <td><input type='text' id='edit-fname' value='{$row["book_name"]}'>
          <input type='text' id='edit-id' hidden value='{$row["book_id"]}'>
      </td>
    </tr>
    <tr>
      <td>Author Name</td>
      <td><input type='text' id='edit-lname' value='{$row["author_name"]}'></td>
    </tr>
    <tr>
      <td>Category Name</td>
      <td><input type='text' id='edit-fnames' value='{$row["cat_name"]}'></td>
    </tr>
    <tr>
      <td>Book Price</td>
      <td><input type='text' id='edit-lnames' value='{$row["book_price"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
