<div id="edit-modal-{{ $menu->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between pb-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">
                    Edit Menu: {{ $menu->name }}
                </h3>
                <button type="button"
                    class="text-gray-500 hover:text-gray-700 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="edit-modal-{{ $menu->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4 mt-4">

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                            Nama Menu
                        </label>
                        <input type="text" name="name" id="name" value="{{ $menu->name }}"
                            class="w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-700">
                            Kategori
                        </label>
                        <select name="category" id="category"
                            class="w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="Makanan" {{ $menu->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="Minuman" {{ $menu->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="Snack" {{ $menu->category == 'Snack' ? 'selected' : '' }}>Snack</option>
                        </select>
                    </div>

                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-700">
                            Harga (Rp)
                        </label>
                        <input type="number" name="price" id="price" value="{{ $menu->price }}"
                            class="w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">
                            Stok
                        </label>
                        <input type="number" name="stock" id="stock" value="{{ $menu->stock }}"
                            class="w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>

                <div class="mt-6 flex justify-start space-x-3">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
