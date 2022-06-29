<?php

namespace Master\Controllers\FuncCont;

use \Firebase\JWT\JWT;
use App\Controllers\BaseController;
//Contains all view features

class ApiMobileTeacherFuncController extends BaseController
{
	public $request;

	public function __construct(){

	}

    public function privateKey()
    {
        $privateKey = <<<EOD
		-----BEGIN RSA PRIVATE KEY-----
		MIIEpAIBAAKCAQEAk3pMuOg9gd9AJmydIjbCe2x9+FPyzbMmfkSATgSRU9oYV7qO
		IhNPgAE9kYy9BVxv8SuhrpxChMMdlRDAXjUid3V2Tq2M5Qw9eGnvtkhZso2sNy7I
		xSjlFp/SDsiSo49X4HVVwQC20PglOZIJAKv5AwH3GI8RmTpMkc+5sbcIiqruvnoR
		38uy5zNx15V2NVT9WoLN2Ugxxufysev6PVsYWeXRyHB/ScGPKjm0NX79JILXyZJs
		g3W/dKyUze8sPgRsxs2efauOWNkR5JZx8oP367gZzjVqijI8Rd5D7yKH1Ijm+COr
		x6XnM55MZ53/KKlp59288f3cZpT2SguPaOYEbQIDAQABAoIBABclhNEosi6mCX1+
		YpMyIQgaGRNWqa8bRRlgSvrzwJN2kYeDYjd67GlcyHsFqc0jmvYxMOkk4VPRA92X
		iXm/wS8aonzqxEhWyXcSuWrUpC9gCP2IPD6lkn8gimmDlXBSWSqDf/gQ0qCtsbn9
		b6hJVYXhUxTpr4trGQVxouV/ormQqGjC2vl6UypcSf7f3tb3SXL874Uug4gYWWzg
		w9IGwhMZcd7eaJaJ8CpkG5zJ5v0Gd5aYSVO2jv9DhWa4681g3an+4KZmtJ0RmvJF
		NzL5gBU/Nd+2YLOTwheqFzfm2qWzTU8Go6cvrpI7bYNoodUCOBfgBUk+JJ8ZCD2p
		avEwigECgYEA6eC5vsNP7tDrXA34dcHkOzkQkZuUjvD0SJcRVJYMPTFowpfGG4ve
		hJPRg1pWJvCwKJVL/R1b0ERPN74GT8uhT1KXoD5LbRhneH/I2jrGdk3K+aBNOCi5
		dH1SESBA3L7zOumTe8cZrNAll6h1VYgLwWlvizNo6Wp2DIzqDijo9y0CgYEAoW1s
		m3pUU7mDD6+VZKFIB+kKPWIJocZ5bPLtvmwoxk4uY3QnyjUwE+M0hdoTlncvGphg
		6wsc5zqnz/1igGce/rhw3NDWkoxlpwkcZuHiKkpeicgoZeaDPd4L5xkyJJ/dX/DM
		WatY3WiMeT47/qeIk0lqbqOqwS11MSaQ1vMlikECgYAVB60MFznnyodvVp5B0HZ6
		UM5JmYjJNadxo4veZEOjeP7niIg6z9/pYfVT71qR09CzRYF4uBwaZRoOdBrTMAdI
		P6/8q71SiQA82Jix7tkLqEEZIy3uX9MVQ3OOsKzEbLMoV/p4BdYsMOdAdNhgIYSV
		Fqr+BFhprLYCuOUO8uTH3QKBgQCHl2oKjo4WZVR48HsDs5TVUCGRva9pe1Sy9rpL
		oH3/U9wTHZXuew6PJeEQLUUWtbWTGTsPMp5sexBJ3API5tVaD4J9d81D+znHPBfn
		MwTNkPonsUB9l0nVxZUp4DgGG2HPHGwJRau3DgIwNN4f4IkPbjNAC6l56bzuM/6l
		DkcSAQKBgQC+Uzo3xSHjZc27dfsOV/1/Kx4aPrj2ryVCoaZQ1Dz95Gom56O7Wznl
		sTIEcVpAel/Q4DNJ22mWne7NWba/BSRf77aMBfma/9miYHFYjijiT17Nk7pv7zUP
		He+UXsk6YqYulUTM0urcYKyWyUCPU4Ydk5sPWEWOIZISUFm5t5v/0A==
		-----END RSA PRIVATE KEY-----
		EOD;
        return $privateKey;
    }
}