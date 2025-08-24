{{-- resources/views/kepsek/pendaftaran/index.blade.php --}}
<x-sidebar-kepsek>
    {{-- Data Pendaftar --}}
<div class="border rounded-xl shadow-sm p-4">
    <h2 class="text-lg font-semibold mb-3 text-center">
        <a href="{{ route('admin.pendaftaran.index') }}" class="text-blue-600 hover:underline">
            Data Pendaftar
        </a>
    </h2>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-3 py-2 border">No</th>
                    <th class="px-3 py-2 border">Nama</th>
                    <th class="px-3 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendaftaran as $index => $data)
                    <tr>
                        <td class="px-3 py-2 border text-center">{{ $index+1 }}</td>
                        <td class="px-3 py-2 border">{{ $data->nama }}</td>
                        <td class="px-3 py-2 border text-center">
                            <a href="{{ route('kepsek.pendaftaran.edit', $data->id) }}" 
                               class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                Edit (Kepsek)
                            </a>
                            <a href="{{ route('admin.pendaftaran.edit', $data->id) }}" 
                               class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Edit (Admin)
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</x-sidebar-kepsek>
