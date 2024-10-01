<div class="row layout-spacing mt-2">
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

                                    @foreach (json_decode($weightBeforeNormalization[0]) as $item)
                                        <td>{{ number_format($item, 3) }}</td>
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
                                        @foreach ($wp['decision_matrix'][$item->id] as $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
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
                                            <td>{{ number_format($wp['wights'][$index], 3) }}</td>
                                        @else
                                            <td>{{ number_format(-$wp['wights'][$index], 3) }}</td>
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
                                        @foreach ($wp['normalized_matrix'][$item->id] as $value)
                                            <td>{{ number_format($value, 3) }}</td>
                                        @endforeach
                                        <td>{{ number_format($wp['S'][$item->id], 3) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="bg-light font-weight-bold">
                                    <td class="text-center" colspan="{{ $kriteria->count() + 1 }}">Total</td>
                                    <td>{{ number_format(array_sum($wp['S']), 3) }}</td>
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
                                            {{ number_format($wp['S'][$item->id], 3) }} /
                                            {{ number_format(array_sum($wp['S']), 3) }}
                                        </td>
                                        <td class="text-center">{{ number_format($wp['V'][$item->id], 3) }}</td>
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
