<?php

namespace App\Http\Middleware;

use App\Enum\LanguageEnum;
use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lang = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        $lang = $lang->pluck('locale')->toArray();
        if (session()->exists('language'))
        {


                //$base = url()->to('');
                //$segments = $request->segments();
                    app()->setLocale( session()->get('language'));
                /*return redirect()->to($base . '/'.session()->get('locale'). '/' . implode('/', $segments));
            return redirect()->to($base . '/'.  config('app.locale'). '/' . implode('/', $segments));*/

        }
        //app()->setLocale($request->locale);
        return $next($request);
    }
}
