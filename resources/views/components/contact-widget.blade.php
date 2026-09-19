<style>
    /* Contact Widget Styles */
    #contact-widget {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 50;
    }
    #contact-btn {
        width: 60px;
        height: 60px;
        border-radius: 9999px;
        background: var(--gold-400);
        color: var(--green-950);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    #contact-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }
    #contact-btn svg {
        width: 28px;
        height: 28px;
    }
    #contact-popup {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 320px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border: 1px solid rgba(0,0,0,0.05);
        transform-origin: bottom right;
        transform: scale(0.95);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    #contact-popup.show {
        transform: scale(1);
        opacity: 1;
        visibility: visible;
    }
    .contact-header {
        background: var(--green-950);
        color: #fff;
        padding: 16px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .contact-body {
        padding: 20px 16px;
    }
    .contact-close {
        color: rgba(255,255,255,0.7);
        cursor: pointer;
        transition: color 0.2s;
    }
    .contact-close:hover {
        color: #fff;
    }
    
    @media (max-width: 480px) {
        #contact-widget {
            bottom: 20px;
            right: 20px;
        }
        #contact-popup {
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            border-radius: 0;
            transform-origin: bottom center;
            transform: translateY(100%);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }
        #contact-popup.show {
            transform: translateY(0);
        }
        .contact-header {
            border-radius: 0;
            padding: 20px;
        }
        .contact-body {
            flex-grow: 1;
            overflow-y: auto;
            background: var(--cream);
        }
    }
</style>

<div id="contact-widget">
    {{-- Popup --}}
    <div id="contact-popup">
        <div class="contact-header">
            <div>
                <h4 class="font-display font-semibold text-lg">Kirim Surat</h4>
                <p class="text-xs text-white/70">Hubungi kami via persuratan</p>
            </div>
            <button id="contact-close" class="contact-close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="contact-body">
            @if(session('contact_success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded text-sm">
                    {{ session('contact_success') }}
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('contact-popup').classList.add('show');
                    });
                </script>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-[var(--ink-900)] mb-1">Asal Instansi</label>
                    <input type="text" name="asal_instansi" required class="w-full rounded-md border-gray-300 text-sm focus:border-[var(--green-600)] focus:ring-[var(--green-600)]" placeholder="Contoh: BEM UIN RIL">
                    @error('asal_instansi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-[var(--ink-900)] mb-1">Perihal</label>
                    <input type="text" name="perihal" required class="w-full rounded-md border-gray-300 text-sm focus:border-[var(--green-600)] focus:ring-[var(--green-600)]" placeholder="Contoh: Undangan Seminar">
                    @error('perihal') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-[var(--ink-900)] mb-1">File Surat (PDF)</label>
                    <input type="file" name="file_surat" accept="application/pdf" required class="w-full text-sm text-[var(--ink-600)] file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[var(--green-50)] file:text-[var(--green-700)] hover:file:bg-[var(--green-100)]">
                    <p class="text-xs text-gray-500 mt-1">Hanya format PDF.</p>
                    @error('file_surat') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="w-full py-2.5 rounded-md font-medium text-white transition-colors" style="background:var(--green-800);">
                    Kirim Surat
                </button>
            </form>
        </div>
    </div>

    {{-- Button --}}
    <button id="contact-btn" title="Kirim Surat">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btn = document.getElementById('contact-btn');
        const popup = document.getElementById('contact-popup');
        const closeBtn = document.getElementById('contact-close');

        btn.addEventListener('click', () => {
            popup.classList.toggle('show');
        });

        closeBtn.addEventListener('click', () => {
            popup.classList.remove('show');
        });

        // Error handling popup open
        @if($errors->has('asal_instansi') || $errors->has('perihal') || $errors->has('file_surat'))
            popup.classList.add('show');
        @endif
    });
</script>
