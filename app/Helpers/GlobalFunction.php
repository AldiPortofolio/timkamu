<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Intervention;

class GlobalFunction
{
    //Upload Image
    public static function UploadImage($imageFile, $name, $imagePath)
    {
        $imageName = time() . '_' . $name;
        $allowedFileExtension = ['jpg', 'jpeg', 'png'];
        $extension = $imageFile->getClientOriginalExtension();
        $isAllowed = in_array($extension, $allowedFileExtension);

        if (!$isAllowed) {
            throw new \Exception('File yang dimasukkan hanya boleh jpg atau png.');
        }

        $urlFile = $imagePath . $imageName . '.' . $extension;
        $imageFile->move($imagePath, $imageName . '.' . $extension);

        return $urlFile;
    }

    public static function DeleteFile($fileName)
    {
        Storage::disk('img')->delete($fileName);
    }

    //Upload File
    public static function UploadFile($file, $name, $filePath)
    {
        $fileName = $name;
        $allowedFileExtension = ['pdf', 'docx'];
        $extension = $file->getClientOriginalExtension();
        $isAllowed = in_array($extension, $allowedFileExtension);

        if (!$isAllowed) {
            throw new \Exception('File yang dimasukkan hanya boleh pdf dan docx.');
        }

        $path = $filePath . $fileName . '.' . $extension;
        Storage::disk('img')->put($path, file_get_contents($file));

        return $path;
    }

    public static function sendOTP($phone, $message)
    {
        $req = [
            'apikey'        => ENV('RAJA_SMS_API_KEY'),
            'senderid'      => '1',
            'callbackurl'   => '',
            'datapacket'    => [
                [
                    'number'  => '62' . $phone,
                    'message' => $message
                ]
            ]
        ];

        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'POST',
            ENV('RAJA_SMS_URL'),
            [
                'headers' => [
                    'Content-Type'  => 'application/json'
                ],
                'body'    => json_encode($req)
            ]
        );

        $body = json_decode($res->getBody()->getContents());

        return $body;
    }

    public static function normalizePhoneNumber($phone)
    {
        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 2) == '62') {
            $phone = substr($phone, 2);
        }

        return $phone;
    }

    public static function generateRandomString($length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function str_ordinal($value, $superscript = false)
    {
        $number = abs($value);

        $indicators = ['th','st','nd','rd','th','th','th','th','th','th'];

        $suffix = $superscript ? '<sup>' . $indicators[$number % 10] . '</sup>' : $indicators[$number % 10];
        if ($number % 100 >= 11 && $number % 100 <= 13) {
            $suffix = $superscript ? '<sup>th</sup>' : 'th';
        }

        return number_format($number) . $suffix;
    }

    public static function shortNumber($num)
    {
        $units = ['', 'K', 'M', 'B', 'T'];
        for ($i = 0; $num >= 1000; $i++) {
            $num /= 1000;
        }
        return round($num, 1) . $units[$i];
    }
}
