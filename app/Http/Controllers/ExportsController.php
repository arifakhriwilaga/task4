<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Excel;
use DB;
use App\Article;
use App\Comment;
use App\User;


class ExportsController extends Controller
{
    public function getExport(){
	    Excel::create('image_data', function($excel) {

		    $excel->sheet('Excel sheet', function($sheet) {

			    $sheet->setOrientation('landscape');

		    });

		})->export('xls');
    }
}
