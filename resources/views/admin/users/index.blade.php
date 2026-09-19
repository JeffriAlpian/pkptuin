<x-app-layout>
    <x-slot name="header">
        Kelola Anggota
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="mb-6">
            <h2 class="text-2xl font-display font-semibold" style="color:var(--ink-900);">Kelola Anggota</h2>
            <p class="text-sm" style="color:var(--ink-600);">Daftar akun anggota yang telah memverifikasi email dan memerlukan validasi/persetujuan admin.</p>
        </div>
        
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-xl border border-black/5 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-black/5 text-sm" style="color:var(--ink-600);">
                            <th class="p-4 font-semibold">Nama</th>
                            <th class="p-4 font-semibold">Email</th>
                            <th class="p-4 font-semibold">Waktu Verifikasi</th>
                            <th class="p-4 font-semibold text-center">Status Akun</th>
                            <th class="p-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/5">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 text-sm font-medium" style="color:var(--ink-900);">{{ $user->name }}</td>
                                <td class="p-4 text-sm" style="color:var(--ink-600);">{{ $user->email }}</td>
                                <td class="p-4 text-sm" style="color:var(--ink-600);">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                        <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        {{ $user->email_verified_at ? $user->email_verified_at->format('d M Y, H:i') : '-' }}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    @if($user->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    @elseif($user->status === 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Approved
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 flex justify-center gap-2">
                                    @if($user->status === 'pending')
                                        <form action="{{ route('admin.users.approve', $user) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" class="text-xs px-3 py-1.5 bg-[var(--green-700)] text-white font-medium rounded hover:bg-[var(--green-800)] transition-colors">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.users.reject', $user) }}" method="POST" onsubmit="return confirm('Tolak dan hapus akun ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-xs px-3 py-1.5 border border-red-200 text-red-600 font-medium rounded hover:bg-red-50 transition-colors">
                                                Reject
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 italic">No action</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">
                                    Belum ada akun anggota baru yang telah memverifikasi email.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($users->hasPages())
                <div class="p-4 border-t border-black/5">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
