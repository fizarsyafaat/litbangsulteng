<?php

namespace Master\Controllers\FuncCont;

use \Firebase\JWT\JWT;
use App\Controllers\BaseController;
//Contains all view features

class ApiFuncController extends BaseController
{
	public $request;

	public function __construct(){

	}

    public function privateKey()
    {
        $privateKey = <<<EOD
		-----BEGIN RSA PRIVATE KEY-----
		MIIEpAIBAAKCAQEAjztYqeOYLQ15LICkqY/Fm1zuaJjMoApC3h7JP+q/gV/Pz1at
		W+4XZPNfvnvsXsMunsCfeiw7baRoA4iYmzkFFQI7l8hrYtTPIVVpoPaABK1RkEbM
		aane3hl6o77TLQES/ZQjjEWnrKwBlOLA/auGce8DfulZ43hxUef+JbQA969FYgcZ
		6tI4BB4KK7IUxxYJ1H8QGR0lrXogzUXaz/uLbCecfR26dwe1Nn/LUreBpDLcNcfz
		DXtwPd7lQ3kWXK8ZnqebM49mltnTDhiORu6QKkn8s6GqGl/iiP7fuThwKpNz+UPE
		i9mFKq05paYsHUHyQcqbFEOwpftLhx+KxRyZqQIDAQABAoIBAEsYqYcBblMIwmSD
		2lGQsOGhWtp6aqbqWl7NM2UQtnGlg3ZJEsGlVpy2QZfEr4yLt1DC25qZwFrfHS3l
		G2YfAjwenJIbIbqCq0rl1mjvdPV+zcngZOJtjw1RvIxHy77H1mYfmne8OYp98KJY
		NSmLGgV4dJPA00FBb+CqywSHmQ5DCZewUP5WkGylYNsPOjLki6TFxJCWQf87UkeF
		W22yd2Ml6c1/9/s8kHQHE9jeCXBvdOOMkFh690tqFuRNocHqyQBgvZsVLVTw9WiY
		SySRrCcviLHeXEgwNY5nSVElS0lx6ULGT1s02KthYlKIhIF1bWQJY0OfXzxXbSa3
		P1Zc6BECgYEA5+XZBtV/Rr6s6BqJuEFSj+EmIBbPwYHEOClh7wjzWrBe+6fw/JE8
		R0sny9zSROJFpafDUYThhov+iyH15aYRdUEtWLR1p2CRofJQSj5Li6z6V4v2ofGw
		HfALxrsuh/AaaSN5MRwE1CV2jkYJRDoagLXzR0JBZsn4mekyPTWGae0CgYEAnh5Y
		EwTRQbm+INWfI8XLHcucos5noH4DAhd0aaKV++YZZbvaVnp4CldvsNhllsTEFcIq
		t74dTPtz5zMVdjLBlyO/P+1tJH+CR34ZSEgMN8saI07ZTfqnqfcq18i2WUYb1W8E
		fHa0uR/mcHUC6kWHRyhyvvxI4ZgxYZeTipEghy0CgYEA0iTC1+OO9BAEZkzuMm/X
		npS8VOX3HPc4VmCB4/hrdupPGKQmyOngAwdDKAWS8mNOFAEECZJuQNwKLhD3YUVt
		mqEWs8TMvYHQVz5brfvnv8pgDgfC1xxKqcaHFW84im11sYM45tzqL0lHt0QWT6KL
		s8mujQuocrpiMy9UnI0toj0CgYA56AD3Th9Yg66WlcVHM4u0aLn/gbm/tAZkALT4
		brug2d7ZPBe07fsCRo035bgmo/7vvQEp820FoV0MAdBNTj9Jm6TRw6Dh6fSLPCoE
		J6aZ1D7JSXoZrb8zZrqA9heZ0CwnWRX6gvqihYU+EAw2QapOLAkB2qDSRYtoIzu8
		VnPkLQKBgQClG/0VNixTyU9k5osv7H4n4e73lsrWf+BPh/rypDYX9z4nzMu5pWlo
		Zar3/xStK9d6/eApYFh8FvsO37qBnu5LRlu9HiRXrKOKQ2R6TZALlGBl4ZhCpVxH
		xGM0C+9pAzdJPzAC/2SmZQlVLELyfblGA6TE1XAFhGl6JW5HMdo9Ww==
		-----END RSA PRIVATE KEY-----
		EOD;
        return $privateKey;
    }
}
