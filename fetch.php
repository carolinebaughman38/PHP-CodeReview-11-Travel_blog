<?php

ob_start();
session_start();
require_once 'dbconnect.php';

// fetch to_do
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query_to_do = "
  SELECT * FROM location 
  INNER JOIN to_do ON location.fk_to_do_id=to_do.id
  WHERE to_do_name LIKE '%".$search."%'
 ";
}
else
{
 $query_to_do = "
  SELECT * FROM location
  INNER JOIN to_do ON location.fk_to_do_id=to_do.id
 ";
}

$result = mysqli_query($conn, $query_to_do);
if(mysqli_num_rows($result) > 0)
{
  while($value = mysqli_fetch_array($result))
  {
 echo "<li class='media mt-2'>
      <img class='mr-3' width='250px' src='".$value["to_do_image"]."'>
      <div class='media-body'>
            <h5 class='mt-0 mb-1'>" .$value["to_do_name"]."</h5><br>
            <p>". $value["to_do_short_description"]."</p>
            <p>Type of To-Do: ". $value["to_do_type"]."</p>
            <p>ADDRESS: ". $value["zip"]." ". $value["city"].", ".$value["country"].", ". $value["address"]."</p><br>
            <p>For more information: <a href=".$value["to_do_web_address"].">".$value["to_do_web_address"]."</a></p>";
        if(isset($_SESSION['admin'])) {
        echo "<a class='btn btn-success mb-3 mt-4' href='update_todo.php?id=".$value["fk_to_do_id"]."'>update</a><br>
          <a class='btn btn-danger' href='delete.php?id=".$value["fk_to_do_id"]."'>delete</a><br>";
  }echo "</div>
        </li><hr/>";
      }
}

// fetch concert 
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query_concert = "
  SELECT * FROM location 
  INNER JOIN concert ON location.fk_concert_id=concert.id
  WHERE concert_name LIKE '%".$search."%'
 ";
}
else{
 $query_concert = "
  SELECT * FROM location
  INNER JOIN concert ON location.fk_concert_id=concert.id
 ";
}

$result = mysqli_query($conn, $query_concert);
if(mysqli_num_rows($result) > 0)
{
  while($value = mysqli_fetch_array($result))
  {
 echo "<li class='media mt-2'>
      <img class='mr-3' width='250px' src='".$value["concert_image"]."'>
      <div class='media-body'>
            <h5 class='mt-0 mb-1'>" .$value["concert_name"]."</h5><br>
            <p>". $value["concert_short_description"]."</p>
            <p>". $value["date"]." at ".$value["time"]."</p>
            <p>Ticket: ".$value["ticket"]."</p>
            <p>ADDRESS: ". $value["zip"]." ". $value["city"].", ".$value["country"].", ". $value["address"]."</p><br>
            <p>For more information: <a href=".$value["concert_web_address"].">".$value["concert_web_address"]."</a></p>";
        if(isset($_SESSION['admin'])) {
        echo "<a class='btn btn-success mb-3 mt-4' href='update.php?id=".$value["fk_concert_id"]."'>update</a><br>
          <a class='btn btn-danger' href='delete.php?id=".$value["fk_concert_id"]."'>delete</a><br>";
  }echo "</div>
        </li><hr/>";
      }
}

//fetch restaurant
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query_restaurant = "
  SELECT * FROM location 
  INNER JOIN restaurant ON location.fk_restaurant_id=restaurant.id
  WHERE restaurant_name LIKE '%".$search."%'
 ";
}
else{
 $query_restaurant = "
  SELECT * FROM location
  INNER JOIN restaurant ON location.fk_restaurant_id=restaurant.id
 ";
}

$result = mysqli_query($conn, $query_restaurant);
if(mysqli_num_rows($result) > 0)
{
  while($value = mysqli_fetch_array($result))
  {
 echo "<li class='media mt-2'>
      <img class='mr-3' width='250px' src='".$value["restaurant_image"]."'>
      <div class='media-body'>
            <h5 class='mt-0 mb-1'>" .$value["restaurant_name"]."</h5><br>
            <p>". $value["restaurant_short_description"]."</p>
            <p>Type of cuisine: ". $value["restaurant_type"]."</p>
            <p>Telephone: ".$value["telephone"]."</p>
            <p>ADDRESS: ". $value["zip"]." ". $value["city"].", ".$value["country"].", ". $value["address"]."</p><br>
            <p>For more information: <a href=".$value["restaurant_web_address"].">".$value["restaurant_web_address"]."</a></p>";
        if(isset($_SESSION['admin'])) {
        echo "<a  class='btn btn-success mb-3 mt-4'href='update_restaurant.php?id=".$value["fk_restaurant_id"]."'>update</a><br>
          <a class='btn btn-danger' href='delete.php?id=".$value["fk_restaurant_id"]."'>delete</a><br>";
  }echo "</div>
        </li><hr/>";
      }
}
else
{
 echo '';
}


?>