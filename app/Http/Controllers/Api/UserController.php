<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    //
    public function register(Request $request)
    {
        $date = date('Y-m-d', time());

//        Log::useDailyFiles(storage_path("logs/register/error-$date"))->info('访问请求:' . json_encode($request));
        return 123123;
    }

    public function login()
    {

    }

    public function position()
    {
        $position_array = [
            0 => [0, 0, 0, 0, 0, 0],
            1 => [1, 1, 1, 1, 1, 1],
            2 => [2, 2, 2, 2, 2, 2],
            3 => [3, 3, 3, 3, 3, 3],
        ];
        $this->getPosition($position_array);
    }

    public function getPosition($position_array)
    {
        $position = [];
        while ($position_array) {
            //移除最后一个数组,并且处置给新的数组
            $position = array_pop($position_array);
            //获取移除后数组后的所有键值
            $keys = array_keys($position_array);
            //获取键的数量
            $count_keys = count($keys);
            //如果移除完数组后。传入的数组没有了键;且为空
            if($count_keys == 0){
                //打印新的数组
                dd($position);
            }
            //移除上一个键
            $pre_key = array_pop($keys);
            //获取上一个数组的数量
            $pre_arr_count = count($position_array[$pre_key]);
            //获取这次处理数组的数量(第二个循环）
            $tis_arr_count = count($position);
            //倒数第二个数组循环
            for ($i = 0; $i < $pre_arr_count; $i++) {
                //移除倒数第二个数组的第一个值;
                $first_array = array_shift($position_array[$pre_key]);
                //循环倒数第一个数组
                for ($j = 0; $j < $tis_arr_count; $j++) {
                    //新的值 = 倒数第二个数组移除的值 拼接 倒数第一个数组循环的值
                    $new_array = $first_array . $position[$j];
                    //把新生成的值加到倒数第二个数组的值中
                    array_push($position_array[$pre_key], $new_array);
                }
            }
            $this->getPosition($position_array);
        }
    }

    public function methodA()
    {
//        循环套循环
        $position_array_a = [0, 1, 2, 3, 4, 5];
        $position_array_b = [0, 1, 2, 3, 4, 5];
        $position_array_c = [0, 1, 2, 3, 4, 5];
        $position_array_d = [0, 1, 2, 3, 4, 5];
        $position = [];
        $count_a = count($position_array_a);
        $count_b = count($position_array_b);
        $count_c = count($position_array_c);
        $count_d = count($position_array_d);
        for ($a = 0; $a < $count_a; $a++) {

            for ($b = 0; $b < $count_b; $b++) {

                for ($c = 0; $c < $count_c; $c++) {

                    for ($d = 0; $d < $count_d; $d++) {
                        $position_d = $position_array_a[$a]
                            . ',' . $position_array_b[$b]
                            . ',' . $position_array_c[$c]
                            . ',' . $position_array_d[$d];
                        array_push($position, $position_d);

                    }
                }
            }
        }
        dd($position);
    }

}
