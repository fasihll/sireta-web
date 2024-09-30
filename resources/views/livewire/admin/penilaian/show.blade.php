 <div class="row layout-spacing" x-data="{ modelEdit: false }">

     <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
         <x-admin.title title="Data Penilaian" />

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

                     {{-- <div class="d-flex">
                         @livewire('admin.penilaian.create')
                     </div> --}}


                 </div>


                 <table
                     class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th class="">Alternatif</th>
                             <th class="">Nilai Kriteria</th>
                             <th class="text-center">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($data as $item)
                             <tr wire:key='{{ $item->id }}'>
                                 <td>
                                     {{ ($data->currentpage() - 1) * $data->perpage() + $loop->index + 1 }}
                                 </td>

                                 <td>{{ $item->name }}</td>
                                 <td class="flex flex-wrap">
                                     @foreach ($item->alternatifKriteria as $ak)
                                         <span class="badge badge-primary">{{ $ak->kriteria->name }} :
                                             {{ $ak->value }}</span>
                                     @endforeach
                                 </td>

                                 <td class="text-center">
                                     <ul class="table-controls">
                                         <li>
                                             <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                 title="Edit" class=""><svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round" class="feather feather-edit-2 text-success"
                                                     data-toggle="modal" data-target="#modalEdit"
                                                     x-on:click="modelEdit = ! modelEdit"
                                                     wire:click="dataEdit({{ $item->id }})">
                                                     <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                     </path>
                                                 </svg>
                                             </a>
                                         </li>
                                         {{-- <li>
                                             <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                 title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                     height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round"
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
                                         </li> --}}
                                     </ul>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>



                 @livewire('admin.penilaian.edit')


                 {{ $data->links() }}

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
 @endassets
