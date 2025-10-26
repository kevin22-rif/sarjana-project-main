<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-[20px] text-white leading-tight">
            {{ __('Creator Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[rgba(18,18,18,0.95)] overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-5 text-white">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="py-5 bg-red-500 text-white font-bold">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-row justify-between items-center mb-5">
                    <h3 class="text-white font-bold text-2xl">Overview</h3>
                </div>

                <div class="flex flex-row justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Product</p>
                        <p class="text-white font-bold text-xl">{{ count($my_products) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Total Order</p>
                        <p class="text-white font-bold text-xl">{{ count($total_order_success) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Total Revenue</p>
                        <p class="text-white font-bold text-xl">Rp {{ number_format($my_revenue) }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
