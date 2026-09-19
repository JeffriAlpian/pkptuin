<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-display font-semibold" style="color:var(--ink-900);">Data Kaderisasi</h2>
            <p class="text-sm" style="color:var(--ink-600);">Kelola rekam jejak kaderisasi formal dan non-formal anggota.</p>
        </div>
        <button onclick="document.getElementById('modal-add').classList.remove('hidden')" class="px-4 py-2 text-white font-medium rounded-lg text-sm" style="background:var(--green-950);">
            + Tambah Data
        </button>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl border border-black/5 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap">
                <thead class="bg-gray-50/50 border-b border-black/5" style="color:var(--ink-600);">
                    <tr>
                        <th class="px-6 py-4 font-medium">Anggota</th>
                        <th class="px-6 py-4 font-medium">Jenjang</th>
                        <th class="px-6 py-4 font-medium">Keterangan</th>
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @forelse($kaderisasi as $k)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-medium" style="color:var(--ink-900);">{{ $k->user->name }}</p>
                            <p class="text-xs" style="color:var(--ink-600);">{{ optional($k->user->memberProfile)->nia ?? 'Belum ada NIA' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 rounded text-xs font-medium">{{ \App\Models\Kaderisasi::labelJenis()[$k->jenis] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            {{ $k->keterangan ?? '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $k->tanggal ? $k->tanggal->format('d M Y') : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($k->status === 'lulus')
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">Lulus</span>
                            @elseif($k->status === 'tidak_lulus')
                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium">Tidak Lulus</span>
                            @else
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-xs font-medium">Belum</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="editKaderisasi({{ $k->id }}, '{{ $k->status }}', '{{ $k->keterangan }}', '{{ $k->tanggal ? $k->tanggal->format('Y-m-d') : '' }}')" class="text-blue-600 hover:underline text-xs">Edit</button>
                            <form action="{{ route('admin.kaderisasi.destroy', $k) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?');">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline text-xs">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada data kaderisasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($kaderisasi->hasPages())
            <div class="px-6 py-4 border-t border-black/5">
                {{ $kaderisasi->links() }}
            </div>
        @endif
    </div>

    {{-- Modal Tambah --}}
    <div id="modal-add" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 flex">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">Tambah Data Kaderisasi</h3>
            <form action="{{ route('admin.kaderisasi.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm mb-1 font-medium">Anggota</label>
                    <select name="user_id" required class="w-full rounded border-gray-300 text-sm">
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }} ({{ optional($u->memberProfile)->nia ?? 'Belum ada NIA' }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm mb-1 font-medium">Jenjang</label>
                    <select name="jenis" required class="w-full rounded border-gray-300 text-sm">
                        @foreach(\App\Models\Kaderisasi::labelJenis() as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm mb-1 font-medium">Keterangan</label>
                    <input type="text" name="keterangan" class="w-full rounded border-gray-300 text-sm" placeholder="Misal: Makesta Raya 2024">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1 font-medium">Tanggal</label>
                        <input type="date" name="tanggal" class="w-full rounded border-gray-300 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm mb-1 font-medium">Status</label>
                        <select name="status" required class="w-full rounded border-gray-300 text-sm">
                            <option value="lulus">Lulus</option>
                            <option value="tidak_lulus">Tidak Lulus</option>
                            <option value="belum">Belum Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="document.getElementById('modal-add').classList.add('hidden')" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white bg-green-800 rounded-lg text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="modal-edit" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 flex">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">
            <h3 class="text-lg font-bold mb-4">Edit Data Kaderisasi</h3>
            <form id="form-edit" method="POST" class="space-y-4">
                @csrf @method('PATCH')
                <div>
                    <label class="block text-sm mb-1 font-medium">Keterangan</label>
                    <input type="text" name="keterangan" id="edit-keterangan" class="w-full rounded border-gray-300 text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm mb-1 font-medium">Tanggal</label>
                        <input type="date" name="tanggal" id="edit-tanggal" class="w-full rounded border-gray-300 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm mb-1 font-medium">Status</label>
                        <select name="status" id="edit-status" required class="w-full rounded border-gray-300 text-sm">
                            <option value="lulus">Lulus</option>
                            <option value="tidak_lulus">Tidak Lulus</option>
                            <option value="belum">Belum Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="document.getElementById('modal-edit').classList.add('hidden')" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg text-sm">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white bg-green-800 rounded-lg text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editKaderisasi(id, status, keterangan, tanggal) {
            document.getElementById('form-edit').action = '/admin/kaderisasi/' + id;
            document.getElementById('edit-status').value = status;
            document.getElementById('edit-keterangan').value = keterangan;
            document.getElementById('edit-tanggal').value = tanggal;
            document.getElementById('modal-edit').classList.remove('hidden');
        }
    </script>
</x-app-layout>
