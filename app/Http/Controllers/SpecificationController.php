<?php

namespace App\Http\Controllers;

use App\Models\specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function index()
    {

        $specification = specification::select('specifications.*', 'users.name')->join('users', 'users.id', '=', 'specifications.created_by')->orderBy('id', 'desc')->get();

        $data = compact('specification');
        return view('Specifications_list')->with($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            "specificationname" => 'required',
            "partno" => 'required',
            "capacity" => 'required',
            "boosterpump" => 'required',
            "highpressurepump" => 'required',
            "filterhousing" => 'required',
            "frpmultimedia" => 'required',
            "frpmembranehousing" => 'required',
            "membrane" => 'required',
            "waterqualityindicators" => 'required',
            "flowmeters" => 'required',
            "pressuregauges" => 'required',
            "waterlevelindicator" => 'required',
            "lowpressureswitch" => 'required',
            "autoflashsystem" => 'required',
            "roframeparts" => 'required',
            "electricalcontrols" => 'required',
            "cip" => 'required',
            "dimension" => 'required',
            "uvsterilization" => 'required',
            "mineralization" => 'required',
            "assiscalantchemical" => 'required',
            "storagetanks" => 'required',
            "feedwater" => 'required',
            "tds" => 'required',
            "sdi" => 'required',
            "turbiditylevel" => 'required',
            "iron" => 'required',
            "ph" => 'required',
            "oxidizer" => 'required',
            "hardness" => 'required',
        ]);
        try {
            $specification = new specification();
            $specification->specificationname = $request->input('specificationname');
            $specification->partno = $request->input('partno');
            $specification->capacity = $request->input('capacity');
            $specification->boosterpump = $request->input('boosterpump');
            $specification->highpressurepump = $request->input('highpressurepump');
            $specification->filterhousing = $request->input('filterhousing');
            $specification->frpmultimedia = $request->input('frpmultimedia');
            $specification->frpmembranehousing = $request->input('frpmembranehousing');
            $specification->membrane = $request->input('membrane');
            $specification->waterqualityindicators = $request->input('waterqualityindicators');
            $specification->flowmeters = $request->input('flowmeters');
            $specification->pressuregauges = $request->input('pressuregauges');
            $specification->waterlevelindicator = $request->input('waterlevelindicator');
            $specification->lowpressureswitch = $request->input('lowpressureswitch');
            $specification->autoflashsystem = $request->input('autoflashsystem');
            $specification->roframeparts = $request->input('roframeparts');
            $specification->electricalcontrols = $request->input('electricalcontrols');
            $specification->cip = $request->input('cip');
            $specification->dimension = $request->input('dimension');
            $specification->uvsterilization = $request->input('uvsterilization');
            $specification->mineralization = $request->input('mineralization');
            $specification->assiscalantchemical = $request->input('assiscalantchemical');
            $specification->storagetanks = $request->input('storagetanks');
            $specification->feedwater = $request->input('feedwater');
            $specification->tds = $request->input('tds');
            $specification->sdi = $request->input('sdi');
            $specification->turbiditylevel = $request->input('turbiditylevel');
            $specification->iron = $request->input('iron');
            $specification->ph = $request->input('ph');
            $specification->oxidizer = $request->input('oxidizer');
            $specification->hardness = $request->input('hardness');
            $specification->created_by = session('user_id');
            $specification->save();
            return redirect()->route('Specificationlist')->with('success', 'Specification has been added');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occur');
        }

    }
    public function edit($id)
    {
        try {
            $specification = specification::find($id);
            $data = compact('specification');
            return view('Specification_view')->with($data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occur');
        }

    }

    public function edit2($id)
    {
        try {
            $specification = specification::find($id);
            $data = compact('specification');
            return view('specification_edit')->with($data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occur');
        }

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "specificationname" => 'required',
            "partno" => 'required',
            "capacity" => 'required',
            "boosterpump" => 'required',
            "highpressurepump" => 'required',
            "filterhousing" => 'required',
            "frpmultimedia" => 'required',
            "frpmembranehousing" => 'required',
            "membrane" => 'required',
            "waterqualityindicators" => 'required',
            "flowmeters" => 'required',
            "pressuregauges" => 'required',
            "waterlevelindicator" => 'required',
            "lowpressureswitch" => 'required',
            "autoflashsystem" => 'required',
            "roframeparts" => 'required',
            "electricalcontrols" => 'required',
            "cip" => 'required',
            "dimension" => 'required',
            "uvsterilization" => 'required',
            "mineralization" => 'required',
            "assiscalantchemical" => 'required',
            "storagetanks" => 'required',
            "feedwater" => 'required',
            "tds" => 'required',
            "sdi" => 'required',
            "turbiditylevel" => 'required',
            "iron" => 'required',
            "ph" => 'required',
            "oxidizer" => 'required',
            "hardness" => 'required',
        ]);

        try {
            $specification = specification::find($id);
            $specification->specificationname = $request->input('specificationname');
            $specification->partno = $request->input('partno');
            $specification->capacity = $request->input('capacity');
            $specification->boosterpump = $request->input('boosterpump');
            $specification->highpressurepump = $request->input('highpressurepump');
            $specification->filterhousing = $request->input('filterhousing');
            $specification->frpmultimedia = $request->input('frpmultimedia');
            $specification->frpmembranehousing = $request->input('frpmembranehousing');
            $specification->membrane = $request->input('membrane');
            $specification->waterqualityindicators = $request->input('waterqualityindicators');
            $specification->flowmeters = $request->input('flowmeters');
            $specification->pressuregauges = $request->input('pressuregauges');
            $specification->waterlevelindicator = $request->input('waterlevelindicator');
            $specification->lowpressureswitch = $request->input('lowpressureswitch');
            $specification->autoflashsystem = $request->input('autoflashsystem');
            $specification->roframeparts = $request->input('roframeparts');
            $specification->electricalcontrols = $request->input('electricalcontrols');
            $specification->cip = $request->input('cip');
            $specification->dimension = $request->input('dimension');
            $specification->uvsterilization = $request->input('uvsterilization');
            $specification->mineralization = $request->input('mineralization');
            $specification->assiscalantchemical = $request->input('assiscalantchemical');
            $specification->storagetanks = $request->input('storagetanks');
            $specification->feedwater = $request->input('feedwater');
            $specification->tds = $request->input('tds');
            $specification->sdi = $request->input('sdi');
            $specification->turbiditylevel = $request->input('turbiditylevel');
            $specification->iron = $request->input('iron');
            $specification->ph = $request->input('ph');
            $specification->oxidizer = $request->input('oxidizer');
            $specification->hardness = $request->input('hardness');
            $specification->created_by = session('user_id');
            $specification->update();
            return redirect()->back()->with('success', 'Successfully Updated');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error is occured');
        }
    }
    public function destroy($id)
    {

        try {
            $specification = specification::find($id)->delete();
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }
    }
}
