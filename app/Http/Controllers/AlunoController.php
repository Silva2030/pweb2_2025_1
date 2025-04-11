<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from alunos
        $dados = Aluno::All();

        return view(
            'aluno.list',
            ['dados' => $dados]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriAaluno::oderBay('nome')->get();
        return view('aluno.form',[
        'categorias'=>$categorias,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    private function validateRequest(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:100',
            'cpf' => 'required|max:14',
            'telefone' => 'nullable|min:10|max:40',
            'categoria_id'=>'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
            'categoria_id.required' => 'O :attribute é obrigatório',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $data = $request->all();

        Aluno::create($data);

        return redirect('aluno');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Aluno::findOrFail($id);

        return view(
            'aluno.form',
            ['dado' => $dado]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100',
            'cpf' => 'required|max:14',
            'telefone' => 'nullable|min:10|max:40'
        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
        ]);

        $data = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
        ];

        Aluno::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('aluno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  dd("teste");
        $dado = Aluno::find($id);

        $dado->delete();

        return redirect('aluno');
    }
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            //select * from alunos
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "$request->valor%"
            )->get();
        } else {
            $dados = Aluno::all();
        }
        return view(
            'aluno.list',
            ['dados' => $dados]
        );
    }
}
