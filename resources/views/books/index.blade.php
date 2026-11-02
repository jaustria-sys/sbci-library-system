<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-[#0B2C6F]">
                📚 SBCI Library System
            </h2>
            <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">
                {{ $books->count() }} Books - Role: {{ auth()->user()->role }}
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-t-4 border-[#0B2C6F]">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div>
                        <h3 class="text-xl font-bold text-[#0B2C6F]">Library Book Management</h3>
                        <p class="text-gray-500 text-sm">Manage all SBCI books - Powered by MongoDB Atlas</p>
                    </div>
                    
                    @if(auth()->user()->role == 'admin')
                    <a href="{{ route('books.create') }}" class="bg-[#0B2C6F] hover:bg-blue-800 text-white font-bold px-6 py-3 rounded-lg shadow-lg">
                        + Add New Book (Admin)
                    </a>
                    @else
                    <span class="bg-green-100 text-green-700 font-bold px-6 py-3 rounded-lg">👋 Welcome Borrower! View & Borrow Only</span>
                    @endif

                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-[#0B2C6F] text-white">
                            <tr>
                                <th class="p-4 text-left">Title</th>
                                <th class="p-4 text-left">Author</th>
                                <th class="p-4 text-left">ISBN</th>
                                <th class="p-4 text-left">Category</th>
                                <th class="p-4 text-center">Qty</th>
                                <th class="p-4 text-center">Status</th>
                                <th class="p-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr class="border-b hover:bg-blue-50">
                                <td class="p-4 font-semibold">{{ $book->title }}</td>
                                <td class="p-4 text-gray-600">{{ $book->author }}</td>
                                <td class="p-4 text-sm font-mono">{{ $book->isbn }}</td>
                                <td class="p-4"><span class="bg-blue-100 text-[#0B2C6F] px-3 py-1 rounded-full text-xs font-bold">{{ $book->category }}</span></td>
                                <td class="p-4 text-center font-bold">{{ $book->quantity }}</td>
                                <td class="p-4 text-center">
                                    @if($book->status == 'Available')
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Available</span>
                                    @else
                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">{{ $book->status }}</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center">
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ route('books.edit', $book->_id ?? $book->id) }}" class="bg-[#FFC107] text-[#0B2C6F] font-bold px-3 py-1 rounded mr-1">Edit</a>
                                        <form action="{{ route('books.destroy', $book->_id ?? $book->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="bg-red-600 text-white font-bold px-3 py-1 rounded">Delete</button>
                                        </form>
                                    @else
                                        <button class="bg-green-600 text-white font-bold px-4 py-1 rounded">Borrow</button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="p-8 text-center text-gray-400">No books yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>