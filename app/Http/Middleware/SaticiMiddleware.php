<?php

namespace App\Http\Middleware;

use App\Models\Magaza;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaticiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || (!Auth::user()->isSatici() && !Auth::user()->isAdmin())) {
            abort(403, 'Bu sayfaya erişim yetkiniz yok.');
        }

        if (Auth::user()->durum !== 'aktif') {
            abort(403, 'Hesabınız engellenmiştir.');
        }

        $magaza = Magaza::where('kullanici_id', Auth::id())->first();

        if (!$magaza) {
            return redirect()->route('home')
                ->with('error', 'Önce mağaza başvurusu yapmalısınız.');
        }

        if ($magaza->durum === 'beklemede') {
            return redirect()->route('home')
                ->with('error', 'Mağaza başvurunuz henüz onaylanmadı. Onaylandıktan sonra satıcı panelini kullanabilirsiniz.');
        }

        if ($magaza->durum === 'reddedildi') {
            return redirect()->route('home')
                ->with('error', 'Mağaza başvurunuz reddedildi. Lütfen tekrar başvurun.');
        }

        return $next($request);
    }
}
