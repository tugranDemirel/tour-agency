<?php

namespace App\Http\Controllers;

use App\Enum\CarEnum;
use App\Enum\CommentEnum;
use App\Enum\FaqEnum;
use App\Enum\LanguageEnum;
use App\Enum\ServiceEnum;
use App\Models\About;
use App\Models\Car;
use App\Models\CityLocationCarPrice;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Language;
use App\Models\PrivateService;
use App\Models\Seo;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', ServiceEnum::IS_ACTIVE)->get();
        $comments = Comment::where('is_approved', CommentEnum::IS_APPROVED)
                    ->where('is_active', CommentEnum::IS_ACTIVE)
                    ->orderBy('updated_at', 'desc')->limit(4)->get();
        return view('index', compact('services', 'comments'));
    }

    public function singleTour(CityLocationCarPrice $cityLocationCarPrice)
    {
        $cityLocationCarPrice = CityLocationCarPrice::where('id', $cityLocationCarPrice->id)->with(['car' => function($query){
            $query->where('is_active', CarEnum::IS_ACTIVE);
        },
            'comments' => function($query){
                $query->where('is_approved', CommentEnum::IS_APPROVED)
                        ->orderBy('created_at', 'desc');
            },
            ])->firstOrFail();
        return view('single-tour', compact('cityLocationCarPrice'));
    }

    public function storeComment(Request $request, CityLocationCarPrice $cityLocationCarPrice)
    {
        $data = $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        $data['city_location_car_price_id'] = $cityLocationCarPrice->id;

        $update = Comment::create($data);
        if($update){
            return redirect()->back()->with('success', 'Comment added successfully');
        }
        return redirect()->back()->with('error', 'Comment not added');
    }

    public function about()
    {
        $about = About::where('id', 1)->firstOrFail();
        $comments = Comment::where('is_approved', CommentEnum::IS_APPROVED)
                    ->where('is_active', CommentEnum::IS_ACTIVE)
                    ->orderBy('updated_at', 'desc')->limit(4)->get();
        $langCount = Language::where('is_active', LanguageEnum::IS_ACTIVE)->count();
        return view('about', compact('about', 'comments', 'langCount'));

    }

    public function service(Service $service)
    {
        $services = Service::where('is_active', ServiceEnum::IS_ACTIVE)
                                ->where('id', '!=', $service->id)
                                ->orderBy('updated_at', 'desc')->limit(4)->get();
        return view('service', compact('service', 'services'));
    }

    public function privateService()
    {
        return view('private-service');
    }

    public function storePrivateService(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:255',
        ]);
        $create = PrivateService::create($data);
        if ($create) {
            return redirect()->back()->with('success', 'Private service added successfully');
        }
        return redirect()->back()->with('error', 'Private service not added');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        $faqs = Faq::where('is_active', FaqEnum::IS_ACTIVE)->get();
        return view('faq', compact('faqs'));
    }

    public function locale(Request $request)
    {
        $request->validate([
            'lang' => 'required|exists:languages,locale',
        ]);

        app()->setLocale($request->lang);
        session()->put('language', $request->lang);
        return response()->json([
            'success' => true,
            'lang' => app()->getLocale(),
        ]);
    }
}
