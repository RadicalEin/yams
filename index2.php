<?php
/**
 * Created by IntelliJ IDEA.
 * User: clement
 * Date: 23/11/16
 * Time: 17:05
 */

require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('tpl');
$twig = new Twig_Environment($loader);

echo $twig->render('index.html.twig', array('nom' => 'Peros'));
