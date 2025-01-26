<div x-show="{ open: false }">

    <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate" x-on:click="open = ! open">Create
        Data</button>

    <x-admin.modal x-show="{open}" class="modal fade" id="modalCreate" wire:ignore.self>
        <x-slot name="title">
            Create Data
        </x-slot>

        <div class="form-group ">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                id="exampleFormControlFile1" wire:model="image">
            <div class="invalid-feedback">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <div wire:loading wire:target="image">Uploading...</div>
        </div>
        <div class="form-group ">
            <label for="formGroupExampleInput">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput"
                placeholder="Example input" wire:model='name'>
            <div class="invalid-feedback">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

        </div>
        <div class="form-group ">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" wire:model='description' maxlength="255"></textarea>
            <div class="invalid-feedback">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group ">
            <label for="select-form">Pilih category</label>
            <select id="select-form" class="form-control @error('category') is-invalid @enderror" wire:model='category'>
                @foreach ($categorys as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('category')
                    {{ $message }}
                @enderror
            </div>
        </div>

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
