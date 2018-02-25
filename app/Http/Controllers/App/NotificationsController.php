<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Traits\PaginationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    use PaginationTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $language
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $language)
    {
        $notifications = Auth::user()->notifications->sortByDesc('created_at');

        $this->parginate($request, $notifications);
        return view('notifications.index', ['paginationTools' => $this->paginationTools]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $language
     * @param Notification $notification
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, $language, Notification $notification)
    {
        $notification->delete();
        return redirect($request->session()->previousUrl());
    }
}
