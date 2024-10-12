@extends('layouts.app')

@section('content')
<div class="mt-12 max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Gerenciador de Funcionários</h1>

    <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md mb-4" 
        data-bs-toggle="modal" data-bs-target="#addFuncionario">
        Adicionar Funcionário
    </button>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-50 shadow-md rounded-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left">Nome</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Cargo</th>
                    <th class="py-2 px-4 text-left">Salário</th>
                    <th class="py-2 px-4 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($funcionarios as $funcionario)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-2 px-4">{{ $funcionario->nome }}</td>
                    <td class="py-2 px-4">{{ $funcionario->email }}</td>
                    <td class="py-2 px-4">{{ $funcionario->cargo }}</td>
                    <td class="py-2 px-4">R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                    <td class="py-2 px-4 text-center">
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-md"
                            data-bs-toggle="modal" data-bs-target="#editFuncionarioModal{{ $funcionario->id }}">
                            Editar
                        </button>
                        <form action="{{ route('funcionarios.destroy', $funcionario) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md"
                                onclick="return confirm('Tem certeza?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>

                @include('funcionarios.edit-modal', ['funcionario' => $funcionario])
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('funcionarios.add-modal')
@endsection
