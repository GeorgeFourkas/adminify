<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormMessageRequest;
use App\Http\Requests\CreateProjectFormRequest;
use App\Http\Requests\Langauge\LanguageSwtichRequest;
use App\Mail\ContactFormMessage;
use App\Mail\NewProjectInquiry;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {

        return view('home', [
            'posts' => Post::with('translation')
                ->translatedIn(\App::getLocale())
                ->latest()
                ->limit(3)
                ->get()
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }

    public function articles()
    {
        return view('posts.index', [
            'posts' => Post::with('translation.media', 'user')->translatedIn(\App::getLocale())->withCount('comments')->get()
        ]);
    }

    public function newProject()
    {
        return view('project');
    }

    public function createNewProject(CreateProjectFormRequest $request)
    {
        Mail::to(['info@nalcom.gr'])
            ->send(new NewProjectInquiry($request->first_name, $request->last_name, $request->email, $request->phone, $request->project_type, $request->budget, $request->details));
        return Redirect::to(URL::previous())
            ->with('success', "Thank you for your message. We will be in touch");
    }

    public function contactMessage(ContactFormMessageRequest $request): RedirectResponse
    {
        Mail::to(['info@nalcom.gr'])
            ->send(new ContactFormMessage(
                $request->first_name, $request->last_name, $request->email, $request->phone, $request->message
            ));
        return Redirect::to(URL::previous() . "#contact-form")
            ->with('success', "Thank you for your message. We will be in touch");
    }


    public function switch(LanguageSwtichRequest $request): Redirector|Application|RedirectResponse
    {
        $previousUrlPath = str_replace(url('/'), '', url()->previous());
        $toRedirect = str_replace(\App::getLocale(), $request->lang, $previousUrlPath);
        return redirect()->to($toRedirect);
    }
}
