 <div class="row layout-spacing" x-data="{ modelEdit: false }">

     <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
         <x-admin.title title="Data Matrix Perbandingan" />
         <div class="widget widget-content-area br-4">
             <div class="widget-one">
                 <table class="table table-bordered table-hover">
                     <thead>
                         <tr>
                             <th class="text-left align-middle">Nama Kriteria</th>
                             <th class="text-center align-middle">Skala Perbandingan</th>
                             <th class="text-right align-middle">Nama Kriteria</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($kriteria as $index1 => $criterion1)
                             @foreach ($kriteria as $index2 => $criterion2)
                                 @if ($index1 < $index2)
                                     <tr>
                                         <td>{{ $criterion1->name }}</td>
                                         <td class="text-center">
                                             <div x-data="{ selected: @entangle('comparisonMatrix.' . $index1 . '.' . $index2) }" class="btn-group" role="group">
                                                 <!-- Skala ke kiri (9-1) -->
                                                 <template x-for="i in [9,8,7,6,5,4,3,2]" :key="'left' + i">
                                                     <button x-text="i"
                                                         :class="selected == i ? 'bg-danger text-white' : 'btn-primary'"
                                                         class="btn"
                                                         @click="$wire.selectScale({{ $index1 }}, {{ $index2 }}, i, 'left')">
                                                     </button>
                                                 </template>

                                                 <!-- Tombol "1" di tengah -->
                                                 <button x-text="1"
                                                     :class="selected == 1 ? 'bg-danger text-white' : 'btn-primary'"
                                                     class="btn"
                                                     @click="$wire.selectScale({{ $index1 }}, {{ $index2 }}, 1, 'equal')">
                                                 </button>

                                                 <!-- Skala ke kanan (1-9) -->
                                                 <template x-for="i in [2,3,4,5,6,7,8,9]" :key="'right' + i">
                                                     <button x-text="i"
                                                         :class="selected == (1 / i) ? 'bg-danger text-white' :
                                                             'btn-primary'"
                                                         class="btn"
                                                         @click="$wire.selectScale({{ $index1 }}, {{ $index2 }}, i, 'right')">
                                                     </button>
                                                 </template>
                                             </div>
                                         </td>
                                         <td class="text-right">{{ $criterion2->name }}</td>
                                     </tr>
                                 @endif
                             @endforeach
                         @endforeach
                     </tbody>
                 </table>


                 <div class="text-center my-5">
                     <button class="btn btn-danger" wire:click='back'>Kembali</button>
                     <button class="btn btn-success" wire:click="proccessAHP"><svg wire:loading
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-loader spin mr-2">
                             <line x1="12" y1="2" x2="12" y2="6"></line>
                             <line x1="12" y1="18" x2="12" y2="22"></line>
                             <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                             <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                             <line x1="2" y1="12" x2="6" y2="12"></line>
                             <line x1="18" y1="12" x2="22" y2="12"></line>
                             <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                             <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                         </svg> Generate AHP Proprity & Save</button>
                 </div>




             </div>
         </div>

         <x-admin.title title="Hasil Matrix Perbandingan" />

         <div class="widget widget-content-area br-4">
             <div class="widget-one">
                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th>Kriteria</th>
                             @foreach ($kriteria as $criterion)
                                 <th>{{ $criterion->name }}</th>
                             @endforeach
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($comparisonMatrix as $rowIndex => $row)
                             <tr>
                                 <td>{{ $kriteria[$rowIndex]->name }}</td>
                                 @foreach ($row as $col)
                                     <td>{{ number_format($col, 2) }}</td>
                                 @endforeach
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>

     </div>
 </div>
