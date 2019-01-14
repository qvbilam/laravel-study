<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    //
    use Searchable;

//    protected $table = 'posts';

    //获取模型索引的名称
    public function searchableAs()
    {
        return 'posts_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        // 自定义数组...
        return $array;
    }

}
