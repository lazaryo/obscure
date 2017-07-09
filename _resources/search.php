<?php
    // Connect to DB
	include 'hupd.php';

    // set the base url for the api
    function url() {
        if(isset($_SERVER['HTTPS'])){
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        }
        else{
            $protocol = 'http';
        }
        return $protocol . "://" . $_SERVER['HTTP_HOST'] . "/obscure-sorrows/api/";
    }
    $base = url();

    // Attempt search query execution
    try{
        if(isset($_REQUEST['term'])){
            // create prepared statement
            $sql = "SELECT * FROM words WHERE title LIKE :term";
            $stmt = $pdo->prepare($sql);
            $term = '%' . $_REQUEST['term'] . '%';
            // bind parameters to statement
            $stmt->bindParam(':term', $term);
            // execute the prepared statement
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()){
                    $word = "<li class='list-group-item " . $row['title'] . "'><a href='" . $base . "word/" . $row['title'] . "' target='_blank'>";
                    $word .= $row['title'] . "</a>";
                    $word .= "<i class='fa fa-clipboard btn' aria-hidden='true' data-clipboard-text='" . $base . "word/" . $row['title'] . "'></i></li>";
                    echo $word;
                }
            } else{
                echo "<li class='list-group-item'>No matches found</li>";
            }
        }  
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
?>