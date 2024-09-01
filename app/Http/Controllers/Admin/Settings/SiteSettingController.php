<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Media\MediaRepository;
use App\Repositories\Settings\SiteSettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    private $siteSettingRepository;
    protected $fileUploader;
    protected $mediaRepository;
    protected $crud_actions = ['create', 'read', 'update', 'delete'];
    /**
     * PermissionController constructor.
     * @param siteSettingRepository $siteSettingRepository
     */

    public function __construct(
        SiteSettingRepository $siteSettingRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository
    ) {
        $this->siteSettingRepository = $siteSettingRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * View all entities
     * @return mixed
     */
    public function index(Request $request)
    {

        $site_settings = $this->siteSettingRepository->getPaginatedList($request);
        return view('admin.pages.site-settings.index', compact('site_settings'));
    }

    /**
     * Create new entity
     * @return mixed
     */
    public function create()
    {
        return view('admin.pages.site-settings.form');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        if (isset($inputs['_wysihtml5_mode'])) unset($inputs['_wysihtml5_mode']);
        try {
            foreach ($inputs as $k => $v) {
                $display_name = Str::ucfirst(Str::replaceFirst('_', ' ', $k));
                $setting = $this->siteSettingRepository->findByName($k);

                if ($request->hasFile($k)) {
                    $file = $request->file($k);
                    $siteSettingLogoCover =  $this->fileUploader->upload($file, "logo");
                    $v = $siteSettingLogoCover['path'];
                }

                if ($setting != null) {
                    $this->siteSettingRepository->update($setting->id, ['name' => $k, 'value' => $v, 'display_name' => $display_name]);
                } else {
                    $this->siteSettingRepository->store(['name' => $k, 'value' => $v, 'display_name' => $display_name]);
                }
            }
            session()->flash('success', 'Site Settings Updated Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('danger', 'Ops! Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Edit entity
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $site_setting = $this->siteSettingRepository->findOrFail($id);
        return view('admin.settings.site-setting.edit', compact('site_setting'));
    }



    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        try {
            $this->siteSettingRepository->delete($id);
            session()->flash('success', 'Setting deleted successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        if (isset($inputs['_wysihtml5_mode'])) unset($inputs['_wysihtml5_mode']);
        try {
            foreach ($inputs as $k => $v) {
                $display_name = Str::ucfirst(Str::replaceFirst('_', ' ', $k));
                $setting = $this->siteSettingRepository->findByName($k);
                if ($setting != null) {
                    $this->siteSettingRepository->update(['name' => $k, 'value' => $v, 'display_name' => $display_name], $setting->id);
                } else {
                    $this->siteSettingRepository->store(['name' => $k, 'value' => $v, 'display_name' => $display_name]);
                }
            }
            session()->flash('success', 'Site Settings Updated Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('danger', 'Ops! Something went wrong');
            return redirect()->back();
        }
    }
}
