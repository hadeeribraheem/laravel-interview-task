<?php

namespace App\Http\Controllers\Web;

use App\Filters\RoleFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotifyMsgRequest;
use App\Models\User;
use App\Notifications\user_notification;
use Barryvdh\DomPDF\Facade\Pdf;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Pipeline\Pipeline;

class UserController extends Controller
{
    public function index(){
        $data = User::query()
            ->orderBy('id', 'DESC');

        //dd($data->get());

        $usersByRole = app(Pipeline::class)
            ->send($data)
            ->through([
                RoleFilter::class,
            ])
            ->thenReturn()
            ->get();

        //dd($usersByRole);
        return view('admin.show.users_table', compact('usersByRole'));
    }
    public function exportPDF()
    {
        $allusers = User::all();
        $pdf = PDF::loadView('admin.Pdfview', compact('allusers'));
        return $pdf->download('users_table.pdf');
    }
    public function AdminToUserNotify(NotifyMsgRequest $request, $userId)
    {
        $data = $request->validated();
        $user = User::findOrFail($userId);
        dd($data->message);

        $user->notify(new user_notification($data->message));
        Flasher::addSuccess('notification sent');
        return redirect()->back();
    }
}
