<?php
    // Connect to DB
//	include 'connect.php';
	include 'connect-dev.php';

	$title = $_POST['sorrow-title'];
	$nonLatin = $_POST['sorrow-title'];
	$author = $_POST['sorrow-author'];
	$authorPicture = $_POST['sorrow-author-picture'];
	$definition = $_POST['sorrow-definition'];
	$speech = $_POST['sorrow-speech'];
	$entry = $_POST['sorrow-entry'];

    if (isset($_POST['sorrow-video'])) {
        $video = $_POST['sorrow-video'];
    } else {
        $video = NULL;
    }

    if ($_POST['sorrow-quotes']) {
        $hasQuotes = 1;
    } else {
        $hasQuotes = 0;
    }

    $data = [
        'title' => $title,
        'nonLatin' => $nonLatin,
        'author' => $author,
        'authorPicture' => $authorPicture,
        'definition' => $definition,
        'speech' => $speech,
        'video' => $video,
        'entry' => $entry,
        'hasQuotes' => $hasQuotes
    ];

    echo '<pre>';
    print_r($data);
    echo '</pre>';

    $prestmt = "INSERT INTO words (title, non_latin_title, author, authorPicture, definition, speech, video, entry, hasQuotes) VALUES (:title, :nonLatin, :author, :authorPicture, :definition, :speech, :video, :entry, :hasQuotes)";
    $stmt = $pdo->prepare($prestmt);
    $stmt->execute($data);

    echo '<p>all good</p>';
    $pdo = null;
?>