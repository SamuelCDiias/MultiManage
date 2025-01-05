<?php

namespace App\Livewire\Charts;

use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;

class Billings extends Component
{
    public function render()
    {
        $pieChart = (new PieChartModel())
            ->setTitle('Faturamento')
            ->addSlice('Tecnologia', 30, '#4CAF50')
            ->addSlice('Saúde', 25, '#FF9800')
            ->addSlice('Educação', 20, '#2196F3')
            ->addSlice('Outro', 15, '#9C27B0');

        return view('livewire.charts.billings', ['pieChart' => $pieChart]);
    }
}
