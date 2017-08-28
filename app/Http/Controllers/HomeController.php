<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

    public function uppercase($string)
    {
    	$upString = strtoupper($string);
		$data['upString']=$upString;
    	return view('uppercase',$data);
    }

	public function lowercase($string){
	    $lowString = strtolower($string);
		$data['lowString']=$lowString;
	    return view('lowercase',$data);
	}

	public function increment($number){
		if($number > 5) {
			return redirect()->action('HomeController@resetToZero');
		} else {
	    	$data['number'] = $number + 1;
	    	return view('increment',$data);
		}
	}

	public function resetToZero(){
		$data['number'] = 0;
		return view('increment')->with($data);
	}
}

