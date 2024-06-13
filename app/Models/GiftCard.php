<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class GiftCard extends Model
{
    use HasFactory;
    use Sushi;

    public function getRows()
    {
        return [];


    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
