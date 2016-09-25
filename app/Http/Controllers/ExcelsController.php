<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Article;
use App\Comment;
use DB,Excel,File;


class ExcelsController extends Controller
{
	public function import_store1($path, $filename)
    {
    }
    // $csv = $path . $filename; 

    // //ofcourse you have to modify that with proper table and field names
    // $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE your_table FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`filed_one`, `field_two`, `field_three`)", addslashes($csv));

    // return DB::connection()->getpdo()->exec($query);
    public function import_store(Request $request)

    {

        if(Input::hasFile('import_file')){
            $file = $request->file('import_file');
            $file_location = public_path().'/import_file/';
            $file->move($file_location.$file.'xls');

            // $path = Input::file('import_file')->getRealPath();

            // $data = Excel::load($path, function($reader) {

            // })->get();

            // if(!empty($data) && $data->count()){

            //     foreach ($data as $key => $value) {

            //         $insert[] = ['title' => $value->title, 'description' => $value->description];

            //     }

            //     if(!empty($insert)){

            //         DB::table('items')->insert($insert);

            //         dd('Insert Record successfully.');

            //     }

            // }

        }

        return back();

    }



    public function import()
    {
        return view('excel.import');
    }

    public function export($type)
    {
        
        $articles = Article::all();
        $comments = Comment::all();
        foreach ($articles as $article) {
            foreach ($comments as $comment) {
                    $data [] = array(
                    'id' =>$article->id,
                    'title_image' => $article->title_image,
                    'description_image' => $article->description_image,
                    'content' => $comment->content,
                    'user_id' => $comment->user_id);
                 
            }
        }
        Excel::create('Export',function($excel)use($data){         
            $excel->sheet('Sheet1',function($sheet)use($data){
            $sheet->setStyle(array(
                'font' => array(
                    'align' => 'center'
                )
            ));
            $sheet->fromArray($data,null,'A1',false,false)->prependRow(array('Article ID','Title Image','Description Image','Comment Content','User Comment'));
            });
        })->download($type);
    }
}