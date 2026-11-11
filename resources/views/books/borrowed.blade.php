<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0B2C6F]">📋 Borrowed Books - Admin View</h2>
    </x-slot>
    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-[#0B2C6F] text-white">
                        <tr>
                            <th class="p-4 text-left">Book Title</th>
                            <th class="p-4 text-left">Borrower Name</th>
                            <th class="p-4 text-left">Email</th>
                            <th class="p-4 text-center">Borrowed At</th>
                            <th class="p-4 text-center">Return Date</th>
                            <th class="p-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrows as $borrow)
                        <tr class="border-b hover:bg-blue-50">
                            <td class="p-4 font-bold">{{ $borrow->book_title }}</td>
                            <td class="p-4">{{ $borrow->user_name }}</td>
                            <td class="p-4">{{ $borrow->user_email }}</td>
                            <td class="p-4 text-center">{{ \Carbon\Carbon::parse($borrow->borrowed_at)->format('M d, Y h:i A') }}</td>
                            <td class="p-4 text-center">{{ \Carbon\Carbon::parse($borrow->return_date)->format('M d, Y') }}</td>
                            <td class="p-4 text-center"><span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold">{{ $borrow->status }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="p-8 text-center text-gray-400">Wala pang nanghiram ng books.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('books.index') }}" class="inline-block mt-4 bg-gray-200 px-4 py-2 rounded-lg font-bold">← Back to Books</a>
        </div>
    </div>
</x-app-layout>