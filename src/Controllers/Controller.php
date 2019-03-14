<?php
namespace Controllers;
/**
 * Description of Controller
 *
 * @author dinusha
 */
abstract class Controller {
    protected function renderView($view, $data = ''){
        getView($view, $data);
    }
}
