<?php

namespace App\Charts;

use App\Models\StudentModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StudentfromGenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $mahasiswa = StudentModel::get()->groupBy('sex');
        $value_data = [];
        $i = 0;
        $data = [];
        $label = array_keys($mahasiswa->toArray());
        foreach ($mahasiswa as $item) {
            array_push($value_data, $item);
            array_push($data, count($value_data[$i]));
            $i++;
        }
        return $this->chart->pieChart()
            ->setTitle('Total Student by Gender')
            ->setSubtitle('This shows data for each student based on gender')
            ->setHeight(500)
            ->setWidth(450)
            ->addData($data)
            ->setLabels($label);
    }
}
