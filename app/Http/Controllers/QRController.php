<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function Index()
    {
        return view('qr-code');
    }

    public function generateQRCode(Request $request)
    {
        $text = $request->input('data'); // Sayıyı metne çevirin

        $qrCode = QrCode::size(300)->generate($text);
        return view('qr-code', compact('qrCode'));
    }
}
