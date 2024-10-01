<div class="row layout-spacing mt-2">

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div id="tableSimple">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Hasil Akhir</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th class="text-center">Niai (V)</th>
                                    <th class="text-center">Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($wp) }} --}}
                                @foreach ($wp['sorted_wisata'] as $index => $item)
                                    <tr>
                                        <td class="col-4">{{ $item->name }}</td>
                                        <td class="text-center">{{ number_format($wp['V'][$item->id], 3) }}</td>
                                        <td class="text-center">{{ $index + 1 }}</td>
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
