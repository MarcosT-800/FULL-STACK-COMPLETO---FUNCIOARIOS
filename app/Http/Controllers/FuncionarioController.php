<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //método de validação e criação de funcionarios

        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:funcionarios,email',
            'cargo' => 'required',
            'salario' => 'required|numeric',
        ]);

        Funcionario::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //método para alterar ou editar informações do funcionário
            $request->validate([
                'nome' => 'required',
                'email' => 'required|email|unique:funcionarios,email,' . $funcionario->id,
                'cargo' => 'required',
                'salario' => 'required|numeric',
            ]);

            $funcionario->update($request->all());

            return view('funcionarios.index')->with('success', 'Funcionário adicionado com sucesso');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //método para deletar o funcionário
        $funcionario->delete();
        return view('funcionarios.index')->with('success', 'Funcionário adicionado com sucesso');
    }
}
