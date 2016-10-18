<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Excel;
use File;
use Input;
use App\Result;

class ResultsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        
    }

    public function store(Request $request) {
        if ($request->store == 'mass') {
            \Excel::load(Input::file('ImportFile'), function ($reader) {
                $imported = false;
                foreach ($reader->toArray() as $row) {
                    if (!is_result_exist($row['draw_date'], $row['type_id'])) {
                        $result = Result::create($row);
                    }
                }
            });
        }
        if ($request->store == 'single') {
            $request->draw_date = date_to_mysql($request->draw_date);
            //dd($request->draw_date);
            $result = $request->all();
            $result['draw_date'] = date_to_mysql($result['draw_date']);
            //dd($result['draw_date']);
            $result = Result::create($result);

            //dd("$request");
        }
        return redirect()->back();
    }

    public function create() {
        
    }

    public function update() {
        
    }

    public function show() {
        
    }

    public function destroy($id) {
        Result::destroy($id);
        return redirect()->back();
    }

    public function edit() {
        
    }

}
