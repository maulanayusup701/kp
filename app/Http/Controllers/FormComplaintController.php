<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class FormComplaintController extends Controller
{
    public function formComplaint()
    {
        return view('society/form-complaint', [
            'title' => 'Form Complaint'
        ]);
    }

    public function formComplaintStore(Request $request)
    {
        $data = $request->validate([
            'type_of_complaint_id' => ['required'],
            'fill_in_the_complaint' => ['required'],
        ]);

        $data['user_id'] = auth()->user()->id;

        Complaint::create($data);

        return back()->with('success', 'Complaint successfully sent!');
    }
}
