<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    public function comments()
    {
        return $this->hasMany('App\ThreadComment');
    }

    public static function selectThreadsSortedByCreatedTimeAsc() {
        $sql = file_get_contents(resource_path('sql/select_threads_sorted_by_created_time_asc.sql'));
        $records = DB::select($sql);
        $collection = collect($records);
        return $collection;
    }

    public static function selectThreadsSortedByCreatedTimeDesc() {
        $sql = file_get_contents(resource_path('sql/select_threads_sorted_by_created_time_desc.sql'));
        $records = DB::select($sql);
        $collection = collect($records);
        return $collection;
    }

    public static function selectThreadsSortedByModifiedTime() {
        $sql = file_get_contents(resource_path('sql/select_threads_sorted_by_modified_time.sql'));
        $records = DB::select($sql);
        $collection = collect($records);
        return $collection;
    }
}
