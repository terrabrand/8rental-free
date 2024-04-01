<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLandlordRequest;
use App\Http\Requests\StoreLandlordRequest;
use App\Http\Requests\UpdateLandlordRequest;
use App\Models\Landlord;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LandlordController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('landlord_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landlords = Landlord::with(['media'])->get();

        $landlords = Landlord::paginate(12);

        return view('admin.landlords.index', compact('landlords'));
    }

    public function create()
    {
        abort_if(Gate::denies('landlord_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.landlords.create');
    }

    public function store(StoreLandlordRequest $request)
    {
        $landlord = Landlord::create($request->all());

        if ($request->input('image', false)) {
            $landlord->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $landlord->id]);
        }

        return redirect()->route('admin.landlords.index');
    }

    public function edit(Landlord $landlord)
    {
        abort_if(Gate::denies('landlord_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.landlords.edit', compact('landlord'));
    }

    public function update(UpdateLandlordRequest $request, Landlord $landlord)
    {
        $landlord->update($request->all());

        if ($request->input('image', false)) {
            if (! $landlord->image || $request->input('image') !== $landlord->image->file_name) {
                if ($landlord->image) {
                    $landlord->image->delete();
                }
                $landlord->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($landlord->image) {
            $landlord->image->delete();
        }

        return redirect()->route('admin.landlords.index');
    }

    public function show(Landlord $landlord)
    {
        abort_if(Gate::denies('landlord_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landlord->load('landlordProperties', 'landlordExpenses', 'landlordDocuments', 'landlordInvoices');

        return view('admin.landlords.show', compact('landlord'));
    }

    public function destroy(Landlord $landlord)
    {
        abort_if(Gate::denies('landlord_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landlord->delete();

        return back();
    }

    public function massDestroy(MassDestroyLandlordRequest $request)
    {
        $landlords = Landlord::find(request('ids'));

        foreach ($landlords as $landlord) {
            $landlord->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('landlord_create') && Gate::denies('landlord_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Landlord();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
