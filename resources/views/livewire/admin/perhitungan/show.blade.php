<div class="row layout-spacing mt-2">
    @if ($haveNull)
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Informasi:</strong> Data Penilaian Belum Lengkap
            </div>
        </div>
    @endif

    @if (($wp == null) | !isset($wp['sorted_wisata']))
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Informasi:</strong> Data Perbandignan Krieria Belum Lengkap
            </div>
        </div>
    @endif

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableSimple">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Bobot Kriteria</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @isset($weightBeforeNormalization[0])
                                        @foreach (json_decode($weightBeforeNormalization[0]) as $item)
                                            <td>{{ bcdiv($item, '1', 4) }}</td>
                                        @endforeach
                                    @endisset

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableSimple">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Matrix Keputusan</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriteria as $item)
                                        <th>C{{ $loop->iteration }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($wp['decision_matrix']) }} --}}
                                @foreach ($wisata as $index => $item)
                                    <tr>
                                        <td class="col-4">{{ $item->name }}</td>

                                        @isset($wp['decision_matrix'])
                                            @foreach ($wp['decision_matrix'][$item->id] as $value)
                                                <td>{{ $value }}</td>
                                            @endforeach
                                        @endisset

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableSimple">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Normalisasi Bobot Kriteria</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($kriteria as $index => $item)
                                        @if ($item->type == 'benefit')
                                            <td>{{ bcdiv(isset($wp['wights'][$index]) ? $wp['wights'][$index] : 0, '1', 4) }}
                                            </td>
                                        @else
                                            <td>{{ bcdiv(isset($wp['wights'][$index]) ? -$wp['wights'][$index] : 0, '1', 4) }}
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableSimple">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            {{-- <h4>Normalisasi Min-Max & Vektor S</h4> --}}
                            <h4>Vektor S</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    @foreach ($kriteria as $item)
                                        <th>C{{ $loop->iteration }}</th>
                                    @endforeach
                                    <th>Vektor S</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($wp['decision_matrix']) }} --}}
                                @foreach ($wisata as $index => $item)
                                    <tr>
                                        <td class="col-4">{{ $item->name }}</td>
                                        @isset($wp['wp_details'][$item->id])
                                            @foreach ($wp['wp_details'][$item->id] as $value)
                                                <td>{{ bcdiv($value, '1', 4) }}</td>
                                            @endforeach
                                        @endisset
                                        <td>{{ bcdiv(isset($wp['S'][$item->id]) ? $wp['S'][$item->id] : 0, '1', 4) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-light font-weight-bold">
                                    <td class="text-center" colspan="{{ $kriteria->count() + 1 }}">Total</td>
                                    <td>{{ bcdiv(array_sum(isset($wp['S']) ? $wp['S'] : [0]), '1', 4) }}</td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableSimple">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Nilai Vektor V</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th class="text-center">Perhitungan</th>
                                    <th class="text-center">Vektor V</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wisata as $index => $item)
                                    <tr>
                                        <td class="col-4">{{ $item->name }}</td>
                                        <td class="text-center">
                                            {{ bcdiv(isset($wp['S'][$item->id]) ? $wp['S'][$item->id] : 0, '1', 4) }}
                                            /
                                            {{ bcdiv(array_sum(isset($wp['S']) ? $wp['S'] : [0]), '1', 4) }}
                                        </td>
                                        <td class="text-center">
                                            {{ bcdiv(isset($wp['V'][$item->id]) ? $wp['V'][$item->id] : 0, '1', 4) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@assets
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
@endassets
