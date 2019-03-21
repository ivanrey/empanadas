<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empanadas extends Model
{


    /**
     * @var string
     */
    protected $usuarioEnvia;

    /**
     * @var string
     */
    protected $usuarioRecibe;

    /**
     * @var int
     */
    protected $cantidad;


}
