<?php

class MyExtension
    extends Twig_Extension
{

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'myextension';
    }

//    public function getFilters()
//    {
//        return [
//            'reverse'=>function($arr){
//                return array_reverse($arr);
//            }
//        ];
//    }


    public function getFunctions()
    {
        return [
            'cube'=>new Twig_SimpleFunction('cube', function ($x){
                return $x*$x*$x;
            })
        ];
    }

    public function getGlobals()
    {
        return [
            'config'=>include __DIR__.'/../config.php'
        ];
    }
}