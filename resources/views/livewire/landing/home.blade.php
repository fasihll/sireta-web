@push('assets')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
<div>
    <!-- Hero Section -->
    <section class="h-screen bg-cover bg-center relative" style="background-color: rgba(0, 147, 233, 100%)">
        <div class="absolute inset-0 bottom-0">
            <div class="custom-shape-divider-bottom-1729560018">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        opacity=".25" class="shape-fill"></path>
                    <path
                        d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                        opacity=".5" class="shape-fill"></path>
                    <path
                        d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>
        <div class="relative z-9 flex flex-col md:flex-row items-center justify-center h-full px-6 max-w-7xl mx-auto">
            <div class="md:w-1/2 text-left md:text-left" data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white">SIRETA</h1>
                <p class="text-xl mb-6 text-white">Sireta Merupakan Sistem Rekomendasi Wisata atau Sistem Pendukung
                    Keputusan Untuk Menentukan Rekomendasi
                    Wisata Di Bangkalan Menggunakan Metode Gabungan Yaitu Analitical Hirarcy Proccess dan Weight
                    Product.</p>
                <a href="#rekomendasi" class="btn btn-light border-primary">Lihat Rekomendasi</a>
            </div>
            <div class="md:w-1/2 md:flex justify-center md:justify-end hidden" data-aos="zoom-out">
                <!-- SVG Icon -->
                <img src="{{ asset('assets/img/icon_hero.svg') }}" alt="App Icon" class="w-64 h-64 md:w-96 md:h-96">
            </div>
        </div>

    </section>


    <!-- Card Slider Section -->
    <section id="rekomendasi" class="py-20 bg-white overflow-hidden" wire:ignore>
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold">Rekomendasi</h2>
        </div>
        @if (isset($rekomendasi))
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper md:mx-[100px]" data-aos="fade-left" data-aos-anchor="#example-anchor"
                    data-aos-offset="500" data-aos-duration="500">
                    <!-- Slide 1 -->
                    {{-- {{ dd($rekomendasi) }} --}}

                    @foreach ($rekomendasi->take(10) as $key => $r)
                        <div class="swiper-slide max-w-lg my-8 transition-transform duration-300 hover:scale-[105%] mx-3"
                            onclick="my_modal_3.showModal()" wire:key='item-{{ $key }}'
                            wire:click="setSelectedData({{ $key }})">
                            <div class="relative bg-white shadow-xl rounded-lg overflow-hidden">
                                <!-- Persegi dengan nomor di pojok kiri atas -->
                                <div
                                    class="absolute top-0 left-0 bg-yellow-500 text-white text-sm font-bold py-3 px-3 rounded-br-lg z-10">
                                    {{ $loop->iteration }}
                                </div>
                                <!-- Gambar -->
                                <div class="relative h-80">
                                    <img src="{{ isset($r->image) ? asset('storage/images/' . $r->image) : asset('assets/img/lightbox-1.jpg') }}"
                                        alt="Image Title" class="w-full h-full object-cover">
                                    <!-- Bayangan di bawah gambar untuk memperjelas title -->
                                    <div
                                        class="absolute inset-0 flex items-end justify-start p-4 bg-gradient-to-t from-black to-transparent">
                                        <div>
                                            <h3 class="text-lg font-semibold text-white">{{ $r->name }}</h3>
                                            <div class="flex items-center gap-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($r->feedbacks->avg('rating') > $i)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" viewBox="0 0 30 30" fill="none"
                                                            class="h-3 w-3">
                                                            <g clip-path="url(#clip0_13624_2974)">
                                                                <path
                                                                    d="M14.1033 2.56698C14.4701 1.82374 15.5299 1.82374 15.8967 2.56699L19.1757 9.21093C19.3214 9.50607 19.6029 9.71064 19.9287 9.75797L27.2607 10.8234C28.0809 10.9426 28.4084 11.9505 27.8149 12.5291L22.5094 17.7007C22.2737 17.9304 22.1662 18.2614 22.2218 18.5858L23.4743 25.8882C23.6144 26.7051 22.7569 27.3281 22.0233 26.9424L15.4653 23.4946C15.174 23.3415 14.826 23.3415 14.5347 23.4946L7.9767 26.9424C7.24307 27.3281 6.38563 26.7051 6.52574 25.8882L7.7782 18.5858C7.83384 18.2614 7.72629 17.9304 7.49061 17.7007L2.1851 12.5291C1.59159 11.9505 1.91909 10.9426 2.73931 10.8234L10.0713 9.75797C10.3971 9.71064 10.6786 9.50607 10.8243 9.21093L14.1033 2.56698Z"
                                                                    fill="#FBBF24" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_13624_2974">
                                                                    <rect width="30" height="30"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" viewBox="0 0 30 30" fill="none"
                                                            class="h-3 w-3">
                                                            <g clip-path="url(#clip0_13624_2974)">
                                                                <path
                                                                    d="M14.1033 2.56698C14.4701 1.82374 15.5299 1.82374 15.8967 2.56699L19.1757 9.21093C19.3214 9.50607 19.6029 9.71064 19.9287 9.75797L27.2607 10.8234C28.0809 10.9426 28.4084 11.9505 27.8149 12.5291L22.5094 17.7007C22.2737 17.9304 22.1662 18.2614 22.2218 18.5858L23.4743 25.8882C23.6144 26.7051 22.7569 27.3281 22.0233 26.9424L15.4653 23.4946C15.174 23.3415 14.826 23.3415 14.5347 23.4946L7.9767 26.9424C7.24307 27.3281 6.38563 26.7051 6.52574 25.8882L7.7782 18.5858C7.83384 18.2614 7.72629 17.9304 7.49061 17.7007L2.1851 12.5291C1.59159 11.9505 1.91909 10.9426 2.73931 10.8234L10.0713 9.75797C10.3971 9.71064 10.6786 9.50607 10.8243 9.21093L14.1033 2.56698Z"
                                                                    fill="#DDDDDD" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_13624_2974">
                                                                    <rect width="30" height="30"
                                                                        fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- Navigation buttons -->
                <div class="swiper-pagination mt-5"></div>
            </div>
        @else
            <div class="w-full">
                <h2 class="text-center text-gray-500">Tidak ada data rekomendasi !</h2>
            </div>
        @endif
    </section>

    <!-- Card Slider Section -->
    <section id="all_wisata" class=" bg-white" x-data>
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold">Semua Wisata</h2>
        </div>
        <div class="text-center">
            <ul class="inline-flex gap-4">
                @foreach ($category as $c)
                    <li class=" hover:z-50 hover:border-b-slate-600 hover:border-b-2 hover:border-solid cursor-pointer"
                        wire:key='{{ $c->id }}' wire:click='updateCategorySelected({{ $c->id }})'>
                        {{ $c->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="md:mx-[100px]">
            <div class="grid grid-cols-1 gap-2 mx-3 md:grid-cols-5 md:gap-5" data-aos="fade-left"
                data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500" wire:ignore.self>
                <!-- Slide 1 -->
                @foreach ($alldata as $key => $item)
                    <div class="max-w-lg my-8 transition-transform duration-300 hover:scale-[105%]"
                        onclick="my_modal_3.showModal()" wire:key='item-{{ $key }}'
                        wire:click="setSelectedDataAll({{ $item->id }})">
                        <div class="relative bg-white shadow-xl rounded-lg overflow-hidden">
                            <!-- Persegi dengan nomor di pojok kiri atas -->
                            {{-- <div
                                class="absolute top-0 left-0 bg-yellow-500 text-white text-sm font-bold py-3 px-3 rounded-br-lg z-10">
                                {{ $i + 1 }}
                            </div> --}}
                            <!-- Gambar -->
                            <div class="relative h-80">
                                <img src="{{ isset($item->image) ? asset('storage/images/' . $item->image) : asset('assets/img/lightbox-1.jpg') }}"
                                    alt="Image Title" class="w-full h-full object-cover">
                                <!-- Bayangan di bawah gambar untuk memperjelas title -->
                                <div
                                    class="absolute inset-0 flex items-end justify-start p-4 bg-gradient-to-t from-black to-transparent">
                                    <div>
                                        <h3 class="text-lg font-semibold text-white">{{ $item['name'] }}</h3>
                                        <div class="flex items-center gap-1">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($item->feedbacks->avg('rating') > $i)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                        height="30" viewBox="0 0 30 30" fill="none"
                                                        class="h-3 w-3">
                                                        <g clip-path="url(#clip0_13624_2974)">
                                                            <path
                                                                d="M14.1033 2.56698C14.4701 1.82374 15.5299 1.82374 15.8967 2.56699L19.1757 9.21093C19.3214 9.50607 19.6029 9.71064 19.9287 9.75797L27.2607 10.8234C28.0809 10.9426 28.4084 11.9505 27.8149 12.5291L22.5094 17.7007C22.2737 17.9304 22.1662 18.2614 22.2218 18.5858L23.4743 25.8882C23.6144 26.7051 22.7569 27.3281 22.0233 26.9424L15.4653 23.4946C15.174 23.3415 14.826 23.3415 14.5347 23.4946L7.9767 26.9424C7.24307 27.3281 6.38563 26.7051 6.52574 25.8882L7.7782 18.5858C7.83384 18.2614 7.72629 17.9304 7.49061 17.7007L2.1851 12.5291C1.59159 11.9505 1.91909 10.9426 2.73931 10.8234L10.0713 9.75797C10.3971 9.71064 10.6786 9.50607 10.8243 9.21093L14.1033 2.56698Z"
                                                                fill="#FBBF24" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_13624_2974">
                                                                <rect width="30" height="30" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                        height="30" viewBox="0 0 30 30" fill="none"
                                                        class="h-3 w-3">
                                                        <g clip-path="url(#clip0_13624_2974)">
                                                            <path
                                                                d="M14.1033 2.56698C14.4701 1.82374 15.5299 1.82374 15.8967 2.56699L19.1757 9.21093C19.3214 9.50607 19.6029 9.71064 19.9287 9.75797L27.2607 10.8234C28.0809 10.9426 28.4084 11.9505 27.8149 12.5291L22.5094 17.7007C22.2737 17.9304 22.1662 18.2614 22.2218 18.5858L23.4743 25.8882C23.6144 26.7051 22.7569 27.3281 22.0233 26.9424L15.4653 23.4946C15.174 23.3415 14.826 23.3415 14.5347 23.4946L7.9767 26.9424C7.24307 27.3281 6.38563 26.7051 6.52574 25.8882L7.7782 18.5858C7.83384 18.2614 7.72629 17.9304 7.49061 17.7007L2.1851 12.5291C1.59159 11.9505 1.91909 10.9426 2.73931 10.8234L10.0713 9.75797C10.3971 9.71064 10.6786 9.50607 10.8243 9.21093L14.1033 2.56698Z"
                                                                fill="#DDDDDD" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_13624_2974">
                                                                <rect width="30" height="30" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div>
                Total Data : {{ $alldata->total() }}
            </div>

            {{ $alldata->links() }}
            <!-- Navigation buttons -->
            <div class="swiper-pagination mt-5"></div>
        </div>
    </section>

    <dialog id="my_modal_3" class="modal" wire:ignore.self>
        <div class="modal-box w-11/12 max-w-5xl p-0 h-[90vh]">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <!-- Grid untuk layout 2 bagian -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full">
                <!-- Bagian kiri: Gambar full yang tidak bisa di-scroll -->
                <div class="h-full overflow-hidden">
                    <img src="{{ isset($selected_wisata['image']) ? asset('storage/images/' . $selected_wisata['image']) : asset('assets/img/lightbox-1.jpg') }}"
                        alt="gmabar wisata" class="w-full h-full object-cover rounded-lg">
                </div>
                <!-- Bagian kanan: Konten dengan scroll vertikal -->
                <div class="h-full overflow-y-scroll p-4 custom-scrollbar">
                    <p id="location" class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g style="mix-blend-mode:luminosity">
                                <path
                                    d="M18.27 6C19.28 8.17 19.05 10.73 17.94 12.81C17 14.5 15.65 15.93 14.5 17.5C14 18.2 13.5 18.95 13.13 19.76C13 20.03 12.91 20.31 12.81 20.59C12.71 20.87 12.62 21.15 12.53 21.43C12.44 21.69 12.33 22 12 22C11.61 22 11.5 21.56 11.42 21.26C11.18 20.53 10.94 19.83 10.57 19.16C10.15 18.37 9.61996 17.64 9.07996 16.93L18.27 6ZM9.11996 8.42L5.81996 12.34C6.42996 13.63 7.33996 14.73 8.20996 15.83C8.41996 16.08 8.62996 16.34 8.82996 16.61L13 11.67L12.96 11.68C11.5 12.18 9.87996 11.44 9.29996 10C9.21996 9.83 9.15996 9.63 9.11996 9.43C9.06401 9.09901 9.06401 8.76099 9.11996 8.43V8.42ZM6.57996 4.62L6.56996 4.63C4.94996 6.68 4.66996 9.53 5.63996 11.94L9.62996 7.2L9.57996 7.15L6.57996 4.62ZM14.22 2.36L11 6.17L11.04 6.16C12.38 5.7 13.88 6.28 14.56 7.5C14.71 7.78 14.83 8.08 14.87 8.38C14.93 8.76 14.95 9.03 14.88 9.4V9.41L18.08 5.61C17.2426 4.09013 15.8705 2.93546 14.23 2.37L14.22 2.36ZM9.88996 6.89L13.8 2.24L13.76 2.23C13.18 2.08 12.59 2 12 2C10.03 2 8.16996 2.85 6.84996 4.31L6.82996 4.32L9.88996 6.89Z"
                                    fill="black" />
                            </g>
                        </svg>
                        <span
                            class="font-medium">{{ $selected_wisata['alternatif_kriteria'][0]['alamat'] ?? 'Loading...' }}</span>
                    </p>
                    <h3 class="text-4xl font-medium my-3">

                        {{ $selected_wisata['name'] ?? 'Loading...' }}

                    </h3>
                    <table>
                        <tbody>
                            @isset($selected_wisata['alternatif_kriteria'])
                                @foreach ($selected_wisata['alternatif_kriteria'] as $item)
                                    @if ($item['kriteria']['name'] == 'Biaya')
                                        <tr>
                                            <td class="mr-2">{{ $item['kriteria']['name'] }}</td>
                                            <td>: Rp. {{ $item['value'] ?? 'Loading...' }}</td>
                                        </tr>
                                    @elseif ($item['kriteria']['name'] == 'Fasilitas')
                                        <tr>
                                            <td class="mr-2">{{ $item['kriteria']['name'] ?? 'Loading...' }}</td>
                                            <td>: {{ $item['value'] }} {{ $item['keterangan'] ?? 'Loading...' }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="mr-2">{{ $item['kriteria']['name'] }}</td>
                                            <td>: {{ $item['value'] == 1 ? 5 : 0 }}/5
                                                {{ $item['keterangan'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    <p class="py-4">{{ $selected_wisata['description'] ?? 'Loading...' }}</p>

                    <div id="map" class="rounded-lg" wire:ignore></div>

                    {{-- rating & feedback --}}

                    <section class="py-5 relative" id="ratingfeback">
                        <div class="w-full">
                            <div class="w-full">
                                <h2 class="font-bold leading-10 text-black mb-8 text-center text-2xl">
                                    Ulasan & Rating</h2>
                                <div class="grid mb-11  place-content-center">
                                    <div class="w-full col-span-12 items-center my-3">
                                        <div class="grid grid-cols-12 h-full p-2 rounded-3xl bg-gray-100 w-full">
                                            <div class="col-span-12 flex items-center justify-center">
                                                <div
                                                    class="py-3 border-gray-200 flex items-center justify-center flex-col">
                                                    <h2
                                                        class="font-manrope font-bold text-3xl text-black text-center mb-2">
                                                        {{ $resumeRating ?? 0 }}</h2>
                                                    <div class="flex items-center gap-3 mb-2">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($resumeRating > $i)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                                    height="36" viewBox="0 0 36 36" fill="none"
                                                                    class="h-5 w-5">
                                                                    <g clip-path="url(#clip0_13624_3137)">
                                                                        <path
                                                                            d="M17.1033 2.71738C17.4701 1.97413 18.5299 1.97413 18.8967 2.71738L23.0574 11.1478C23.2031 11.4429 23.4846 11.6475 23.8103 11.6948L33.1139 13.0467C33.9341 13.1659 34.2616 14.1739 33.6681 14.7524L26.936 21.3146C26.7003 21.5443 26.5927 21.8753 26.6484 22.1997L28.2376 31.4656C28.3777 32.2825 27.5203 32.9055 26.7867 32.5198L18.4653 28.145C18.174 27.9919 17.826 27.9919 17.5347 28.145L9.21334 32.5198C8.47971 32.9055 7.62228 32.2825 7.76239 31.4656L9.35162 22.1997C9.40726 21.8753 9.29971 21.5443 9.06402 21.3146L2.33193 14.7524C1.73841 14.1739 2.06593 13.1659 2.88615 13.0467L12.1897 11.6948C12.5154 11.6475 12.7969 11.4429 12.9426 11.1478L17.1033 2.71738Z"
                                                                            fill="#FBBF24" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_13624_3137">
                                                                            <rect width="36" height="36"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                                    height="36" viewBox="0 0 36 36" fill="none"
                                                                    class="h-5 w-5">
                                                                    <g clip-path="url(#clip0_13624_3137)">
                                                                        <path
                                                                            d="M17.1033 2.71738C17.4701 1.97413 18.5299 1.97413 18.8967 2.71738L23.0574 11.1478C23.2031 11.4429 23.4846 11.6475 23.8103 11.6948L33.1139 13.0467C33.9341 13.1659 34.2616 14.1739 33.6681 14.7524L26.936 21.3146C26.7003 21.5443 26.5927 21.8753 26.6484 22.1997L28.2376 31.4656C28.3777 32.2825 27.5203 32.9055 26.7867 32.5198L18.4653 28.145C18.174 27.9919 17.826 27.9919 17.5347 28.145L9.21334 32.5198C8.47971 32.9055 7.62228 32.2825 7.76239 31.4656L9.35162 22.1997C9.40726 21.8753 9.29971 21.5443 9.06402 21.3146L2.33193 14.7524C1.73841 14.1739 2.06593 13.1659 2.88615 13.0467L12.1897 11.6948C12.5154 11.6475 12.7969 11.4429 12.9426 11.1478L17.1033 2.71738Z"
                                                                            fill="#DDDDDD" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_13624_3137">
                                                                            <rect width="36" height="36"
                                                                                fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <p class="font-normal text-lg leading-8 text-gray-400">
                                                        {{ count($allFeedback) }} Ratings
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full col-span-12 items-center my-3 ">
                                        <div class="box flex flex-col w-full">

                                            @for ($i = 5; $i >= 1; $i--)
                                                <div class="flex items-center w-full">
                                                    <p class="font-medium text-lg py-[1px] text-black mr-[2px]">
                                                        {{ $i }}</p>
                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_12042_8589)">
                                                            <path
                                                                d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                                                fill="#FBBF24" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_12042_8589">
                                                                <rect width="20" height="20" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <p
                                                        class="h-2 w-full sm:min-w-[278px] rounded-[30px] bg-gray-200 ml-3 mr-3">
                                                        <span
                                                            class="h-full w-[{{ count($allFeedback) > 0 ? (($ratingsWithCount[$i] ?? 0) / count($allFeedback)) * 100 : 0 }}%] rounded-[30px] bg-indigo-500 flex"></span>
                                                    </p>

                                                    <p class="font-medium text-lg py-[1px] text-black mr-[2px]">

                                                        {{ $ratingsWithCount[$i] ?? 0 }}

                                                    </p>


                                                </div>
                                            @endfor

                                        </div>
                                    </div>

                                </div>
                                <div class="pb-8 ">
                                    <h4 class="font-semibold text-2xl leading-10 text-black">Ulasan yang sangat
                                        membantu</h4>

                                    @if (Auth::check())
                                        @if ($feedbackuser)
                                            {{-- {{ dd($feedbackuser) }} --}}
                                            <div id="items"
                                                class="border-b border-gray-200 py-3 bg-gray-200 p-3 rounded-xl">
                                                <div
                                                    class="flex sm:items-center flex-col sm:flex-row justify-between ">
                                                    <div class="flex items-center gap-1">
                                                        @for ($i = 0; $i < $feedbackuser->rating; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                height="30" viewBox="0 0 30 30" fill="none"
                                                                class="h-3 w-3">
                                                                <g clip-path="url(#clip0_13624_2974)">
                                                                    <path
                                                                        d="M14.1033 2.56698C14.4701 1.82374 15.5299 1.82374 15.8967 2.56699L19.1757 9.21093C19.3214 9.50607 19.6029 9.71064 19.9287 9.75797L27.2607 10.8234C28.0809 10.9426 28.4084 11.9505 27.8149 12.5291L22.5094 17.7007C22.2737 17.9304 22.1662 18.2614 22.2218 18.5858L23.4743 25.8882C23.6144 26.7051 22.7569 27.3281 22.0233 26.9424L15.4653 23.4946C15.174 23.3415 14.826 23.3415 14.5347 23.4946L7.9767 26.9424C7.24307 27.3281 6.38563 26.7051 6.52574 25.8882L7.7782 18.5858C7.83384 18.2614 7.72629 17.9304 7.49061 17.7007L2.1851 12.5291C1.59159 11.9505 1.91909 10.9426 2.73931 10.8234L10.0713 9.75797C10.3971 9.71064 10.6786 9.50607 10.8243 9.21093L14.1033 2.56698Z"
                                                                        fill="#FBBF24" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_13624_2974">
                                                                        <rect width="30" height="30"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <h6 class="font-semibold leading-8 text-black">
                                                            {{ '@' . Auth::user()->name }}</h6>
                                                        <p class="font-normal leading-7 text-gray-400">
                                                            {{ \Carbon\Carbon::parse($feedbackuser->updated_at)->subDay()->format('M d, Y') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <p class="font-normal text-sm text-gray-500 ">
                                                    {{ $feedbackuser->comment }}
                                                </p>
                                                <div class="mt-3 w-full flex justify-end">
                                                    <button
                                                        class="btn btn-sm bg-gray-400 hover:bg-red-400 hover:text-white"
                                                        wire:click='deleteFeedback({{ $feedbackuser->id }})'>Delete</button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-rating mt-3 mb-5">
                                                <form wire:submit.prevent="submitFeedback">
                                                    <label for="">Seberapa Bagus Wisata ini?</label>
                                                    <br>
                                                    <div class="rating rating-md">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <input type="radio" name="rating"
                                                                value="{{ $i }}" wire:model="rating"
                                                                class="mask mask-star-2 bg-orange-400" />
                                                        @endfor
                                                    </div>
                                                    @error('rating')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror

                                                    <label for="feedback">Berikan tanggapan Anda tentang wisata
                                                        ini</label>
                                                    <div class="feedback">
                                                        <textarea id="feedback" name="feedback" rows="5"
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                            wire:model="feedback" placeholder="Masukkan feedback Anda..."></textarea>
                                                        @error('feedback')
                                                            <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <input type="submit" value="Simpan"
                                                        class="btn btn-sm btn-primary float-right mt-2">
                                                </form>
                                            </div>
                                        @endif

                                    @endif

                                    @foreach ($allFeedback as $item)
                                        @if (Auth::check() == null || Auth::user()->id != $item->user->id)
                                            <div id="items" class="border-b border-gray-200 py-3">
                                                <div
                                                    class="flex sm:items-center flex-col sm:flex-row justify-between ">
                                                    <div class="flex items-center gap-1">
                                                        @for ($i = 0; $i < $item->rating; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                height="30" viewBox="0 0 30 30" fill="none"
                                                                class="h-3 w-3">
                                                                <g clip-path="url(#clip0_13624_2974)">
                                                                    <path
                                                                        d="M14.1033 2.56698C14.4701 1.82374 15.5299 1.82374 15.8967 2.56699L19.1757 9.21093C19.3214 9.50607 19.6029 9.71064 19.9287 9.75797L27.2607 10.8234C28.0809 10.9426 28.4084 11.9505 27.8149 12.5291L22.5094 17.7007C22.2737 17.9304 22.1662 18.2614 22.2218 18.5858L23.4743 25.8882C23.6144 26.7051 22.7569 27.3281 22.0233 26.9424L15.4653 23.4946C15.174 23.3415 14.826 23.3415 14.5347 23.4946L7.9767 26.9424C7.24307 27.3281 6.38563 26.7051 6.52574 25.8882L7.7782 18.5858C7.83384 18.2614 7.72629 17.9304 7.49061 17.7007L2.1851 12.5291C1.59159 11.9505 1.91909 10.9426 2.73931 10.8234L10.0713 9.75797C10.3971 9.71064 10.6786 9.50607 10.8243 9.21093L14.1033 2.56698Z"
                                                                        fill="#FBBF24" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_13624_2974">
                                                                        <rect width="30" height="30"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <h6 class="font-semibold leading-8 text-black">
                                                            {{ '@' . $item->user->name }}
                                                        </h6>
                                                        <p class="font-normal leading-7 text-gray-400">
                                                            {{ \Carbon\Carbon::parse($item->updated_at)->subDay()->format('M d, Y') }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <p class="font-normal text-sm text-gray-500 ">
                                                    {{ $item->comment }}
                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div
                                    class="flex flex-col sm:flex-row items-center justify-between pt-8  max-xl:max-w-3xl max-xl:mx-auto">
                                    <p class="font-normal text-lg py-[1px] text-black">{{ count($allFeedback) }}
                                        Reviews</p>

                                </div>
                            </div>
                        </div>
                    </section>


                    {{-- rating & feedback --}}
                </div>
            </div>
        </div>
    </dialog>



    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 Skripsi - Ach. Fasihul Lisan</p>
        </div>
    </footer>
    <!-- Swiper JS Initialization -->

    @persist('scripts')
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 50,
                    },
                },
            });
            // Set initial coordinates from PHP variables
            var initialLatitude = -1231;
            var initialLongitude = 1231;
            var map, marker;
            // Initialize the map
            function initializeMap() {
                // Create the map centered at the initial coordinates
                map = L.map('map').setView([initialLatitude, initialLongitude], 15);

                // Add the OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                // Add a marker at the initial position
                marker = L.marker([initialLatitude, initialLongitude]).addTo(map)
                    .bindPopup(`
                <b>Hello world!</b><br />
                I am a popup.<br />
                <a href="https://www.google.com/maps?q=${initialLatitude},${initialLongitude}" target="_blank">
                    Open in Google Maps
                </a>
            `).openPopup();

            }

            // Function to update the map with new coordinates
            function updateMap(latitude, longitude, name, alamat) {
                // Update marker and map center
                var newLatLng = new L.LatLng(latitude, longitude);
                marker.setLatLng(newLatLng);
                map.setView(newLatLng, 15);
                // Check if latitude and longitude are valid for Google Maps
                var googleMapsUrl = (latitude !== 0 && longitude !== 0) ?
                    `https://www.google.com/maps?q=${latitude},${longitude}` :
                    '#rekomendasi'; // Set to '#' or some default value if lat/long are 0

                // Bind the popup with name, address, and the Google Maps link
                marker.bindPopup(`
                    <b>${name}</b><br />
                    ${alamat}
                    <br />
                    <a href="${googleMapsUrl}">
                        Open in Google Maps
                    </a>
                `).openPopup();
            }

            // Initialize the map on page load
            document.addEventListener('DOMContentLoaded', function() {
                initializeMap();
            });

            // Listen for the Livewire event to update the coordinates dynamically
            document.addEventListener('livewire:init', function() {
                Livewire.on('updateMaps', ({
                    lat,
                    lng,
                    name,
                    alamat
                }) => {
                    var latitude = parseFloat(lat);
                    var longitude = parseFloat(lng);
                    updateMap(latitude, longitude, name, alamat);
                });
            });
        </script>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @endpersist
</div>
