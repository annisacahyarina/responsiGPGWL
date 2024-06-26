<?php

namespace App\Models;

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygons extends Model
{
    use HasFactory;

    protected $table = 'table_polygons';

    protected $guarded = ['id']; //kolom yang tidak boleh diubah

    public function polygons()

    {
        return $this->select(DB::raw('id, name, "Description", st_asgeojson("Geometry") as geom, created_at, updated_at, image'))->get();
    }

    public function polygon($id)

    {
        return $this->select(DB::raw('id, name, "Description", st_asgeojson("Geometry") as geom, created_at, updated_at, image'))->where('id', $id)->get();
    }
}
