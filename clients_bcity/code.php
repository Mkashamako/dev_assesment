<?php

session_start();
require 'dbcon.php';
require 'acro_gen.php';



if(isset($_POST['delete_contact']))
{
    $contact_id = mysqli_real_escape_string($con, $_POST['delete_contact']);

    $query = "DELETE  FROM contacts WHERE id='$contact_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Contact Deleted Successfully";
        header("Location: contact-view.php");
        exit(0);

    }
    else
    {
        $_SESSION['message'] = "Contact Not Deleted";
        header("Location: contact-view.php");
        exit(0);
    }

}

if(isset($_POST['save_contact']))
{
    $fname  = mysqli_real_escape_string ($con, $_POST['name']);
    $lname  = mysqli_real_escape_string ($con, $_POST['lname']);
    $email  = mysqli_real_escape_string ($con, $_POST['email']);

    $query = "INSERT INTO contacts (name, lname,email) VALUES ('$fname', '$lname', '$email' ) ";

    $query_run = mysqli_query($con, $query);
    if ($query_run)
    {
        $_SESSION['message'] = "Contact Created Successfully";
        header("Location: contact-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Contact Not Created";
        header("Location: contact-view.php");
        exit(0);
    }

}

if(isset($_POST['delete_client']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['delete_client']);

    $query = "DELETE  FROM clients WHERE id='$client_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Deleted Successfully";
        header("Location: index.php");
        exit(0);

    }
    else
    {
        $_SESSION['message'] = "Client Not Deleted";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['save_client']))
{
    $name  = mysqli_real_escape_string ($con, $_POST['name']);

    $query = "INSERT INTO clients (name,acro_char) VALUES ('$name', '$v') ";

    $query_run = mysqli_query($con, $query);
    if ($query_run)
    {
        $_SESSION['message'] = "Client Created Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Created";
        header("Location: index.php");
        exit(0);
    }

}


?>