<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Requests;
use App\Type;

class TypesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function store(TypeRequest $request) {
        Type::create($request->all());
        return redirect('type');
    }

    public function history($id) {

        $type = Type::find($id);
//        dd($type->results()->get());
        
        return view('types.history',compact('type'));
    }
    public function create() {
        
    }

    public function update() {
        
    }

    public function show() {
        
    }

    public function destroy() {
        
    }

    public function edit($id) {
        $types = Type::all();
        $edittype=Type::find($id);
        return view('types.index', compact('types','edittype'));
    }

}
