<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Order\UserOrderStoreRequest;
use App\Models\UserSourceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserSourceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.order.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserOrderStoreRequest $request)
    {
        $validated = $request->validated();
        $userOrder = UserSourceOrder::create($validated);

        if ($userOrder) {
            return redirect()->route('user.order.index')
                ->with('success', __('message.user.order.create.success'));
        }

        return back()->with('error', __('message.user.order.create.fail'))
            ->withInput();
    }

}
