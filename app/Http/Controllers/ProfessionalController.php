<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;
use App\Http\Requests\ProfessionalFromRequest;
use Carbon\Carbon;

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


        return redirect('professional');

    }
}
