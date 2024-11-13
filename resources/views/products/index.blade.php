<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->isAdmin())
                        <div class="mb-4">
                            <a href="{{ route('products.create') }}" 
                               class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                                <i class="fas fa-plus mr-2"></i> Add Product
                            </a>
                        </div>
                        
                        <!-- Tampilan Tabel untuk Admin -->
                        @include('products.partials.admin-table')
                    @else
                        <!-- Tampilan Card untuk User -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($products as $product)
                                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                                    <!-- Gambar Produk -->
                                    <div class="relative h-48 overflow-hidden">
                                        <a href="{{ Storage::url($product->image) }}" 
                                           data-fancybox="gallery" 
                                           data-caption="{{ $product->name }}">
                                            <img src="{{ Storage::url($product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="w-full h-full object-cover transition duration-300 hover:scale-110">
                                        </a>
                                    </div>
                                    
                                    <!-- Informasi Produk -->
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">
                                            {{ $product->description }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-blue-600 dark:text-blue-400 font-bold">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                                Stock: {{ $product->stock }}
                                            </span>
                                        </div>
                                        
                                        <!-- Tombol Beli/Cart (opsional) -->
                                        <button class="w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out transform hover:scale-105">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Script Fancybox -->
    <script>
        Fancybox.bind("[data-fancybox]", {
            template: {
                closeButton: '<button class="absolute top-4 right-4 z-50 bg-white rounded-full p-2 hover:bg-gray-200" data-fancybox-close><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>'
            },
            on: {
                closing: (fancybox, slide) => {
                    history.back();
                }
            }
        });
    </script>
</x-app-layout>
