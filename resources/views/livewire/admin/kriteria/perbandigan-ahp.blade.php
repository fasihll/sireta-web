 <div class="row layout-spacing" x-data="{ modelEdit: false }">

     <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
         <x-admin.title title="Data Matrix Perbandingan" />
         <div class="widget widget-content-area br-4">

             {{-- uplaod file excel --}}
             <div class="custom-file-container mb-4" data-upload-id="myFirstImage" wire:ignore>
                 <label for="excelFile">Upload Matrix Perbandingan (Kuesioner) <a href="javascript:void(0)"
                         class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                 <label class="custom-file-container__custom-file">
                     <input type="file" wire:model="excelFile"
                         class="custom-file-container__custom-file__custom-file-input" accept=".xlsx, .xls, .csv">
                     @error('excelFile')
                         <span class="text-danger">{{ $message }}</span>
                     @enderror
                     <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                     <span class="custom-file-container__custom-file__custom-file-control"></span>
                 </label>
             </div>

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
                         </svg> Generate AHP Priority & Save</button>
                 </div>




             </div>
         </div>

         <x-admin.title title="Hasil Matrix Perbandingan" />

         <div class="widget widget-content-area br-4">
             <div class="widget-one">
                 <h4>Matrix Perbandingan</h4>
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
                 @if ($AhpResult)
                     <h4>Normalisasi</h4>
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Kriteria</th>
                                 @foreach ($kriteria as $criterion)
                                     <th>{{ $criterion->name }}</th>
                                 @endforeach
                                 <th>Jumlah</th>
                                 <th>Weigth</th>
                                 <th>Eigen Value</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach (json_decode($AhpResult->matrix_normalized) as $rowIndex => $row)
                                 <tr>
                                     <td>{{ $kriteria[$rowIndex]->name }}</td>
                                     @foreach ($row as $col)
                                         <td>{{ number_format($col, 2) }}</td>
                                     @endforeach

                                     <td>{{ number_format(json_decode($AhpResult->matrix_normalized_col_sum)[$rowIndex], 2) }}
                                     </td>
                                     <td>{{ number_format(json_decode($AhpResult->wights)[$rowIndex], 2) }}</td>
                                     <td>{{ number_format(json_decode($AhpResult->eigens)[$rowIndex], 2) }}</td>

                                 </tr>
                             @endforeach
                         </tbody>
                     </table>

                     <h4>Status</h4>

                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Consistecy Index</th>
                                 <th>Random Index</th>
                                 <th>Consistecy Ratio</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>

                                 <td>{{ $AhpResult->consistency_index }}</td>
                                 <td>{{ $AhpResult->random_index }}</td>
                                 <td>{{ $AhpResult->consistency_ratio }}</td>
                                 <td>
                                     @if ($AhpResult->is_consistent)
                                         <span class="badge badge-success">Konsisten</span>
                                     @else
                                         <span class="badge badge-danger">Tidak Konsisten</span>
                                     @endif
                                 </td>

                             </tr>
                         </tbody>
                     </table>

                     <h4>Prioritas</h4>

                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 @foreach ($kriteria as $criterion)
                                     <th>{{ $criterion->name }}</th>
                                 @endforeach
                             </tr>
                         </thead>
                         <tbody>
                             <tr>

                                 @foreach (json_decode($AhpResult->wights) as $priority)
                                     <td>{{ $priority }}</td>
                                 @endforeach

                             </tr>
                         </tbody>
                     </table>
                 @endif
             </div>
         </div>

     </div>
 </div>
 @assets
     @push('scripts')
         <script>
             var firstUpload = new FileUploadWithPreview('myFirstImage')
         </script>
     @endpush
 @endassets
