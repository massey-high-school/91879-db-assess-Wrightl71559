<!DOCTYPE HTML>

<html lang="en">

<?php
    
session_start(); // to allow variable transfer between pages
include ("config.php");
include ("functions.php");  // include data sanitising
    
// connect to database
$dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(mysqli_connect_errno()) {
    echo "Connection failed:".mysqli_connect_error();
    exit;
}
?>
    
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Review Database">
    <meta name="keywords" content="books, reading, fiction, non-fiction, genre, reviews">
    <meta name="author" content="L Wright">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Food Reviews</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
        <!-- logo image linking to home page goes here -->
        <a href="index.php">
            <div class="box logo"  title="Click here to go to the Home Page">
            <img class="img-circle" src="images/spaghetti-2931846_960_720.jpg" width="150" height="150" alt="Food logo" />
            
            </div>    <!-- / logo -->
        </a>
            
            <h1>Fabulous Food</h1>
        </div>    <!-- / banner -->


        
        <div class = "box side">
            <h2>Search | <a class="side" href="show_all.php">Show All</a></h2>
            <i>Type part of the Meal/ Location's name if desired</i>
            
            <hr />
            
            <!-- Start of meal search -->

            <form method="post" action="meal_search.php" enctype="multipart/form-data"> 
            
            <input class="search" type="text" name="meal" size="40"  value="" required placeholder="Meal..."/>
            <input class="submit" type="submit" name="find_meal" value="&#xf002;"/>
            </form>
            
            <!-- End of meal search -->
            <hr />
            
            <!-- Start of location search -->

            <form method="post" action="location_search.php" enctype="multipart/form-data"> 
            
            <input class="search" type="text" name="location" size="40"  value="" required placeholder="Location..."/>
            <input class="submit" type="submit" name="find_location" value="&#xf002;"/>
            </form>
            
            <!-- End of location search -->
            <hr/>
            
             <i>Use the dropdown menus to search by Vegetarian options, Course or Rating</i>
            <hr/>
            <!-- Start of Vegetarian search -->
            <form method="post" action="vegetarian_search.php" enctype="multipart/form-data"> 
            
           
            <select name="vegetarian" class="full_width" required>
                <option value="" disabled selected>Vegetarian...</option>
                <option value="yes">Vegetarian</option>
            </select>
                
            <input class="submit" type="submit" name="find_vegetarian" value="&#xf002;"/>
            </form>   
            <!-- end of vegetarian search -->
             <hr/>           

            <!-- Start of course search -->
            <form method="post" action="course_search.php" enctype="multipart/form-data"> 
            
           
            <select name="course" class="full_width" required>
                <option value="" disabled selected>Course...</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Dessert">Dessert</option>
            </select>
                
            <input class="submit" type="submit" name="find_course" value="&#xf002;"/>
            </form>   
            <!-- End of course search -->
            <hr />
            
            <!-- Start of ratings form -->
            <b>Rating Search</b>
            <form method="post" action="rating_search.php" enctype="multipart/form-data"> 
            
            <select class="half_width" name="amount">
                <option value="exactly">Exactly...</option>
                <option value="more" selected>At least...</option>
                <option value="less">At most...</option>
            </select>
                
            <select class="half_width" name="stars">
                <option value=1>&#9733;</option>
                <option value=2>&#9733;&#9733;</option>
                <option value=3 selected>&#9733;&#9733;&#9733;</option>
                <option value=4>&#9733;&#9733;&#9733;&#9733;</option>
                <option value=5>&#9733;&#9733;&#9733;&#9733;&#9733;</option>
            </select>
                
                <input class="submit" type="submit" name="find_rating" value="&#xf002;"/>
                
            </form>
            
            <!-- Start of ratings form -->
            
        </div> <!-- / side bar -->
        