<div>

    <x-admin.modal x-show="{modelEdit}" class="modal fade" id="modalEdit" wire:ignore.self>
        <x-slot name="title">
            Edit Data
        </x-slot>
        {{-- {{ dd($alternatif) }} --}}

        <div class="form-group ">
            <label for="formGroupExampleInput">Alternatif</label>
            <select class="form-control basic" wire:model.live='alternatif_id' disabled>
                @if ($alternatif)
                    <option selected value="{{ $alternatif->id }}">{{ $alternatif->name }}</option>
                @endif
            </select>
            <div class="invalid-feedback">
                @error('alternatif')
                    {{ $message }}
                @enderror
            </div>

        </div>
        @if ($alternatif)
            @if ($alternatif->alternatifKriteria->count() == 0)
                @foreach ($kriteria as $index => $item)
                    <div class="form-group ">
                        <label for="formGroupExampleInput">{{ $item->name }}</label>

                        <input type="number" class="form-control @error('value.' . $index) is-invalid @enderror"
                            id="formGroupExampleInput" placeholder="Nilai {{ $item->name }}"
                            wire:model='value.{{ $index }}'>
                        <div class="invalid-feedback">
                            @error('value.' . $index)
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($alternatif->alternatifKriteria as $index => $item)
                    <div class="form-group ">
                        <label for="formGroupExampleInput">{{ $item->kriteria->name }}</label>

                        <input type="number" class="form-control @error('value.' . $index) is-invalid @enderror"
                            id="formGroupExampleInput" placeholder="Nilai {{ $item->kriteria->name }}"
                            wire:model='value.{{ $index }}'>
                        <div class="invalid-feedback">
                            @error('value.' . $index)
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                @endforeach
            @endif
        @endif

        <x-slot name="footer">
            <button class="btn" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter"><i
                    class="flaticon-cancel-12"></i>
                Discard</button>
            <button wire:click='update' type="submit" x-on:click="modelEdit = ! modelEdit" class="btn btn-primary"
                data-dismiss="modal" data-toggle="modal">
                <svg wire:loading wire:target='store' xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-loader spin mr-2">
                    <line x1="12" y1="2" x2="12" y2="6"></line>
                    <line x1="12" y1="18" x2="12" y2="22"></line>
                    <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                    <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                    <line x1="2" y1="12" x2="6" y2="12"></line>
                    <line x1="18" y1="12" x2="22" y2="12"></line>
                    <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                    <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                </svg>
                Save
            </button>
        </x-slot>

    </x-admin.modal>

</div>
