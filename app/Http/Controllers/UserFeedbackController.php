<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Feedback\UserFeedbackStoreRequest;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.feedback.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserFeedbackStoreRequest $request)
    {
        $validated = $request->validated();
        $feedback = UserFeedback::create($validated);

        if ($feedback) {
            return redirect()->route('user.feedback.index')
                ->with('success', __('message.user.feedback.create.success'));
        }

        return back()->with('error', __('message.user.feedback.create.fail'))
            ->withInput();
    }
}
