<x-app-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Adicionar Produto
        </h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Nome</label>
                <input type="text" name="title" id="title" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
                @if ($errors->has('title'))
                <span class="text-sm text-red-600">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="price_regular" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Preço Regular</label>
                <input type="text" name="price_regular" id="price_regular" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
                @if ($errors->has('price_regular'))
                <span class="text-sm text-red-600">{{ $errors->first('price_regular') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="price_sale" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Preço Promocional</label>
                <input type="text" name="price_sale" id="price_sale" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
                @if ($errors->has('price_sale'))
                <span class="text-sm text-red-600">{{ $errors->first('price_sale') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="external_link" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Link de Compra</label>
                <input type="text" name="external_link" id="external_link" required class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
                @if ($errors->has('external_link'))
                <span class="text-sm text-red-600">{{ $errors->first('external_link') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Imagem</label>
                <input type="file" name="image" id="image" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300">
                @if ($errors->has('image'))
                <span class="text-sm text-red-600">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Descrição</label>
                <textarea name="description" id="description" rows="4" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300" required></textarea>
                @if ($errors->has('description'))
                <span class="text-sm text-red-600">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                    Adicionar Produto
                </button>
            </div>
        </form>
    </div>
</x-app-layout>