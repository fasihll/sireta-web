<?php

namespace App\Livewire\Admin\Kriteria;

use App\Models\Kriteria;
use App\Services\AhpServices;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PerbandiganAhp extends Component
{
    use LivewireAlert;

    public $comparisonMatrix = [];
    public $selectedScale;

    public function mount()
    {
        // Inisialisasi matriks perbandingan (5x5) dengan nilai default (misal: 1)
        $this->comparisonMatrix = array_fill(0, 5, array_fill(0, 5, 1));
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

        dd([
            'comparisonMatrix' => $AhpResult['comparisonMatrix'],
            'normalizedMatrix' => $AhpResult['normalizedMatrix'],
            'sumColumn' => $AhpResult['sumColumn'],
            'weights' => $AhpResult['weights'],
            'eigenValues' => $AhpResult['eigenValues'],
            'lambdaMax' => $AhpResult['lambdaMax'],
            'consistencyIndex' => $AhpResult['consistencyIndex'],
            'consistencyRatio' => $AhpResult['consistencyRatio'],
        ]);

        // Alert based on consistency ratio
        if ($AhpResult['consistencyRatio'] < 0.1) {
            $this->alert('success', 'Perhitungan AHP berhasil dilakukan.');
        } else {
            $this->alert('error', 'Perhitungan AHP gagal dilakukan. Silahkan cek kembali perbandingan kriteria.');
        }
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
