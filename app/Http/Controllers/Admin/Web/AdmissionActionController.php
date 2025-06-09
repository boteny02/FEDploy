<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Models\Web\AdmissionAction;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use App\Models\Language;
use Toastr;

class AdmissionActionController extends Controller
{
    use FileUploader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Module Data
        $this->title    = trans_choice('module_admission_action', 1);
        $this->route    = 'admin.admission-action';
        $this->view     = 'admin.web.admission-action';
        $this->path     = 'admission-action';
        $this->access   = 'admission-action';


        $this->middleware('permission:'.$this->access.'-view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title']  = $this->title;
        $data['route']  = $this->route;
        $data['view']   = $this->view;
        $data['path']   = $this->path;
        $data['access'] = $this->access;

        $data['row'] = AdmissionAction::where('language_id', Language::version()->id)->first();

        return view($this->view.'.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'button_link' => 'nullable|url',
            'image' => 'nullable|image',
            'bg_image' => 'nullable|image',
        ]);

        // Get ID from request to determine if this is a new record (-1) or update
        $id = $request->id;


        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $admissionAction = new AdmissionAction;
            $admissionAction->language_id = Language::version()->id;
            $admissionAction->title = $request->title;
            $admissionAction->sub_title = $request->sub_title;
            $admissionAction->button_text = $request->button_text;
            $admissionAction->button_link = $request->button_link;
            $admissionAction->video_id = $request->video_id;
            $admissionAction->image = $this->uploadImage($request, 'image', $this->path, 500, 280);
            $admissionAction->bg_image = $this->uploadImage($request, 'bg_image', $this->path, 500, 280);
            $admissionAction->status = $request->status;
            $admissionAction->save();
        }
        else{
            // Update Data
            $admissionAction = AdmissionAction::find($id);
            $admissionAction->title = $request->title;
            $admissionAction->sub_title = $request->sub_title;
            $admissionAction->button_text = $request->button_text;
            $admissionAction->button_link = $request->button_link;
            $admissionAction->video_id = $request->video_id;
            $admissionAction->image = $this->updateImage($request, 'image', $this->path, 500, 280, $admissionAction, 'image');
            $admissionAction->bg_image = $this->updateImage($request, 'bg_image', $this->path, 500, 280, $admissionAction, 'bg_image');
            $admissionAction->status = $request->status;
            $admissionAction->save();
        }


        Toastr::success(__('msg_updated_successfully'), __('msg_success'));

        return redirect()->back();
    }
}
