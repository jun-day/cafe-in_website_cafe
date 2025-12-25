<?php

namespace App\Http\Controllers;

use App\Exports\HistoryExport;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    public function exportHistory()
    {
        return Excel::download(
            new HistoryExport,
            'history_pemesanan_' . now()->format('Ymd_His') . '.xlsx'
        );
    }
}
