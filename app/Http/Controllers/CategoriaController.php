<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Request\CategoriaFormRequest;
class CategoriaController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if($request){gru
            $consulta=trim($request->get('searchText'));
            $categorias = DB::table('categoria')->where('nombre','LIKE','%'.$consulta.'%')
            ->where('condicion','=','True')
            ->orderBy('nombre')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$consulta]);
        }
    }
    public function create(){
        return view("almacen.categoria.create");
    }
    public function store(CategoriaFormRequest $request){
        $categoria = new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='True';
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }
    public function edit($id){
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function show($id){
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request, $id){
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
    public function  destroy($id){
        $categoria=Categoria::findOrFail($id);
        $categoria=condicion='False';
        $categoria -> update();
        return Redirect::to('almacen/categoria');
    }
}
