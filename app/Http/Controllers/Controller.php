<?php

namespace App\Http\Controllers;

use phpseclib3\Crypt\RSA;
use Illuminate\Http\Request;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $private = '-----BEGIN RSA PRIVATE KEY-----
MIIBOgIBAAJBAKj34GkxFhD90vcNLYLInFEX6Ppy1tPf9Cnzj4p4WGeKLs1Pt8Qu
KUpRKfFLfRYC9AIKjbJTWit+CqvjWYzvQwECAwEAAQJAIJLixBy2qpFoS4DSmoEm
o3qGy0t6z09AIJtH+5OeRV1be+N4cDYJKffGzDa88vQENZiRm0GRq6a+HPGQMd2k
TQIhAKMSvzIBnni7ot/OSie2TmJLY4SwTQAevXysE2RbFDYdAiEBCUEaRQnMnbp7
9mxDXDf6AU0cN/RPBjb9qSHDcWZHGzUCIG2Es59z8ugGrDY+pxLQnwfotadxd+Uy
v/Ow5T0q5gIJAiEAyS4RaI9YG8EWx/2w0T67ZUVAw8eOMB6BIUg0Xcu+3okCIBOs
/5OiPgoTdSy7bcF9IGpSE8ZgGKzgYQVZeN97YE00
-----END RSA PRIVATE KEY-----';

$ciphertext = 'TB7QznJK7GO85hPCtyiIsa4hJxf54XmSodcxnBN+jKEIrRLbjRTwGrIaJdNhho/t9YoKyNWdcJXOd3XwRD+TUw==';

$private = openssl_get_privatekey($private);

openssl_private_decrypt(base64_decode($ciphertext), $plaintext, $private, OPENSSL_PKCS1_PADDING);

 echo $plaintext;
//         $ok='TB7QznJK7GO85hPCtyiIsa4hJxf54XmSodcxnBN+jKEIrRLbjRTwGrIaJdNhho/t9YoKyNWdcJXOd3XwRD+TUw==';
//         $key = PublicKeyLoader::load('-----BEGIN RSA PUBLIC KEY-----
//         MEgCQQCo9+BpMRYQ/dL3DS2CyJxRF+j6ctbT3/Qp84+KeFhnii7NT7fELilKUSnx
//         S30WAvQCCo2yU1orfgqr41mM70MBAgMBAAE=
//         -----END RSA PUBLIC KEY-----');
//         $key = $key->withHash("md5");
//         echo base64_decode($key->encrypt($ok));
        // $plaintext='Remove declaration from file composer.json (in the "require" section)';
        // $private = RSA::createKey();
        // $ciphertext = $private->getPublicKey()->encrypt($plaintext);
        // echo  $private->decrypt($ciphertext);
    }
    public function store(Request $request)
    {

    }
}
