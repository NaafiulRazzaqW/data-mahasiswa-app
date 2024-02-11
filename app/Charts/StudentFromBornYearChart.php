<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\StudentModel;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StudentFromBornYearChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $mahasiswa = StudentModel::select('*')->orderBy('date_of_birth')->get()->groupBy(function ($val) {
            return Carbon::parse($val->date_of_birth)->format('Y');
        });
        $array = [];
        $data = [];
        $i = 0;
        $label = array_keys($mahasiswa->toArray());
        foreach ($mahasiswa as $item) {
            array_push($array, $item);
            array_push($data, count($array[$i]));
            $i++;
        }

        return $this->chart->barChart()
            ->setTitle('Total Student by Year of Birth')
            ->setSubtitle('This is the total number of students based on year of birth')
            ->addData('Student', $data)
            ->setHeight(500)
            ->setWidth(500)
            ->setXAxis($label);
    }
}
