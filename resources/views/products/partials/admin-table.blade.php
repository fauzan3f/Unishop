<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50 dark:bg-gray-700">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Name
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Description
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Price
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Stock
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Image
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
        @foreach($products as $product)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $product->name }}
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $product->description }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $product->stock }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ Storage::url($product->image) }}" 
                   data-fancybox="gallery" 
                   data-caption="{{ $product->name }}"
                   class="cursor-pointer">
                    <img src="{{ Storage::url($product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-16 h-16 object-cover rounded-lg hover:opacity-75 transition duration-300 ease-in-out transform hover:scale-105">
                </a>
            </td>
            @if(auth()->user()->isAdmin())
                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                    <a href="{{ route('products.edit', $product) }}" 
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                        </button>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>