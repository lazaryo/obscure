<?php
    require __DIR__ . '/vendor/autoload.php';
    include_once '../_resources/connect.php';
    
    $app = new Slim\App;

//    $app->add(function ($request, $response, $next) {
//        return $response->withHeader('Acess-Control-Allow-Methods', 'GET, OPTIONS')
//            ->withAddedHeader('Access-Control-Allow-Origin', '*')
//            ->withAddedHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization')
//            ->withHeader('Content-type', 'application/json; charset=utf-8');
//    });

    $app->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    });


    // Get container
    $container = $app->getContainer();

    // Register component on container
    $container['view'] = function ($container) {
        $view = new \Slim\Views\Twig('../_resources/templates', [
            'cache' => false
        ]);

        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
        $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

        return $view;
    };

    // Render Twig template in route
    $app->get('/', function ($request, $response, $args) {
        return $this->view->render($response, 'home.html', [
            'name' => 'home'
        ]);
    })->setName('home');

    $app->get('/dictionary', function ($request, $response, $args) {
        get_dictionary();
    });

    $app->get('/speech/{speech}', function ($request, $response, $args) {
        get_words_by_speech($args['speech']);
    });

    $app->get('/video/{video}', function ($request, $response, $args) {
        get_words_by_video($args['video']);
    });

    $app->get('/dictionary/letter/{letter}', function ($request, $response, $args) {
        get_word_by_letter($args['letter']);
    });

    $app->get('/dictionary/entry/{entry}', function ($request, $response, $args) {   
        get_word_by_entry($args['entry']);
    });

    $app->get('/random', function($request, $response, $args) {
        get_random_word();
    });

    $app->get('/word/{word}', function($request, $response, $args) {
        get_word($args['word']);
    });

    $app->run();

    function get_word($word) {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            $sql = 'SELECT * FROM words WHERE title="' . $word . '"';
            foreach ($db->query($sql) as $row) {
                echo json_encode($row, JSON_PRETTY_PRINT);
            }
            
            $db = $database->closeConnection();
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    function get_word_by_entry($entry) {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            $sql = 'SELECT * FROM words WHERE entry="' . $entry . '"';
            foreach ($db->query($sql) as $row) {
                echo json_encode($row, JSON_PRETTY_PRINT);
            }
            
            $db = $database->closeConnection();
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    function get_word_by_letter($letter) {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            $sql = "SELECT * FROM words WHERE title REGEXP '^[".$letter."].*$'";
            $sorrows = array();
            foreach ($db->query($sql) as $row) {
                array_push($sorrows, $row);
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
            
            $db = $database->closeConnection();
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    function get_dictionary() {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            $sql = "SELECT * FROM words ORDER BY entry ASC";
            $sorrows = array();
            foreach ($db->query($sql) as $row) {
                array_push($sorrows, $row);
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
            
            $db = $database->closeConnection();
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    function get_words_by_speech($speech) {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            switch ($speech) {
                case 'noun':
                    $sql = 'SELECT * FROM words WHERE speech="noun"';
                    break;
                case 'adjective':
                    $sql = 'SELECT * FROM words WHERE speech="adjective"';
                    break;
                default:
                    $sql = 'SELECT * FROM words WHERE speech="noun"';
            }
            
            $sorrows = array();
            foreach ($db->query($sql) as $row) {
                array_push($sorrows, $row);
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
            
            $db = $database->closeConnection();
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    function get_words_by_video($video) {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            switch ($video) {
                case 'true':
                    $sql = 'SELECT * FROM words WHERE video IS NOT NULL';
                    break;
                default:
                    $sql = 'SELECT * FROM words WHERE video IS NULL';
            }
            
            $sorrows = array();
            foreach ($db->query($sql) as $row) {
                array_push($sorrows, $row);
            }
            echo json_encode($sorrows, JSON_PRETTY_PRINT);
            
            $db = $database->closeConnection();
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    function get_random_word() {
        try {
            $database = new Connection();
            $db = $database->openConnection();
            
            //get max entry in DB
            $sql = 'SELECT entry FROM words ORDER BY entry DESC LIMIT 0, 1';
            foreach ($db->query($sql) as $row) {
                $max = $row['entry'];
            }
            $db = $database->closeConnection();
            
            $db = $database->openConnection();
            
            //get a random number
            $rn = $n = rand(1, $max);
            
            $sql = "SELECT * FROM words WHERE entry = '" . $rn . "'";
            foreach ($db->query($sql) as $row) {
                echo json_encode($row, JSON_PRETTY_PRINT);
            }
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
?>