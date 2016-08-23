<?php

require __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

require __DIR__.'/src/User.php';
require __DIR__.'/classes/MyExtension.php';

$loader=new Twig_Loader_Filesystem([
    __DIR__.'/layouts',
    __DIR__.'/templates',]);
$twig=new Twig_Environment($loader,[
    'cache'=>false,//__DIR__.'/cache'
]);//

//$twig->addGlobal('config',include __DIR__.'/config.php');

//$filterReverse=new Twig_SimpleFilter('reverse', function ($arr){
//    return array_reverse($arr);
//});
//$twig->addFilter($filterReverse);

$twig->addExtension(new MyExtension());

//$cubeFunction=new Twig_SimpleFunction('cube', function ($x){
//    return $x*$x*$x;
//});
//
//$twig->addFunction($cubeFunction);

$youngTest=new Twig_SimpleTest('young',function ($x) {
if(is_object($x)){
    return $x->age<=33;
} else
    {
        return $x['age']<=20;
    }
});

$twig->addTest($youngTest);

//$twig->loadTemplate('index.html');
echo $twig->render('page.html', [
    'user'=>[
        'name'=>'<b>Ivan Ivanov</b>',
        'age'=>42,
        'birthdate'=>'1970-01-01',
        'address'=>'Salavat Ulaev street 1'],
    'users'=>[
        1=>['name'=>'Petr Petrov', 'age'=>12],
        2=>['name'=>'Petr Ivanov', 'age'=>13],
        3=>['name'=>'Ivan Petrov', 'age'=>15],
        4=>['name'=>'Ivan Ivanov', 'age'=>21],
    ],
]);