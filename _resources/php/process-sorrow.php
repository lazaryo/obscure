<?php
	$title = $_POST['sorrow-title'];
	$author = $_POST['sorrow-author'];
	$authorPicture = $_POST['sorrow-author-picture'];
	$definition = $_POST['sorrow-definition'];
	$speech = $_POST['sorrow-speech'];
	$entry = $_POST['sorrow-entry'];

//	 echo '<pre>';
//		 print_r($_POST);
//	 echo '</pre>';

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "obscure_sorrows";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo "Connected successfully"; 

		$stmt = $conn->prepare("INSERT INTO words (title, author, authorPicture, definition, speech, video, entry) 
			VALUES (:title, :author, :authorPicture, :definition, :speech, :video, :entry)");
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':author', $author);
		$stmt->bindParam(':authorPicture', $authorPicture);
		$stmt->bindParam(':definition', $definition);
		$stmt->bindParam(':speech', $speech);
        
        if (isset($_POST['sorrow-video'])) {
		  $stmt->bindParam(':video', $video);
        } else {
            $stmt->bindParam(':video', NULL);
        }
        
		$stmt->bindParam(':entry', $entry);

		$stmt->execute();
        
        echo $title . ' was successfully added to the database.';
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

	// End connection
	$conn = null;
?>