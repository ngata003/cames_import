<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Auth;
use Illuminate\Http\Request;
use Session;

class NotificationController extends Controller
{
    //
    public function view_controller(){

        $entreprise = Session::get('entreprise_active');
        $user = Auth::user();

        $roles_destinataires = [
            'admin' => ['admin-secretaire', 'admin-importateur'],
            'secretaire' => ['admin-secretaire', 'secretaire-importateur'],
            'importateur' => ['admin-importateur', 'secretaire-importateur'],
        ];

        $destinataires = [];
        foreach ($roles_destinataires as $role => $dest) {
            if (in_array($user->role, explode('-', $role))) {
                $destinataires = array_merge($destinataires, $dest);
            }
        }
        $destinataires = array_unique($destinataires);

        $notifications = notification::where('nom_entreprise', $entreprise->nom_entreprise)
            ->whereIn('destinataire', $destinataires)
            ->orderByRaw("
                CASE
                    WHEN status = 'non_lu' THEN 0
                    ELSE 1
                END,
                created_at DESC
            ")
            ->paginate(6);

           //dd($nb_notifications_non_lues);

        return view('notifications.notifications_view', compact('notifications'));
    }

    public function lu_notif($id) {

        $notif = notification::find($id);
        $notif->status = "lu";
        $notif->save();

        return back()->with('status_notif','vous venez de lire ce message');
    }

    public function nofications_delete($id){

        $notifications = notification::find($id);
        $notifications->delete();

        return back()->with('delete_notifications','vous avez supprimé cette notification');
    }



}
