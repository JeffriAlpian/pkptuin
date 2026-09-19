@extends('layouts.front')

@section('title', 'Sambutan Ketua PKPT IPNU-IPPNU UIN Raden Intan Lampung')

@section('content')
<div class="bg-green-900 pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs><pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
            <rect width="100%" height="100%" fill="url(#grid-pattern)" />
        </svg>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="text-yellow-400 font-semibold uppercase tracking-wider text-sm mb-2 block">Profil</span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Sambutan Ketua</h1>
        <p class="text-green-100 text-lg font-light">Pesan kebangsaan dan semangat pergerakan dari Ketua PKPT IPNU-IPPNU.</p>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <article class="prose prose-lg prose-green max-w-none text-gray-700 leading-relaxed font-serif clearfix">
            
            <!-- Float Image Container -->
            <div class="md:float-right md:ml-8 md:mb-6 mb-8 w-full md:w-1/3 lg:w-2/5">
                <div class="bg-gray-100 rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                    <!-- Placeholder image, user can replace this -->
                    <img src="https://images.unsplash.com/placeholder-avatars/extra-large.jpg?w=32&dpr=2&crop=faces&bg=%23fff&h=32&auto=format&fit=crop&q=60&ixlib=rb-4.1.0" alt="Ketua PKPT" class="w-full h-auto object-cover object-center aspect-[4/5]">
                    <div class="p-4 bg-green-800 text-white text-center">
                        <p class="font-bold text-lg font-sans">Ketua PKPT IPNU-IPPNU</p>
                        <p class="text-yellow-400 text-sm font-sans">UIN Raden Intan Lampung</p>
                    </div>
                </div>
            </div>

            <div class="text-gray-800">
                <p class="mb-4"><strong>Assalamu’alaikum Warahmatullahi Wabarakatuh</strong></p>
                
                <p class="mb-4">Tabik pun!</p>

                <p class="mb-4 font-normal text-right md:text-left" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif; font-size: 1.25em;">
                    إِنَّ الْحَمْدَ لِلَّهِ، نَحْمَدُهُ وَنَسْتَعِينُهُ وَنَسْتَغْفِرُهُ، وَنَعُوذُ بِاللَّهِ مِنْ شُرُورِ أَنْفُسِنَا وَمِنْ سَيِّئَاتِ أَعْمَالِنَا، مَنْ يَهْدِهِ اللَّهُ فَلَا مُضِلَّ لَهُ، وَمَنْ يُضْلِلْ فَلَا هَادِيَ لَهُ.<br><br>
                    وَأَشْهَدُ أَنْ لَا إِلٰهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، وَأَشْهَدُ أَنَّ مُحَمَّدًا عَبْدُهُ وَرَسُولُهُ.<br><br>
                    اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ عَلَى سَيِّدِنَا مُحَمَّدٍ، وَعَلَى آلِ سَيِّدِنَا مُحَمَّدٍ، وَعَلَى أَصْحَابِ سَيِّدِنَا مُحَمَّدٍ أَجْمَعِينَ.<br><br>
                    رَبِّ اشْرَحْ لِي صَدْرِي وَيَسِّرْ لِي أَمْرِي وَاحْلُلْ عُقْدَةً مِنْ لِسَانِي يَفْقَهُوا قَوْلِي
                </p>

                <p class="mb-4">
                    Puji syukur kehadirat Allah SWT atas segala rahmat dan karunia-Nya, sehingga PKPT IPNU-IPPNU UIN Raden Intan Lampung dapat terus tumbuh sebagai ruang belajar, ruang berproses, dan ruang pengabdian bagi para kader.
                </p>

                <p class="mb-4">
                    Shalawat beriring salam semoga senantiasa tercurahkan kepada Nabi Muhammad SAW, sosok teladan yang mengajarkan kepada kita pentingnya ilmu, akhlak, persaudaraan, dan perjuangan.
                </p>

                <p class="mb-6">
                    Bagi kami, PKPT bukan sekadar nama dan bukan sekadar tempat berkumpul. PKPT adalah proses. Di dalamnya, setiap kader belajar mengenal dirinya, belajar menghargai perbedaan, belajar memimpin, sekaligus belajar memberikan manfaat.
                </p>

                <p class="mb-6 font-semibold text-green-800 text-xl font-sans">
                    Dalam perjalanan tersebut, ada tiga semangat yang ingin terus kami jaga:
                </p>

                <!-- Poin 1 -->
                <div class="mb-6 border-l-4 border-yellow-400 pl-4 py-1">
                    <h4 class="font-bold text-green-900 font-sans uppercase tracking-wide text-sm mb-1">01 — MERAWAT YANG BAIK</h4>
                    <p class="font-normal text-xl mb-1" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">الْمُحَافَظَةُ عَلَى الْقَدِيمِ الصَّالِحِ</p>
                    <p class="italic text-gray-500 text-sm mb-2 font-sans">Al-Muḥāfaẓatu ‘alal-Qadīmis-Ṣāliḥ.</p>
                    <p class="mb-2">Kita percaya bahwa setiap generasi memiliki akar. Tradisi keilmuan, nilai keislaman, semangat kebangsaan, dan budaya kekaderan yang telah diwariskan para pendahulu adalah fondasi yang harus tetap kita rawat.</p>
                    <p class="font-medium text-gray-800">Kita boleh berjalan jauh, tetapi jangan sampai lupa dari mana kita berangkat.</p>
                </div>

                <!-- Poin 2 -->
                <div class="mb-6 border-l-4 border-yellow-400 pl-4 py-1">
                    <h4 class="font-bold text-green-900 font-sans uppercase tracking-wide text-sm mb-1">02 — MENYAMBUT YANG LEBIH BAIK</h4>
                    <p class="font-normal text-xl mb-1" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">وَالْأَخْذُ بِالْجَدِيدِ الْأَصْلَحِ</p>
                    <p class="italic text-gray-500 text-sm mb-2 font-sans">Wal-Akhdzu bil-Jadīdis-Alṣlaḥ.</p>
                    <p class="mb-2">Zaman terus berubah. Karena itu, kader juga harus mampu berubah dan berkembang. Teknologi, ilmu pengetahuan, kreativitas, dan berbagai gagasan baru harus kita manfaatkan sebagai jalan untuk memperkuat gerakan.</p>
                    <p class="font-medium text-gray-800">Kita tidak ingin hanya menjadi penonton perubahan, tetapi menjadi bagian dari orang-orang yang menciptakan perubahan.</p>
                </div>

                <!-- Poin 3 -->
                <div class="mb-8 border-l-4 border-yellow-400 pl-4 py-1">
                    <h4 class="font-bold text-green-900 font-sans uppercase tracking-wide text-sm mb-2">03 — TUMBUH DAN MEMBERI DAMPAK</h4>
                    <p class="mb-2">Pada akhirnya, seluruh proses organisasi harus bermuara pada satu hal: kemanfaatan.</p>
                    <p class="mb-2">PKPT IPNU-IPPNU UIN Raden Intan Lampung harus menjadi ruang yang melahirkan kader yang tidak hanya aktif dalam organisasi, tetapi juga mampu hadir di tengah masyarakat dengan ilmu, akhlak, dan kontribusi nyata.</p>
                    <p class="font-medium text-gray-800">Karena bagi kami, keberhasilan sebuah organisasi bukan hanya tentang seberapa banyak kegiatan yang dilakukan, tetapi tentang seberapa banyak kebaikan yang tumbuh setelah kegiatan itu selesai.</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 mb-8 border border-gray-100 text-center font-sans">
                    <p class="font-normal text-2xl mb-2 text-green-800" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">الْمُحَافَظَةُ عَلَى الْقَدِيمِ الصَّالِحِ وَالْأَخْذُ بِالْجَدِيدِ الْأَصْلَحِ</p>
                    <p class="italic font-medium text-gray-700">“Menjaga nilai-nilai lama yang baik dan mengambil hal-hal baru yang lebih baik.”</p>
                </div>

                <p class="mb-4">
                    Inilah semangat yang ingin kami bawa: merawat tradisi tanpa kehilangan relevansi, menerima perubahan tanpa kehilangan jati diri, dan bergerak bersama untuk menghadirkan manfaat.
                </p>

                <p class="mb-4">Selamat datang di website resmi PKPT IPNU-IPPNU UIN Raden Intan Lampung.</p>
                
                <p class="mb-6">Mari mengenal, mengikuti, dan menjadi bagian dari perjalanan kami.</p>

                <p class="mb-6 font-bold text-green-800 font-sans">Belajar, berjuang, bertaqwa.</p>

                <p class="mb-4 text-xl" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">وَاللَّهُ الْمُوَفِّقُ إِلَى أَقْوَمِ الطَّرِيقِ</p>
                <p class="mb-8 text-xl" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">والسلام عليكم ورحمة الله وبركاته</p>

                <div class="mt-8 font-sans">
                    <p class="font-bold text-gray-900">Ketua PKPT IPNU-IPPNU</p>
                    <p class="text-gray-600">UIN Raden Intan Lampung</p>
                </div>

            </div>
        </article>
    </div>
</div>
@endsection
