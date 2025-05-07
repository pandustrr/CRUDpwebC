@extends('layouts.app')

@section('title', 'Pengelolaan Menu')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6 text-blue-600">Pengelolaan Menu</h1>

        <div class="mb-6 bg-blue-50 p-4 rounded-lg">
            <p class="text-lg">Halo bro, selamat datang <span
                    class="font-semibold text-blue-700">{{ $username ?? 'Admin' }}</span>!</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-4">
            Tambah Menu
        </button>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-blue-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Menu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($widgets as $menu)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $menu->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $menu->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $menu->category }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $menu->stock }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button data-modal-target="edit-modal-{{ $menu->id }}" data-modal-toggle="edit-modal-{{ $menu->id }}"
                                    class="text-blue-600 hover:text-blue-800 mr-3">Edit</button>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        @include('components.edit-modal', ['menu' => $menu])
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('components.modal')
    </div>
@endsection
