<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Edit Data Yayasan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('yayasan.update', $yayasan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama_yayasan" class="block text-sm font-medium text-blue-900">Nama
                                Yayasan</label>
                            <input type="text" name="nama_yayasan" id="nama_yayasan"
                                value="{{ $yayasan->nama_yayasan }}"
                                class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="alamat" class="block text-sm font-medium text-blue-900">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ $yayasan->alamat }}</textarea>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('yayasan.index') }}"
                                class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                                Update Data
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
