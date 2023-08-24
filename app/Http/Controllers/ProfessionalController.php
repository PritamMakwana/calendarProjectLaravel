<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessionalFromRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PDF;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportProfessional;


class ProfessionalController extends Controller
{
    public function index()
    {
        $professional = Professional::orderBy('id', 'desc')->get();

        // dd($professional->skill);
        return view('professional',compact('professional'));
    }

    public function professionalAdd()
    {
        return view('professional-add');
    }

    public function professionalAddData(ProfessionalFromRequest $request)
    {

        $validateData = $request->validated();

        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/imageShow', $filename);
            //  php artisan storage:link
        }

        $Professional = new Professional;

        $Professional->create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'mobile' => $validateData['mobile'],
            'password' => $validateData['password'],
            'address' => $validateData['address'],
            'skill' => $validateData['skill'],
            'image' => $filename,
            'status' => 0,
            'regi_time' => Carbon::now(),
        ]);


        return redirect('professional')->with('message', 'Added Successfully');;

    }

    public function destroy($Id){
        $Professional = Professional::findOrFail($Id);

        if (Storage::exists('public/imageShow/'.$Professional->image)) {
            Storage::delete('public/imageShow/'.$Professional->image);
        }

        $Professional->delete();
        return redirect('professional')->with('message','Deleted Successfully');
    }


    public function changeStatus($Id){

        $Professional = Professional::where('id', $Id)->first();
        $Professional->status = !$Professional->status;
        $Professional->save();
        return redirect()->back();
    }



    public function getPdf($Id){
        // composer require intervention/image

        $data = Professional::find($Id);

        $imagePath = "public/imageShow/{$data->image}";
        // dd($imagePath, Storage::exists($imagePath));


        $image = Image::make(Storage::path($imagePath));
        // $imageDataUrl = getImageDataUrl($imagePath);

        $pdf = PDF::loadView('pdfLoad', compact('data','image'));
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }


    public function exportProfessional(Request $request){
        return Excel::download(new ExportProfessional, 'Professional.xlsx');
    }



}
