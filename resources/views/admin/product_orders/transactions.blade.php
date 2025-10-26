<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-transparent bg-gradient-to-r from-[#6a11cb] via-[#2575fc] to-[#c471ed] bg-clip-text leading-tight text-white">
            {{ __('My Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[rgba(18,18,18,0.95)] overflow-hidden p-10 shadow-sm sm:rounded-lg flex flex-col gap-y-6">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="font-semibold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-row justify-between items-center">
                    <h3
                        class="text-2xl font-bold text-transparent bg-gradient-to-r from-[#6a11cb] via-[#2575fc] to-[#c471ed] bg-clip-text text-white">
                        My Transactions
                    </h3>
                </div>

                @forelse ($my_transactions as $transaction)
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-gray-50 p-5 rounded-xl shadow-sm ">
                        <div class="flex items-center gap-x-4 w-full sm:w-auto ">
                            <img src="{{ Storage::url($transaction->product->cover) }}"
                                class="h-24 w-24 object-cover rounded-xl" alt="">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ $transaction->product->name }}</h3>
                                <p class="text-sm text-gray-500">{{ $transaction->product->category->name }}</p>
                            </div>
                        </div>

                        <div class="text-center sm:text-right">
                            <p class="text-sm text-gray-500">Total Price</p>
                            <p class="text-lg font-bold text-[#6a11cb]">Rp
                                {{ number_format($transaction->total_price, 0, ',', '.') }}</p>
                        </div>

                        <div class="text-center sm:text-right">
                            <p class="text-sm text-gray-500">Status</p>
                            @if ($transaction->is_paid)
                                <span class="py-1 px-4 text-sm rounded-full bg-green-500 text-white font-semibold">
                                    SUCCESS
                                </span>
                            @else
                                <span class="py-1 px-4 text-sm rounded-full bg-orange-500 text-white font-semibold">
                                    PENDING
                                </span>
                            @endif
                        </div>

                        <div>
                            <a href="{{ route('admin.product_orders.transactions.details', $transaction) }}"
                                class="py-2 px-5 rounded-full font-semibold bg-gradient-to-r from-[#6a11cb] via-[#2575fc] to-[#c471ed] text-white hover:opacity-90 transition">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-400">No transactions found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>