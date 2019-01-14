<?php

namespace App\Http\Controllers\Api;

use App\Model\MacPool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use App\Model\HighSpeedMacPool;
use App\Model\MacPooll;
use Illuminate\Http\Response;

class ExcelController extends Controller
{
    //
    public function export()
    {
        $data = [
            ['studendCard', 'studentName', 'Age'],
            ['150002020335', '郭毅', '16'],
            ['150002020335', '阿萨德', '90'],
            ['150002020335', '阿萨德', '20'],
        ];
        //cnm create别写中文!
        Excel::create('student', function ($excel) use ($data) {
            $excel->sheet('score', function ($sheet) use ($data) {
                $sheet->rows($data);
            });
        })->export('xls');

    }

    public function import(Request $request)
    {
//        dd(123);
//        return 123;
        //获取上传的文件
        $file = $request->file('xls');
        //获取上传文件的文件名（带后缀，如abc.png）
        $filename = $file->getClientOriginalName();
        //移动上传的文件
        $path = $file->move('./', $filename);
        Excel::load($path, function ($reader) use (&$res) {
            $reader = $reader->getSheet(0);//excel第一张sheet
            $results = $reader->toArray();
//            unset($results[0]);//去除表头'
//            dump((int)$results[0]['sn']);
            dd($results);
            $i = 0;
            foreach ($results as $v){
                $results[$i]['sn'] = (int)$v['sn'];
                $results[$i]['car_riage'] = (int)$v['car_riage'];
                $results[$i]['mac_id'] = MacPool::where('sn',(int)$v['sn'])->value('mac_id');
                HighSpeedMacPool::create($results[$i]);
                $i++;
            }

        });
    }
}
