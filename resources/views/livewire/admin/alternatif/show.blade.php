 <div class="row layout-spacing" x-data="{ modelEdit: false }">

     <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
         <x-admin.title title="Data Alternatif" />
         <div class="widget widget-content-area br-4">
             <div class="widget-one">

                 <div class="d-flex justify-content-between align-items-center mb-3">
                     <div class="d-flex">
                         <div class="search-input-group-style input-group" style="width: 30rem">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1"><svg
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                         <circle cx="11" cy="11" r="8"></circle>
                                         <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                     </svg></span>
                             </div>
                             <input type="text" class="form-control" placeholder="Search" aria-label="Username"
                                 aria-describedby="basic-addon1" wire:model.live='keyword'>

                         </div>

                         <div class="input-group ml-2">
                             @if (count($selectedData) >= 1)
                                 <button class="btn btn-danger" wire:click="deleteSelected">Delete <span
                                         class="font-weight-bold">({{ count($selectedData) }})</span></button>
                             @endif
                         </div>
                     </div>



                     @livewire('admin.alternatif.create')


                 </div>

                 {{-- uplaod file excel --}}

                 <div class="d-flex align-items-center">
                     <div class="custom-file-container" data-upload-id="myFirstImage" wire:ignore>
                         <label class="custom-file-container__custom-file">
                             <input type="file" wire:model="excelFile"
                                 class="custom-file-container__custom-file__custom-file-input" accept=".xlsx,.xls,.csv">
                             @error('excelFile')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                             <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                             <span class="custom-file-container__custom-file__custom-file-control"></span>
                         </label>
                     </div>
                     <button class="btn btn-success" style="transform: translateY(3px)" wire:click='importExcel'><svg
                             wire:loading wire:target='excelFile,importExcel' xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-loader spin mr-2">
                             <line x1="12" y1="2" x2="12" y2="6"></line>
                             <line x1="12" y1="18" x2="12" y2="22"></line>
                             <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                             <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                             <line x1="2" y1="12" x2="6" y2="12"></line>
                             <line x1="18" y1="12" x2="22" y2="12"></line>
                             <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                             <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                         </svg>Import</button>
                 </div>

                 <div class="my-3">
                     <p>Download Template Excel <span class="btn btn-sm btn-success" wire:click='downloadTemplate'>Data
                             Wisata Tmplate</span></p>
                 </div>

                 <table
                     class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                     <thead>
                         <tr>
                             <th class="checkbox-column">
                                 <label class="new-control new-checkbox checkbox-primary"
                                     style="height: 18px; margin: 0 auto">
                                     <input type="checkbox" class="new-control-input todochkbox" id="todoAll"
                                         wire:model='selectAll' wire:change="$dispatch('selectall')" />
                                     <span class="new-control-indicator"></span>
                                 </label>
                             </th>
                             <th class="">Image</th>
                             <th class="">Name</th>
                             <th class="text-wrap">Description</th>
                             <th class="">Category</th>
                             <th class="text-center">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($wisata as $item)
                             <tr wire:key='{{ $item->id }}'>
                                 <td class="checkbox-column">
                                     <label class="new-control new-checkbox checkbox-primary"
                                         style="height: 18px; margin: 0 auto">
                                         <input type="checkbox" class="new-control-input todochkbox" id="todo-1"
                                             value="{{ $item->id }}" wire:model.live="selectedData"
                                             @if (!in_array($item->id, $selectedData)) checked @endif />
                                         <span class="new-control-indicator"></span>
                                     </label>
                                 </td>
                                 <td>
                                     @if ($item->image)
                                         <div class="avatar avatar-sm">
                                             <img src="{{ asset('storage/images/' . $item->image) }}"
                                                 alt="{{ $item->name }}" class="rounded-circle" />
                                         </div>
                                     @else
                                         <p>No Image</p>
                                     @endif
                                 </td>
                                 <td>
                                     <p class="mb-0">{{ $item->name }}</p>
                                 </td>
                                 <td class="text-truncate" style="max-width: 30rem;">{{ $item->description }}</td>
                                 <td>{{ $item->category->name }}</td>

                                 <td class="text-center">
                                     <ul class="table-controls">
                                         <li>
                                             <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                 title="Edit" class=""><svg
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2 text-success" data-toggle="modal"
                                                     data-target="#modalEdit" x-on:click="modelEdit = ! modelEdit"
                                                     wire:click="dataEdit({{ $item->id }})">
                                                     <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                     </path>
                                                 </svg>
                                             </a>
                                         </li>
                                         <li>
                                             <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                 title="Delete"><svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24" height="24" viewBox="0 0 24 24"
                                                     fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash-2 text-danger"
                                                     wire:click='delete({{ $item->id }})'>
                                                     <polyline points="3 6 5 6 21 6"></polyline>
                                                     <path
                                                         d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                     </path>
                                                     <line x1="10" y1="11" x2="10"
                                                         y2="17">
                                                     </line>
                                                     <line x1="14" y1="11" x2="14"
                                                         y2="17">
                                                     </line>
                                                 </svg></a>
                                         </li>
                                     </ul>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>



                 @livewire('admin.alternatif.edit')


                 {{ $wisata->links() }}

             </div>
         </div>
     </div>

     <script>
         $.fn.modal.Constructor.prototype.show = () => $('.modal-backdrop').not(":first").remove()
     </script>

 </div>

 @assets
     <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css" />
     <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/elements/avatar.css" rel="stylesheet" type="text/css" />

     @push('scripts')
         <script>
             var firstUpload = new FileUploadWithPreview('myFirstImage')
         </script>
     @endpush
 @endassets
