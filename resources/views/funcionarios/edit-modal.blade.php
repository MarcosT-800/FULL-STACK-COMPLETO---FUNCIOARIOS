<div class="modal fade" id="editFuncionarioModal{{ $funcionario->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-6">
            <h5 class="text-xl font-bold mb-4">Editar Funcionário</h5>
            <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="nome" value="{{ $funcionario->nome }}" 
                    class="w-full mb-3 p-2 border rounded">
                <input type="email" name="email" value="{{ $funcionario->email }}" 
                    class="w-full mb-3 p-2 border rounded">
                <input type="text" name="cargo" value="{{ $funcionario->cargo }}" 
                    class="w-full mb-3 p-2 border rounded">
                <input type="number" name="salario" value="{{ $funcionario->salario }}" 
                    class="w-full mb-3 p-2 border rounded">
                <div class="flex justify-end">
                    <button type="button" class="mr-2 bg-gray-500 hover:bg-gray-600 text-white py-1 px-3 rounded-md"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded-md">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
