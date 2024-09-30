<?php

namespace App\Livewire\Admin\Kriteria;

use App\Models\Kriteria;
use App\Models\PerbandinganBerpasangan;
use App\Services\AhpServices;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PerbandiganAhp extends Component
{
    use LivewireAlert;

    public $comparisonMatrix = [];
    public $selectedScale;
    public $AhpResult;

    public function mount()
    {
        $perbandingan = PerbandinganBerpasangan::first();
        // Inisialisasi matriks perbandingan (5x5) dengan nilai default (misal: 1)
        if ($perbandingan) {
            $this->comparisonMatrix = json_decode($perbandingan->matrix);
            $this->AhpResult = $perbandingan;
        } else {
            $this->comparisonMatrix = array_fill(0, 5, array_fill(0, 5, 1));
        }
    }

    public function selectScale($index1, $index2, $value, $side)
    {
        if ($side === 'left') {
            $this->comparisonMatrix[$index1][$index2] = $value; // Nilai dari sisi kiri
            $this->comparisonMatrix[$index2][$index1] = 1 / $value; // Nilai kebalikan di sisi kanan
        } elseif ($side === 'right') {
            $this->comparisonMatrix[$index2][$index1] = $value; // Nilai dari sisi kanan
            $this->comparisonMatrix[$index1][$index2] = 1 / $value; // Nilai kebalikan di sisi kiri
        } else {
            // Untuk nilai sama
            $this->comparisonMatrix[$index1][$index2] = $value;
            $this->comparisonMatrix[$index2][$index1] = $value;
        }
    }

    public function getComparisonMatrixJson()
    {
        // Konversi matriks menjadi JSON
        return json_encode($this->comparisonMatrix);
    }

    public function proccessAHP()
    {
        $comparisonMatrix = $this->comparisonMatrix;

        $AhpResult = AhpServices::ahpCalculation($comparisonMatrix);

        // dd([
        //     'comparisonMatrix' => $AhpResult['comparisonMatrix'],
        //     'normalizedMatrix' => $AhpResult['normalizedMatrix'],
        //     'sumColumn' => $AhpResult['sumColumn'],
        //     'sumRowNormalized' => $AhpResult['sumRowNormalized'],
        //     'weights' => $AhpResult['weights'],
        //     'eigenValues' => $AhpResult['eigenValues'],
        //     'lambdaMax' => $AhpResult['lambdaMax'],
        //     'consistencyIndex' => $AhpResult['consistencyIndex'],
        //     'consistencyRatio' => $AhpResult['consistencyRatio'],
        // ]);

        // Alert based on consistency ratio
        if ($AhpResult['consistencyRatio'] < 0.1) {
            $this->store($AhpResult);
        } else {
            $this->confirm('Consistency Ratio diatas 0.1, apakah tetap lanjutkan?', [
                'position' =>  'center',
                'toast' => false,
                'showConfirmButton' => true,
                'confirmButtonText' => 'Yes',
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancel',
                'inputAttributes' => $AhpResult,
                'onConfirmed' => 'store',
            ]);
        }
    }

    public function store($data)
    {
        PerbandinganBerpasangan::create([
            'title' => 'Perbandingan Kriteria',
            'matrix' => json_encode($data['comparisonMatrix']),
            'matrix_row_sum' => json_encode($data['sumColumn']),
            'matrix_normalized' => json_encode($data['normalizedMatrix']),
            'matrix_normalized_col_sum' => json_encode($data['sumRowNormalized']),
            'wights' => json_encode($data['weights']),
            'eigens' => json_encode($data['eigenValues']),
            'lambda_max' => $data['lambdaMax'],
            'consistency_index' => $data['consistencyIndex'],
            'random_index' => $data['randomIndex'],
            'consistency_ratio' => $data['consistencyRatio'],
            'is_consistent' => $data['consistencyRatio'] < 0.1,
            'consistecy' => $data['consistencyRatio'] < 0.1 ? 'Konsisten' : 'Tidak Konsisten',
        ]);

        foreach ($data['weights'] as $index => $value) {
            $kriteria = Kriteria::find($index + 1);
            $kriteria->update([
                'bobot' => $value
            ]);
        }

        $this->alert('success', 'Konsistency ratio menunjukkan konsisiten!');
        $this->mount();
    }




    public function back()
    {
        $this->redirectRoute('kriteria', navigate: true);
    }

    public function render()
    {
        $kriteria = Kriteria::all();

        return view('livewire.admin.kriteria.perbandigan-ahp', compact('kriteria'));
    }
}
