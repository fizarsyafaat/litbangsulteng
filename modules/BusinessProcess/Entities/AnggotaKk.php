<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;

class AnggotaKk extends Entity
{
	protected $anggota_kk_id  ;
	protected $kk_id ;
	protected $ktp_id ;
	protected $status_dalam_keluarga ;
	protected $no_passport ;
	protected $no_kitas ;
	protected $ayah ;
	protected $ibu ;
}