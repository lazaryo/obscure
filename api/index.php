<?php

    require 'vendor/autoload.php';

    Flight::set('flight.log_errors', true);

    Flight::route('/', function(){
        Flight::render('home.php');
    });

    Flight::route('/dictionary', function(){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';

        $sorrows = array();
        
        $prestmt = 'SELECT * FROM words ORDER BY entry ASC';
        
        $stmt = $pdo->query($prestmt);
        while ($row = $stmt->fetch()) {
            foreach ($row as $key => $value) { 
                $sorrows[$row['entry']] = $row;
            }
        }
        echo json_encode($sorrows, JSON_PRETTY_PRINT);
    });

    Flight::route('/random', function(){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        //get max entry in DB
        $prestmt = 'SELECT entry FROM words ORDER BY entry DESC LIMIT 0, 1';

        $stmt = $pdo->query($prestmt);
        while ($row = $stmt->fetch()) {
            $max = $row['entry'];
        }
        
        //get a random number
        $rn = $n = rand(1, $max);
        
        //get random word based on a $rn
        $prestmt = "SELECT * FROM words WHERE entry = ?";
        
        $stmt = $pdo->prepare($prestmt);
        $stmt->execute([$rn]);
        while ($row = $stmt->fetch()) {
            echo json_encode($row, JSON_PRETTY_PRINT);
        };
    
    });

    Flight::route('/word/@word', function($word){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        if (!empty($word)) {
            
            //determine if $word is even in the dictionary
            $prestmt = 'SELECT * FROM words WHERE title = ?';
        
            $stmt = $pdo->prepare($prestmt);
            $stmt->execute([$word]);
            while ($row = $stmt->fetch()) {
                echo json_encode($row, JSON_PRETTY_PRINT);
            };   
        } else {
            $uhOh = array("error"=> "Missing word value.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        }
    
    });

    Flight::route('/dictionary/entry(/@entry)', function($entry){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        if (!empty($entry)) {
            if (is_numeric($entry)) {
                $prestmt = 'SELECT * FROM words WHERE entry = ?';
        
                $stmt = $pdo->prepare($prestmt);
                $stmt->execute([$entry]);
                while ($row = $stmt->fetch()) {
                    echo json_encode($row, JSON_PRETTY_PRINT);
                };
            } else {
                $uhOh = array("error"=> $entry . " is not a number.");
                echo json_encode($uhOh, JSON_PRETTY_PRINT);
            }
        } else {
            $uhOh = array("error"=> "Missing entry value.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        }
    
    });

    Flight::route('/dictionary/entry-range(/@min(/@max))', function($min, $max){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        if (empty($min) && empty($max)) {
            $uhOh = array("error"=> "Missing min and max values. Min value is required at the least.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        } else if (empty($max)) {
            
            $prestmt = 'SELECT entry FROM words ORDER BY entry DESC LIMIT 0, 1';

            $stmt = $pdo->query($prestmt);
            while ($row = $stmt->fetch()) {
                $maxEntry = $row['entry'];
            }
            
            $prestmt = 'SELECT * FROM words WHERE entry BETWEEN ? AND ? ORDER BY entry';
            $sorrows = array();

            $stmt = $pdo->prepare($prestmt);
            $stmt->execute([$min, $maxEntry]);
            while ($row = $stmt->fetch()) {
                foreach ($row as $key => $value) { 
                    $sorrows[$row['entry']] = $row;
                }
            };
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
        } else if ($min > $max) {
            $uhOh = array("error"=> "Min value is higher than the max. The min value must be at least the same as the max or lower.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        } else {
            $prestmt = 'SELECT * FROM words WHERE entry BETWEEN ? AND ? ORDER BY entry';
            $sorrows = array();

            $stmt = $pdo->prepare($prestmt);
            $stmt->execute([$min, $max]);
            while ($row = $stmt->fetch()) {
                foreach ($row as $key => $value) { 
                    $sorrows[$row['entry']] = $row;
                }
            };
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
        }
    });
                  
//    Flight::route('/quote(/@word)', function($word){
////        include_once '../_resources/php/connect.php';
//        include_once '../_resources/php/connect-dev.php';
//        
//        if (!empty($word)) {
//            $prestmt = 'SELECT * FROM words WHERE title = ?';
//
//            $stmt = $pdo->prepare($prestmt);
//            $stmt->execute([$word]);
//            if ($stmt->rowCount() > 0) {
//                while ($row = $stmt->fetch()) {
//                    if ($row['hasQuotes']) {
//                        $hasQuotes = $row['hasQuotes'];
//                        if (tableExists($pdo, $word)) {
//                            $prestmt = 'SELECT id FROM ' . $word . ' ORDER BY id DESC LIMIT 0, 1';
//                            $stmt = $pdo->query($prestmt);
//                            while ($row = $stmt->fetch()) {
//                                $max = $row['id'];
//                            }
//
//                            $rn = $n = rand(1, $max);
//                            
//                            $prestmt = "SELECT * FROM " . $word . " WHERE id = " . $rn;
//
//                            $stmt = $pdo->query($prestmt);
//                            while ($row = $stmt->fetch()) {
//                                $randomQuote = array('word'=> $word, 'hasQuotes'=> $hasQuotes, 'quote'=> $row['quote'], 'video'=> $row['video'], 'error'=> null);
//                                echo json_encode($randomQuote, JSON_PRETTY_PRINT);
//                            };
//                            $pdo = null;
//                            
//                        } else {
//                            $prestmt = 'SELECT * FROM words WHERE title = ?';
//
//                            $stmt = $pdo->prepare($prestmt);
//                            $stmt->execute([$word]);
//                            while ($row = $stmt->fetch()) {
//                                $randomQuote = array('word'=> $row['title'], 'hasQuotes'=> $row['hasQuotes'], 'quote'=> null, 'video'=> $row['video'], 'error'=> 'There are no quotes from this word in the database.');
//                                echo json_encode($randomQuote, JSON_PRETTY_PRINT);          
//                            }
//                        }
//                    } else {
//                        $prestmt = 'SELECT * FROM words WHERE title = ?';
//
//                        $stmt = $pdo->prepare($prestmt);
//                        $stmt->execute([$word]);
//                        while ($row = $stmt->fetch()) {
//                        $randomQuote = array('word'=> $row['title'], 'hasQuotes'=> $row['hasQuotes'], 'quote'=> null, 'video'=> $row['video'], 'error'=> 'This word does not have any quotes.');
//                            echo json_encode($randomQuote, JSON_PRETTY_PRINT);          
//                        }
//                    }
//                }
//            } else {
//                $badWord = array('word'=> $word, 'hasQuotes'=> null, 'quote'=> null, 'video'=> null, 'error'=> 'This word does not exist in the Dictionary of Obscure Sorrows.');
//                echo json_encode($badWord, JSON_PRETTY_PRINT);          
//            };
//        } else {
//            $uhOh = array("error"=> "Please choose a word from the Dictionary of Obscure Sorrows.");
//            echo json_encode($uhOh, JSON_PRETTY_PRINT);
//        }
//
//    });

    Flight::route('/dictionary/letter(/@letter)', function($letter){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        if (!empty($letter)) {
            $sorrows = array();
            $name = $letter."%";

            $query = "SELECT * FROM `words` WHERE `title` like :name ORDER BY entry ASC";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':name',$name);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $data = $stmt->fetchALl();

            foreach ($data as $key => $value) {
                $sorrows[$value['entry']] = $value;
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
        } else {
            $uhOh = array("error"=> "Please select a letter to retrieve data from the API.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        }
    });

    Flight::route('/speech(/@speech)', function($speech){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        if (!empty($speech)) {
            switch ($speech) {
                case 'noun':
                    $prestmt = 'SELECT * FROM words WHERE speech=?';
                    break;
                case 'adjective':
                    $prestmt = 'SELECT * FROM words WHERE speech=?';
                    break;
                default:
                    $prestmt = 'SELECT * FROM words WHERE speech=?';
            }
            $sorrows = array();

            $stmt = $pdo->prepare($prestmt);
            $stmt->execute([$speech]);

            while ($row = $stmt->fetch()) {
                foreach ($row as $key => $value) { 
                    $sorrows[$row['entry']] = $row;
                }
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
        } else {
            $uhOh = array("error"=> "Please select a part of speech (adjective or noun) to retrieve data from the API.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        }
    });

    Flight::route('/video(/@video)', function($video){
//        include_once '../_resources/php/connect.php';
        include_once '../_resources/php/connect-dev.php';
        
        if (!empty($video)) {
            switch ($video) {
                case 'true':
                    $prestmt = 'SELECT * FROM words WHERE video IS NOT NULL';
                    break;
                default:
                    $prestmt = 'SELECT * FROM words WHERE video IS NULL';
            }
            $sorrows = array();

            $stmt = $pdo->query($prestmt);
            while ($row = $stmt->fetch()) {
                foreach ($row as $key => $value) { 
                    $sorrows[$row['entry']] = $row;
                }
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
        } else {
            $uhOh = array("error"=> "Please make sure to have true or false to retrieve data may or may not provide a video link.");
            echo json_encode($uhOh, JSON_PRETTY_PRINT);
        }
    });

    Flight::start();

    function tableExists($pdo, $table) {

        // Try a select statement against the table
        // Run it in try/catch in case PDO is in ERRMODE_EXCEPTION.
        try {
            $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
        } catch (Exception $e) {
            // We got an exception == table not found
            return FALSE;
        }

        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        return $result !== FALSE;
    }

    function modify($str) {
        return str_replace(" ", "_", $str);
    }

?>