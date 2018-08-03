<?php 

namespace App\Http\Controllers\Models\Cars;

use Auth;
use App\Model;
use App\Http\Requests;
use Illuminate\Http\Request; 
use App\Http\Controllers\Models\ModelController; 

use App\Models\Car\Car;
use App\Models\Car\Mileage;

class CarController extends ModelController {

	public $class_model = Car::class;

	public function index( Request $request )	{
		return view('models.'.$this->class_name.'.index');
	}

	public function create( Request $request ) {
		return view('models.'.$this->class_name.'.create');
	}


	public function edit( $id, Request $request ) {
		return view('models.'.$this->class_name.'.edit');
	}
	
	public function store( Request $request ) {
		$model = new $this->class_model();
		foreach ($request->route()->parameters() as $req_key => $req_value) {
			$model->$req_key = $req_value;
		}
		if( $request->ajax() ){
			return $model;
		}else{
			return redirect()->route('models.'.$this->class_name.'.index');
		}
	}
	public function update( Request $request ) {
		$model = new $this->class_model();
		$className = mb_strtolower((new \ReflectionClass($model))->getShortName());
		$model = $model::findOrFail($id);
		foreach ($request->route()->parameters() as $req_key => $req_value) {
			$model->$req_key = $req_value;
		}
		if( $request->ajax() ){
			return $model;
		}else{
			return redirect()->route('models.'.$this->class_name.'.index');
		}
	}


	public function destroy( $id, Request $request ) {
		$model = new $this->class_model();
		$className = mb_strtolower((new \ReflectionClass($model))->getShortName());
		$model = $model::findOrFail($id);
		$model->deleteModel();
		if( $request->ajax() ){
			return $model;
		}else{
			return redirect()->route('models.'.$this->class_name.'.index');
		}
	}

	public function show( Request $request )	{
		$model = new $this->class_model();
		$id = $request->route()->parameters();
		$model = $model::findOrFail(array_pop($id));
		return view('crudl.show', compact('model')); 
	}

	public function addMileage( $id, Request $request ) {
		Mileage::create([
			'car_id' => $id,
			'value' => $request->value,
			'date' => $request->date,
		]);
		if( $request->ajax() ){
			return $model;
		}else{
			return redirect()->route('models.'.$this->class_name.'.index');
		}
	}
}