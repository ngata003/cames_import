<?php

namespace App\Http\Middleware;

use App\Models\notification;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;
use View;

class ShareNotification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        View::composer('*', function ($view) {
            $entreprise = Session::get('entreprise_active');
            $user = Auth::user();

            if (!$entreprise || !$user) {
                return;
            }

            $roles_destinataires = [
                'admin' => ['admin-secretaire', 'admin-importateur'],
                'secretaire' => ['admin-secretaire', 'secretaire-importateur'],
                'importateur' => ['admin-importateur', 'secretaire-importateur'],
            ];

            $destinataires = [];
            foreach ($roles_destinataires as $role => $dest) {
                if ($user->role === $role) {
                    $destinataires = array_merge($destinataires, $dest);
                }
            }
            $destinataires = array_unique($destinataires);

            $nb_notifications_non_lues = notification::where('nom_entreprise', $entreprise->nom_entreprise)
                ->where(function ($query) use ($destinataires) {
                    foreach ($destinataires as $dest) {
                        $query->orWhere('destinataire', 'LIKE', "%$dest%");
                    }
                })
                ->where('status', 'non_lu')
                ->count();

            $view->with('nb_notifications_non_lues', $nb_notifications_non_lues);
        });

        return $next($request);
    }
}
