<?php

namespace App\Charts;

use App\Models\StudentModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StudentfromCity
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $mahasiswa = StudentModel::get();
        $city = $mahasiswa->load('city')->groupBy('city.name');
        $array = [];
        $i = 0;
        $data = [];
        $value_label = array_keys($city->toArray());
        $label = $value_label;
        foreach ($city as $item) {
            array_push($array, $item);
            array_push($data, count($array[$i]));
            $i++;
        }

        return $this->chart->donutChart()
            ->setTitle('Total Studeny by City')
            ->setSubtitle('This shows data for each student based on city')
            ->setWidth(450)
            ->setHeight(500)
            ->addData($data)
            ->setLabels($label);
    }
}
