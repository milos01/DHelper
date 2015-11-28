<?php 

namespace App\Http\Controllers; 
use App\Http\Requests\generateGUIDRequest;
use App\Http\Requests\GHTRequest;

class HelperController extends Controller { 
	public function guidGenerator(){ 
		return view('layouts.generateGUID');
	}
	public function gguid(generateGUIDRequest $request){
		$guidss = new \Illuminate\Database\Eloquent\Collection();
		$result = $request->input('guids');
		if(is_numeric($result)){
			for ($i=0; $i < $result; $i++) { 
				$guidss->add($gu = $this->getGUID());
			}
			return view('layouts.generateGUID')->with('result',$result)->with('guidss',$guidss);
		}else{
			return redirect('/generateGUID')->with('fail','Value must be numeric');
		}
	}
	public function getGUID(){
	    if (function_exists('com_create_guid')){
	        return com_create_guid();
	    }else{
	        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	        $charid = strtoupper(md5(uniqid(rand(), true)));
	        $hyphen = chr(45);// "-"
	        $uuid = chr(123)// "{"
	            .substr($charid, 0, 8).$hyphen
	            .substr($charid, 8, 4).$hyphen
	            .substr($charid,12, 4).$hyphen
	            .substr($charid,16, 4).$hyphen
	            .substr($charid,20,12)
	            .chr(125);// "}"
	        return $uuid;
	    }
	}
	public function guidToHex(){
		return view('layouts.hexToGuid');
	}
	public function gth(GHTRequest $request){
		$var = $request->input('guidtohex');
		return view('layouts.hexToGuid')->with('var',$var);
	}
} 
