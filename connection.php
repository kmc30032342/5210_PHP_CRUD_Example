<?php

    // Database credentials
    $user = "";
    $pw = "";
    $db = "";
    
    // Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    // variable that returns all records in database
    $result = $connection->query("select * from truck");
    
    // check if form data has been send via post
    if(isset($_POST['submit']))
    {
        // create variables from our form post data
        //using object oriented style
        $model = $connection -> real_escape_string($_POST['model']);
        $heading = $connection -> real_escape_string($_POST['heading']);
        $tagline = $connection -> real_escape_string($_POST['tagline']);
        $description = $connection -> real_escape_string($_POST['description']);
        $image = $connection -> real_escape_string($_POST['image']);
        
        // create a sql insert command
        $insert = "insert into truck(model, heading, tagline, description, image) 
        values('$model', '$heading', '$tagline', '$description', '$image')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
            
                <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
            
                <h1>Record added successfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
            
                <h1>Error submitting data</h1>
                <p>{$connection->error}</p>
                <p><a href='form.php'>Return to form</a></p>
            
            ";
        }
    } // end isset post
    
    
    // check if form data has been send via post
    if(isset($_POST['update']))
    {
        // create variables from our form post data
        $id = $connection -> real_escape_string($_POST['id']);
        $model = $connection -> real_escape_string($_POST['model']);
        $heading = $connection -> real_escape_string($_POST['heading']);
        $tagline = $connection -> real_escape_string($_POST['tagline']);
        $description = $connection -> real_escape_string($_POST['description']);
        $image = $connection -> real_escape_string($_POST['image']);
        
        // create a sql update command
        $update = "update truck set model='$model', heading='$heading', tagline='$tagline', description='$description', image='$image' where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "
            
                <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
            
                <h1>Record updated successfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
            
            <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 15px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error updating data</h1>
                <p>{$connection->error}</p>
                <p><a href='update.php'>Return to update form</a></p>
            
            ";
        }
    } // end update post
    
    
    // delete record
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        // delete sql command
        $del = "delete from truck where id=$id";
        
        if($connection->query($del) === true)
        {
            echo "
            
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record Deleted</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
            
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error deleting record</h1>
                <p>{$connection->error}</p>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }

?>