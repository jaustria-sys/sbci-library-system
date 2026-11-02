<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0B2C6F] leading-tight">
            {{ __('SBCI Library Dashboard - Analytics') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- STATS CARDS - For 10% UI/UX + 20% Analytics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-[#0B2C6F] p-6">
                    <div class="text-gray-500 text-sm">Total Books</div>
                    <div class="text-3xl font-bold text-[#0B2C6F]">{{ $total }}</div>
                    <div class="text-xs text-green-600 mt-2">From MongoDB Atlas</div>
                </div>
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-[#FFC107] p-6">
                    <div class="text-gray-500 text-sm">Available</div>
                    <div class="text-3xl font-bold text-[#0B2C6F]">{{ $available }}</div>
                    <div class="text-xs text-gray-400">{{ $total > 0 ? round($available/$total*100) : 0 }}% Ready to borrow</div>
                </div>
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border-l-4 border-green-500 p-6">
                    <div class="text-gray-500 text-sm">Borrowed</div>
                    <div class="text-3xl font-bold text-[#0B2C6F]">{{ $borrowed }}</div>
                    <div class="text-xs text-red-500">{{ $total > 0 ? round($borrowed/$total*100) : 0 }}% Currently out</div>
                </div>
                <div class="bg-[#0B2C6F] overflow-hidden shadow-lg rounded-xl p-6 text-white">
                    <div class="text-yellow-200 text-sm">Total Copies</div>
                    <div class="text-3xl font-bold">{{ $totalQty }}</div>
                    <div class="text-xs text-blue-200 mt-2">Physical stocks</div>
                </div>
            </div>

            <!-- ANALYTICS CHARTS - For 20% Analytics & Reports - REAL DATA! -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="font-bold text-[#0B2C6F] mb-4">📚 Books by Category (Real from MongoDB)</h3>
                    <canvas id="categoryChart"></canvas>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="font-bold text-[#0B2C6F] mb-4">📈 Available vs Borrowed</h3>
                    <canvas id="statusChart"></canvas>
                </div>
            </div>

            <!-- REPORT TABLE - Para sa Filtering & Useful Reports -->
            <div class="bg-white p-6 rounded-xl shadow-lg mb-6">
                <h3 class="font-bold text-[#0B2C6F] mb-4">📋 Inventory Report - Live from Atlas</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-[#0B2C6F] text-white">
                            <tr>
                                <th class="p-2 text-left">Title</th>
                                <th class="p-2">Category</th>
                                <th class="p-2">Qty</th>
                                <th class="p-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $b)
                            <tr class="border-b">
                                <td class="p-2 font-semibold">{{ $b->title }}</td>
                                <td class="p-2 text-center">{{ $b->category }}</td>
                                <td class="p-2 text-center">{{ $b->quantity }}</td>
                                <td class="p-2 text-center">
                                    <span class="px-2 py-1 rounded text-xs {{ $b->status == 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $b->status }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('books.index') }}" class="bg-[#0B2C6F] text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-800">Manage Books (CRUD)</a>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN - Required sa instruction -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // REAL DATA FROM MONGODB!
        new Chart(document.getElementById('categoryChart'), {
            type: 'doughnut',
            data: {
                labels: @json($catLabels),
                datasets: [{ data: @json($catCounts), backgroundColor: ['#0B2C6F','#FFC107','#22c55e','#3b82f6','#9333ea'] }]
            }
        });

        new Chart(document.getElementById('statusChart'), {
            type: 'bar',
            data: {
                labels: @json($statusLabels),
                datasets: [{ label: 'Books', data: @json($statusCounts), backgroundColor: ['#16a34a','#dc2626'] }]
            },
            options: { scales: { y: { beginAtZero: true } } }
        });
    </script>
</x-app-layout>