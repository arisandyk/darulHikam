<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-900 leading-tight">
            {{ __('Edit Data Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('sekolah.update', $sekolah->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="yayasan_id" class="block text-sm font-medium text-blue-900">Yayasan Induk</label>
                            <select name="yayasan_id" id="yayasan_id"
                                class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"
                                required>
                                <option value="">-- Pilih Yayasan --</option>
                                @foreach ($yayasan as $yayasan)
                                    <option value="{{ $yayasan->id }}"
                                        {{ $sekolah->yayasan_id == $yayasan->id ? 'selected' : '' }}>
                                        {{ $yayasan->nama_yayasan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nama_sekolah" class="block text-sm font-medium text-blue-900">Nama
                                Sekolah</label>
                            <input type="text" name="nama_sekolah" id="nama_sekolah"
                                value="{{ $sekolah->nama_sekolah }}"
                                class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="jenjang_pendidikan" class="block text-sm font-medium text-blue-900">Jenjang
                                Pendidikan</label>
                            <input type="text" name="jenjang_pendidikan" id="jenjang_pendidikan"
                                value="{{ $sekolah->jenjang_pendidikan }}"
                                class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="alamat" class="block text-sm font-medium text-blue-900">Alamat Sekolah</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm" required>{{ $sekolah->alamat }}</textarea>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('sekolah.index') }}"
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
