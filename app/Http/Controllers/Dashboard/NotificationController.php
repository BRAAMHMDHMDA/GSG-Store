<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.layouts._session')->with([
            'notifications' => $user->notifications()->paginate(),
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $notification = $user->notifications()->findOrFail($id);

        $notification->markAsRead();

        if (isset($notification->data['url']) && $notification->data['url']) {
            return redirect($notification->data['url']);
        }

        return redirect()->back();
    }

}
