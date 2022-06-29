<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;

class Log extends Entity
{
	protected $id_log;
	protected $description;
	protected $date_log;
	protected $logger;
}