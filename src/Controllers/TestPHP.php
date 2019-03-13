<?php
/**
 * Description of TestPHP
 *
 * @author dinusha
 */

use Lib\Test2;

class TestPHP {
    protected $test;
    
    public function __construct(){
        echo 'It works!!!!';
        
        $this->test = new Test2();
    }
    
    public function index(){
//        echo 'In index '.$val.$val2.$val3;
        
//        $this->test->testFunc();
        $output = '';
        include 'assets'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'code.php';
    }
}
