<?php
namespace Controllers;
/**
 * Description of TestPHP
 *
 * @author dinusha
 */
use Lib\Test2;

class TestPHP extends Controller {
    protected $test;
    
    public function __construct(){
        $this->test = new Test2();
    }
    
    public function index(){
//        echo 'In index '.$val.$val2.$val3;
//        $this->test->testFunc();
        $output = '12';
//        echo 'test';
        $this->renderView('code', compact('output'));
    }
}
