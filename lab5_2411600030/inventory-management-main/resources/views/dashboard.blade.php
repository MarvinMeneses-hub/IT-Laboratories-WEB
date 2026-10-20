<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Metric Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Items</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">{{ $totalProducts }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Stock Quantity</p>
                    <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">{{ $totalQuantity }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Inventory Value</p>
                    <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">${{ number_format($totalValue, 2) }}</p>
                </div>
            </div>

            <!-- Low Stock Warnings -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Low Stock Items (5 or fewer)</h3>
                @forelse($lowStockProducts as $item)
                    <div class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700 last:border-0">
                        <span class="text-gray-700 dark:text-gray-300">{{ $item->name }}</span>
                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs font-semibold rounded-full">{{ $item->quantity }} left</span>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">All products have sufficient stock levels.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>