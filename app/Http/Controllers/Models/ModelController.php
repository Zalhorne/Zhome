<?php 

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller as BaseController; 

class ModelController extends BaseController {
	public $class_model = null;
	public $class_name = null;
	public $model = null;

    public function __construct() {
        $this->middleware('auth');

		$this->model = new $this->class_model();
		$this->class_name = mb_strtolower((new \ReflectionClass($this->model))->getShortName());
    }

}