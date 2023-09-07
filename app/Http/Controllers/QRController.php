<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class QRController extends Controller
{
    public function Index()
    {
        return view('qr-code');
    }

    public function generateQRCode(Request $request)
    {

        $request->validate([
            'data' => 'required',
        ], [
            'data.required' => 'Zorunlu Alan',
        ]);
        $text = $request->input('data'); // Sayıyı metne çevirin

        // QR kodunu oluşturun ve formatı belirtin (PNG)
        $qrCode = QrCode::size(300)->format('svg')->generate($text);

        // Kaydedilecek dosyanın adını ve yolu oluşturun
        $filename = 'qrcode_' . time() . '.svg';
        $filePath = public_path('qrcodes/' . $filename);

        // QR kodunu dosyaya kaydedin
        file_put_contents($filePath, $qrCode);

        $downloadLink = 'qrcodes/' . $filename;

        return view('qr-code', compact('qrCode', 'downloadLink'));
    }
}
