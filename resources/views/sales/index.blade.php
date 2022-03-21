<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if (session()->has('message'))
        <div class="w-full px-2 py-4 border border-green-500 bg-green-400 text-white rounded mt-3 mb-1">
            {{ session('message') }}
        </div>
    @endif
    <div class="mt-4">
        <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data" class="items-center">
            @csrf
            <div class="flex w-full items-center justify-start bg-grey-lighter">
                <label
                    class="flex items-center px-2 py-1 bg-white text-euro-one font-semibold rounded-lg shadow-lg tracking-wide uppercase border cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500 m-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                        <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                    </svg>
                    <input id="csv" type="file" name="csv" placeholder="Arquivo"
                        class="block w-full text-sm text-slate-500 cursor-pointer
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-white file:text-euro-one @error('csv') is-invalid @enderror" required>

                    @error('csv')
                        <span class="w-full px-2 py-4 border border-red-500 bg-red-400 text-white rounded mt-3 mb-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <button type="submit"
                    class="ml-5 px-5 py-2 md:px-3 md:py-2 rounded-md bg-euro-one text-white font-semibold">
                    Cadastrar Venda
                </button>
            </div>
        </form>
    </div>

    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs text-euro-one font-semibold uppercase tracking-wider">
                            #Id</th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs text-euro-one font-semibold uppercase tracking-wider">
                            Comprador
                        </th>

                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Descrição
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Preço Unitário
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Quantidade
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Endereco
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Fornecedor
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-green-200 bg-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Ação
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <th scope="row">{{ $record->id }}</th>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $record->buyer }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $record->description }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"> {{ $record->unit_price }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $record->quantity }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $record->address }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $record->supplier }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm cursor-pointer">
                                <form method="POST" action="{{ route('sale.destroy', $record->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
</svg>
                                    </button>
                                    
                                   
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $records->links() }}
</div>
