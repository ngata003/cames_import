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
        $notifications = collect(); // Collection vide par défaut

        if (in_array($user->role, ['admin', 'secretaire'])) {
            $notifications = Notification::where('nom_entreprise', $entreprise->nom_entreprise)
                ->where('destinataire', 'admin-secretaire')
                ->where('status', 'non_lu')
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        }

        if (in_array($user->role, ['admin', 'importateur'])) {
            $notifications = Notification::where('nom_entreprise', $entreprise->nom_entreprise)
                ->where('destinataire', 'admin-importateur')
                ->where('status', 'non_lu')
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        }

        if (in_array($user->role, ['secretaire', 'importateur'])) {
            $notifications = Notification::where('nom_entreprise', $entreprise->nom_entreprise)
                ->where('destinataire', 'secretaire-importateur')
                ->where('status', 'non_lu')
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        }

        return view('notifications.notifications_view', compact('notifications'));
    }

    public function lu_notif($id){
        $notif = notification::find($id);

        $notif->status = "lu";
        $notif->save();

        return back()->with('status_notif','vous venez de lire ce message');
    }

}
