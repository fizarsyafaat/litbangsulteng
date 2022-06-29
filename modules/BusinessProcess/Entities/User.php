<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
	protected $user_id;
	protected $user_name;
	protected $user_password;
	protected $user_email;
	protected $user_role;
	protected $user_status;
}