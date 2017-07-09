<?php
    // Connect to DB
	include 'hupd.php';

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
                    $word = "<li class='list-group-item " . $row['title'] . "'><a href='http://localhost:8888/obscure/api/word/" . $row['title'] . "' target='_blank'>";
                    $word .= $row['title'] . "</a>";
                    $word .= "<i class='fa fa-clipboard btn' aria-hidden='true' data-clipboard-text='http://localhost:8888/obscure/api/word/" . $row['title'] . "'></i></li>";
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