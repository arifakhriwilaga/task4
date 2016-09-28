<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Article;
use App\Comment;
use DB,Excel,File,PHPExcel_Writer_;


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
        
        $file = $request->file('import_file');
        
        Excel::selectSheets('Sheet1')->load($file, function($reader) {
            $reader->each(function($sheet){
                Article::firstOrCreate($sheet->toArray());
            });
            
        });

        Excel::selectSheets('Sheet2')->load($file, function($reader) {
            $reader->each(function($sheet){
                Comment::firstOrCreate($sheet->toArray());
            });
            
        });

        return redirect('article-index');


    }
        // alternative import excel

        // if(Input::hasFile('import_file')){
        //     $file = $request->file('import_file');
        //     $file_location = public_path().'/import_file/';
        //     $file->move($file_location.$file.'xls');

        //     $path = Input::file('import_file')->getRealPath() atau getClientOriginalExtension();

        //     $data = Excel::load($path, function($reader) {

        //     })->get();

        //     if(!empty($data) && $data->count()){

        //         foreach ($data as $key => $value) {

        //             $insert[] = ['title' => $value->title, 'description' => $value->description];

        //         }

        //         if(!empty($insert)){

        //             DB::table('articles')->insert($insert);

        //             dd('Insert Record successfully.');

        //         }

        //     }

        // }




    public function import()
    {
        return view('excel.import');
    }

    public function export($id)
    {        
        $comments = Article::find($id)->comments;
        foreach ($comments as $comment) {
                 $data1 [] = array(
                    'id' => $comment->id,
                    'article_id' => $comment->article_id,
                    'content' => $comment->content,
                    'user_id' => $comment->user_id);
        }
    

        $articles = Article::find($id);
                    $data [] = array(
                    'id' => $articles->id,
                    'title_image' => $articles->title_image,
                    'description_image' => $articles->description_image,
                    'user_id' => $articles->user_id);

        Excel::create('Export',function($excel)use($data,$data1){         
            $excel->sheet('Article',function($sheet)use($data){

            $sheet->fromArray($data,null,'A1',false,false)->prependRow(array('Article ID','Title Image','Description Image','User ID'));
            });
            $excel->sheet('Comment',function($sheet)use($data1){
            $sheet->fromArray($data1,null,'A1',false,false)->prependRow(array('Comment ID','Article ID','Content','User ID',));
            });
        })->export('xls');
    }
}

// ->where('comment.article_id', '=', 'articles'.$data->id)