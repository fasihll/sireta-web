<div x-show="{ open: false }">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate" x-on:click="open = ! open">Create
        Data</button>

    <x-admin.modal x-show="{open}" class="modal fade" id="modalCreate" wire:ignore.self>
        <x-slot name="title">
            Create Data
        </x-slot>
        <div class="form-group ">
            <label for="formGroupExampleInput">Alternatif</label>
            <select class="form-control basic" wire:model='alternatif_id'>
                @foreach ($alternatif as $item)
                    <option hidden>Pilih Alternatif</option>
                    @if (!$alternatifWithMultipleEntries->contains($item->id))
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('alternatif')
                    {{ $message }}
                @enderror
            </div>

        </div>

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

        <x-slot name="footer">
            <button class="btn" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter"><i
                    class="flaticon-cancel-12"></i>
                Discard</button>
            <button wire:click='store' type="submit" x-on:click="open = ! open" class="btn btn-primary"
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
