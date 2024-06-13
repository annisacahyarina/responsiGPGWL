<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polylines extends Model
{
    use HasFactory;

    protected $table = 'table_polylines';

    protected $guarded = ['id']; //kolom yang tidak boleh diubah

    public function polylines()

    {
        return $this->select(DB::raw('id, name, "Description", st_asgeojson("Geometry") as geom, created_at, updated_at, image'))->get();
    }
}
