<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
   
    public function index()
    {
        $entities = Entity::latest()->paginate(5);
    
        return view('entities.index',compact('entities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    
    public function create()
    {
        return view('entities.create');
    }
    
   
    public function store(Request $request)
    {
        $request->validate([
            'trading_name' => 'required',
            'cpf_cnpj' => 'required',
        ]);
    
        Entity::create($request->all());
    
        return redirect()->route('entities.index')
                        ->with('success','Entidade criada com sucesso.');
    }
    
    
    public function show(Entity $entity)
    {
        return view('entities.show',compact('entity'));
    } 
    
    
    public function edit(Entity $entity)
    {
        return view('entities.edit',compact('entity'));
    }
    
   
    public function update(Request $request, Entity $entity)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $entity->update($request->all());
    
        return redirect()->route('entities.index')
                        ->with('success','Entidade Atualizada com sucesso');
    }
    
    
    public function destroy(Entity $entity)
    {
        $entity->delete();
    
        return redirect()->route('entities.index')
                        ->with('success','Entidade deletada com sucesso');
    }
}
