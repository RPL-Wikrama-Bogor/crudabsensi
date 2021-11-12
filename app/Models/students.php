<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class students extends Model
{


	protected $table = 'table siswa';
	protected $filltable = ['nis', 'nama', 'rombel', 'rayon', 'ket'];
}