<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasApiTokens;

}
