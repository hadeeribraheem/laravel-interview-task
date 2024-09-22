<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Models\Images;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $modelClass = 'App\Models\\' . request('model_name');
        $item = $modelClass::query()->find(request('id'));
        if ($item){
            //$item->delete();
            DB::select('DELETE FROM '.request('model_name').' WHERE id='.request('id'));

        }

        $is_api_request = $request->route()->getPrefix() === 'api';
        if ($is_api_request) {
            /*        return Messages::success('', __('messages.deleted_successfully'));*/

        }
        else{
            Flasher::addSuccess('successfully deleted!');
            return redirect()->back();
        }
    }
}
