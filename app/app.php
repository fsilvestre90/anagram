<?php
    // Dependencies
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/anagramGenerator.php";

    // Initiate Session for storing data locally
    // session_start();
    // if (empty($_SESSION['list_of_contacts'])) {
    //     $_SESSION['list_of_contacts'] = array();
    // }

    // For BSOD and other serious error debugging uncomment these lines:
    // use Symfony\Componet\Debug\Debug;
    // Debug::enable();


    // Initialize application object
    $app = new Silex\Application();

    // Uncomment line below for debug messages
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // Use 'echo' and 'var_dump($array_name)' for variable content debugging
    // Use > print_r(); to display var also


    $app->get("/", function() use ($app) {
        return $app['twig']->render('form.html.twig');
    });

    $app->get("/view_anagram_results", function() use($app) {
        $my_AnagramGenerator = new AnagramGenerator;
        $input_string = $_GET['string'];
        $possibilities = array($_GET['ana1'],$_GET['ana2'],$_GET['ana3'],$_GET['ana4'],$_GET['ana5'],$_GET['ana6']);

        $results = $my_AnagramGenerator->makeAnagram($input_string, $possibilities);

        return $app['twig']->render('view_anagram_results.html.twig', array('results' => $results));
    });

    return $app;

?>
