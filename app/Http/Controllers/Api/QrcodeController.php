<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    //
    public function jumpHtml()
    {
        //QrCode::email('534511019@qq.com', 'This is the subject.', 'This is the message body.');
        //QrCode::format('png')->generate('Hello,LaravelAcademy!',public_path('qrcodes/qrcode.png'));
//        $code = QrCode::format('png')->merge('https://i0.hdslb.com/bfs/article/075b814b5d88f7669e8718cca0f7150dabf0a273.jpg', .3, true)->generate('hello',public_path('qrcodes/qrcode.png'));
        QrCode::png();
    }
}
