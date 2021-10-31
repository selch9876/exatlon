<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ContestantsExport;
use App\Imports\ContestantsImport;
use App\Contestant;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contestants = DB::table('contestants')
        ->orderbydesc('country')
        ->orderbydesc('percentage')
        ->paginate(10);
        
        return view('contestants', ['contestants' => $contestants]);
    }

    public function filter(Request $request){

        

        $country = $request->input('country');
        $season = $request->input('season');
        
        $contestants = DB::table('contestants')

        ->where('country', '=', $country)
        ->where('season', '=', $season)
        ->orderbydesc('percentage')
        ->paginate(10);

        return view('contestants', ['contestants' => $contestants]);
     
    
    } 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required',
            'country'=>'required',
            'win'=>'required',
            'played'=>'required',
        ]);
        $contestant = new Contestant;
        $contestant->name = $request->input('name');
        $contestant->country = $request->input('country');
        $contestant->played = $request->input('played');
        $contestant->win = $request->input('win');
        $contestant->season = $request->input('season');
        $contestant->save();

        return redirect()->back()->with('message', 'Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contestant = Contestant::find($id);
        return view('showcontestant')->with('contestant', $contestant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contestant = Contestant::find($id);
        return view('edit')->with('contestant', $contestant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            
            
        ]);
        $contestant = Contestant::find($id);
        $contestant->name = $request->input('name');
        $contestant->oneononewin = $request->input('oneononewin');
        $contestant->oneononelost = $request->input('oneononelost');
        $contestant->group1win = $request->input('group1win');
        $contestant->group1lost = $request->input('group1lost');
        $contestant->group05win = $request->input('group05win');
        $contestant->group05lost = $request->input('group05lost');
        $contestant->personalwin = $request->input('personalwin');
        $contestant->personallost = $request->input('personallost');
        $contestant->symbolwin = $request->input('symbolwin');
        $contestant->symbollost = $request->input('symbollost');
        $contestant->nationalwin = $request->input('nationalwin');
        $contestant->nationallost = $request->input('nationallost');

        

        $contestant->save();

        $wintotal = DB::table('contestants')->where('id', $id)
        ->value(DB::raw("SUM(oneononewin + group1win + group05win + personalwin + symbolwin + nationalwin)"));

        $losttotal = DB::table('contestants')->where('id', $id)
        ->value(DB::raw("SUM(oneononelost + group1lost + group05lost + personallost + symbollost + nationallost)"));

        $played = DB::table('contestants')->where('id', $id)
        ->value(DB::raw("SUM(oneononewin + group1win + group05win + personalwin + symbolwin + nationalwin + oneononelost + group1lost + group05lost + personallost + symbollost + nationallost)"));

        $contestant->win = $wintotal;
        $contestant->lost = $losttotal;
        $contestant->played = $played;

        $contestant->save();
            
        return redirect()->back()->with('message', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ContestantsExport, 'contestants.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {

        if (!empty(request()->file('file'))) { 
            $contestants = Excel::toCollection(new ContestantsImport, request()->file('file'));
            foreach ($contestants[0] as $contestant){

                
                Contestant::where('id', $contestant[0])->update([

                    'name'          => $contestant[1],
                    'oneononewin'   => $contestant[2], 
                    'oneononelost'  => $contestant[3],
                    'group1win'     => $contestant[4],
                    'group1lost'    => $contestant[5],
                    'group05win'    => $contestant[6],
                    'group05lost'   => $contestant[7],
                    'personalwin'   => $contestant[8],
                    'personallost'  => $contestant[9],
                    'symbolwin'     => $contestant[10],
                    'symbollost'    => $contestant[11],
                    'nationalwin'   => $contestant[12],
                    'nationallost'  => $contestant[13],
                    'played'        => $contestant[14],
                    'win'           => $contestant[15],
                    'lost'          => $contestant[16],
                    'percentage'    => $contestant[17],
                    'country'       => $contestant[18],
                    'season'        => $contestant[19],
                ]);
            }
            return redirect()->back()->with('message', 'Imported successfully.');
        } else {
            return redirect()->back()->with('message', 'No File!');
        }
    }
     
}
