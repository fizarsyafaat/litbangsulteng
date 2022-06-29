<?php

namespace BusinessProcessRoot\Entities\Response\Helper;

use CodeIgniter\Entity;

class ValidateResponse extends Entity
{
	protected $is_error;
	protected $result;
	protected $error_message;
}