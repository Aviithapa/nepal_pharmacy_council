<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\Setting\SettingRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    protected $settingRepository;
  

    public function __construct(
        SettingRepository $settingRepository
    ) {
        $this->settingRepository = $settingRepository;
    }

    public function store(Request $request)
    {
        try {

            if ($request->ajax()) {
                // Validate the request data
                $request->validate([
                    'checked' => 'required|boolean',
                ]);

                // Extract the attribute and checked values from the request
                $id = $request->input('id');
                $checked = $request->input('checked');

                // Update the specified resource
                DB::beginTransaction();
                $setting = $this->settingRepository->findOrFail($id);
                $news = $this->settingRepository->update($setting->id, ['is_blinking' => $checked]);
                if (!$news) {
                    return response()->json(['error' => 'Oops! Something went wrong.'], 500);
                }
                DB::commit();

                return response()->json(['success' => 'Resource updated successfully.']);
            }
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
