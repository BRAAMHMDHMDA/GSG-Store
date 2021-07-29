<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function index()
    {
        $currencies = Currency::latest()->paginate(10);
        return view('dashboard.currencies.index' , compact('currencies'));
    }

    public function create()
    {
        return view('dashboard.currencies.create')->with([
            'currency' => new Currency(),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate(Currency::validateRules($request->id));
        $currency = Currency::create($request->all());
        return redirect()->route('currencies.index')->with([
            'suceess' => 'Currency Created Successfully'
        ]);
    }

    public function show(Currency $currency)
    {
        //
    }


    public function edit(Currency $currency)
    {
        return view('dashboard.currencies.edit',compact('currency'));
    }


    public function update(Request $request, Currency $currency)
    {
        $request->validate(Currency::validateRules($currency->id));

        if ($request->is_primary ==null){
            $request->merge([
               'is_primary' => 0
            ]);
        }
        $currency->update($request->all());

        return redirect()->route('currencies.index')->with([
            'suceess' => 'Currency Upadted Successfully'
        ]);;
    }


    public function destroy(Currency $currency)
    {
        $currency->delete();
//        session()->flash('success' , 'Currency deleted Successfuly');

        return redirect()->route('currencies.index')->with([
            'success' => 'Currency deleted Successfuly'
        ]);
    }
}
