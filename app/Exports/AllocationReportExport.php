<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class AllocationReportExport implements FromView
{
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function view(): View
    {
        return $this->view;
    }
}
