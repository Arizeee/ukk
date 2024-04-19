<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = Peminjaman::get();

        $data = [
            'title' => 'Laporan Peminjaman',
            'date' => date('m/d/Y'),
            'users' => $users, 
            'users' => $users, 
        ];

        $pdf = PDF::loadView('pdf.usersPdf', $data);
        return $pdf->download('users-lists.pdf');
    }
}