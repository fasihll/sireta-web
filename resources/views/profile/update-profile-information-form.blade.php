@push('src')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
@endpush
<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
                    x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.live="state.name" required
                autocomplete="name" value="{{ $state['name'] }}" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model.live="state.email" required
                autocomplete="username" value="{{ $state['email'] }}" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        {{-- {{ dd($state) }} --}}

        <div class="col-span-6 sm:col-span-4">
            <x-label for="provinsi" value="{{ __('Provinsi') }}" />
            <select id="provinsi"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model.live="state.provinsi" autocomplete="provinsi">
                <option value="">Pilih Provinsi</option>
            </select>
            <x-input-error for="provinsi" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="kabupaten" value="{{ __('Kabupaten') }}" />
            <select id="kabupaten"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model.live="state.kabupaten" autocomplete="kabupaten" disabled>
                <option value="">Pilih Kabupaten</option>
            </select>
            <x-input-error for="kabupaten" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="kecamatan" value="{{ __('Kecamatan') }}" />
            <select id="kecamatan"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model.live="state.kecamatan" autocomplete="kecamatan" disabled>
                <option value="">Pilih Kecamatan</option>
            </select>
            <x-input-error for="kecamatan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="desa" value="{{ __('Desa') }}" />
            <select id="desa"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model.live="state.desa" autocomplete="desa" disabled>
                <option value="">Pilih Desa</option>
            </select>
            <x-input-error for="desa" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="alamat" value="{{ __('Alamat') }}" />
            <x-input id="alamat" type="text" class="mt-1 block w-full" wire:model.live="state.alamat"
                autocomplete="alamat" />
            <x-input-error for="alamat" class="mt-2" />
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
<script>
    $(document).ready(function() {
        function loadSelect(url, $select, placeholder, disableNextSelect, selectedValue = null) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(res) {
                    const response = Object.entries(res);

                    $select.empty(); // Kosongkan select input
                    $select.append('<option value="">' + placeholder + '</option>');

                    if (response && response.length > 0) {
                        response.forEach(function([key, value]) {
                            // Set the selected attribute if it matches the selectedValue
                            const selected = key === selectedValue ? ' selected' : '';
                            $select.append('<option value="' + key + '"' + selected + '>' +
                                value + '</option>');
                        });
                        $select.prop('disabled', false);
                    } else {
                        $select.append('<option value="">Tidak ada data</option>');
                        $select.prop('disabled', true);
                    }

                    if (disableNextSelect) {
                        disableNextSelect.prop('disabled', true).empty().append(
                            '<option value="">' + disableNextSelect.data('placeholder') +
                            '</option>'
                        );
                    }
                },
                error: function() {
                    alert('Gagal memuat data dari API.');
                }
            });
        }

        // Load provinces
        var initialProvince = '{{ $state['provinsi'] ?? '' }}';
        loadSelect('{{ route('getallprovinces') }}', $('#provinsi'), 'Pilih Provinsi', $(
            '#kabupaten, #kecamatan, #desa'), initialProvince);

        // Check initial province to load regencies if available
        if (initialProvince) {
            var baseUrl = '{{ route('getallkabupaten', ['provinsi_id']) }}';
            var url = baseUrl.replace('provinsi_id', initialProvince);
            loadSelect(url, $('#kabupaten'), 'Pilih Kabupaten', $('#kecamatan, #desa'),
                '{{ $state['kabupaten'] ?? '' }}');
        }

        // Check initial regency to load sub-districts if available
        var initialRegency = '{{ $state['kabupaten'] ?? '' }}';
        if (initialRegency) {
            var provinceCode = '{{ $state['provinsi'] ?? '' }}';
            var baseUrl = '{{ route('getallkecamatan', ['provinsi_id', 'kabupaten_id']) }}';
            var url = baseUrl
                .replace('provinsi_id', provinceCode)
                .replace('kabupaten_id', initialRegency);
            console.log(provinceCode);
            loadSelect(url, $('#kecamatan'), 'Pilih Kecamatan', $('#desa'), '{{ $state['kecamatan'] ?? '' }}');
        }

        // Check initial sub-district to load villages if available
        var initialDistrict = '{{ $state['kecamatan'] ?? '' }}';
        if (initialDistrict) {
            var provinceCode = '{{ $state['provinsi'] ?? '' }}';
            var regencyCode = '{{ $state['kabupaten'] ?? '' }}';
            var baseUrl = '{{ route('getalldesa', ['provinsi_id', 'kabupaten_id', 'kecamatan_id']) }}';
            var url = baseUrl
                .replace('provinsi_id', provinceCode)
                .replace('kabupaten_id', regencyCode)
                .replace('kecamatan_id', initialDistrict);
            loadSelect(url, $('#desa'), 'Pilih Desa', null, '{{ $state['desa'] ?? '' }}');
        }

        // Event handlers for changes
        $('#provinsi').change(function() {
            var provinceCode = $(this).val();
            if (provinceCode) {
                var baseUrl = '{{ route('getallkabupaten', ['provinsi_id']) }}';
                var url = baseUrl.replace('provinsi_id', provinceCode);
                loadSelect(url, $('#kabupaten'), 'Pilih Kabupaten', $('#kecamatan, #desa'),
                    '{{ $state['kabupaten'] ?? '' }}');
            }
        });

        $('#kabupaten').change(function() {
            var regencyCode = $(this).val();
            var provinceCode = $('#provinsi').val();
            if (regencyCode) {
                var baseUrl = '{{ route('getallkecamatan', ['provinsi_id', 'kabupaten_id']) }}';
                var url = baseUrl
                    .replace('provinsi_id', provinceCode)
                    .replace('kabupaten_id', regencyCode);
                loadSelect(url, $('#kecamatan'), 'Pilih Kecamatan', $('#desa'),
                    '{{ $state['kecamatan'] ?? '' }}');
            }
        });

        $('#kecamatan').change(function() {
            var districtCode = $(this).val();
            var provinceCode = $('#provinsi').val();
            var regencyCode = $('#kabupaten').val();
            if (districtCode) {
                var baseUrl =
                    '{{ route('getalldesa', ['provinsi_id', 'kabupaten_id', 'kecamatan_id']) }}';
                var url = baseUrl
                    .replace('provinsi_id', provinceCode)
                    .replace('kabupaten_id', regencyCode)
                    .replace('kecamatan_id', districtCode);
                loadSelect(url, $('#desa'), 'Pilih Desa', null, '{{ $state['desa'] ?? '' }}');
            }
        });

    });
</script>
