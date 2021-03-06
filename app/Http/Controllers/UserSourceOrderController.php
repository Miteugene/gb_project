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
        /*
        // Пачкой добавляю, когда таблица пустая
        $sources = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
        ];
        foreach ($sources as $source) {
            $userOrder = UserSourceOrder::create(['source' => $source]);
        }

        dd($sources);
        */

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
