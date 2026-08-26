<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
    	$document = Document::first();

        return view('document', compact('document'));
    }

    public function documentStore(Request $request)
    {
    	if($request->has('document_id') && $request->input('document_id') != ''){
    		Document::where(['id' => $request->document_id])->update(['document' => $request->document]);
    		$msg = "Document Updated Successfully.";
    	} else {
    		Document::Create(['document' => $request->document]);
    		$msg = "Document Created Successfully.";
    	}

        return back()->with('success', $msg);
    }
}
