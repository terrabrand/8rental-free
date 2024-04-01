<?php

namespace App\Http\Requests;

use App\Models\Maintainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMaintainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('maintainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:maintainers,id',
        ];
    }
}
