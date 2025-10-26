<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-gradient-to-r from-[#6a11cb] via-[#2575fc] to-[#c471ed] bg-clip-text leading-tight text-white">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-6 bg-[rgba(18,18,18,0.95)]">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="font-semibold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-row justify-between items-center">
                    <h3 class="text-2xl font-bold text-transparent text-white bg-gradient-to-r from-[#6a11cb] via-[#2575fc] to-[#c471ed] bg-clip-text">
                        My Products
                    </h3>
                    <a href="{{ route('admin.products.create') }}"
                        class="py-2 px-6 rounded-full font-semibold bg-gradient-to-r from-[#6a11cb] via-[#2575fc] to-[#c471ed] text-white hover:opacity-90 transition">
                        + Add New Product
                    </a>
                </div>

                @forelse ($products as $product)
                    <div class="flex flex-row justify-between items-center bg-gray-50 p-5 rounded-xl shadow-sm">
                        <div class="flex items-center gap-x-4">
                            <img src="{{ Storage::url($product->cover) }}" class="h-24 w-24 object-cover rounded-xl" alt="">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $product->category->name }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-[#6a11cb]">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex gap-x-3">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-full font-semibold hover:opacity-90 transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-full font-semibold hover:opacity-90 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-400 mt-6">No products found. Please add a product.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
