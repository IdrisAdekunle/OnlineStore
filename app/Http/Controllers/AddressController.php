<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $address = $request->user()->address()->get();

       // return $address;
        return view('frontend.customer.address.index',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.customer.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'street' => 'required',
            //'state' => 'required',
           // 'city' => 'required',
            'phone' => 'required'
        ]);

        $user = Auth::user();

        if (! isset($request->default)){

            $user->address()->create(array_merge($request->except('default'),['default' => false]));

        }
        else{

            $user->address()->create($request->all());

         }


        return redirect()->route('address.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('frontend.customer.address.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'street' => 'required',
          //  'state' => 'required',
          //  'city' => 'required',
            'phone' => 'required'
        ]);

        $user = Auth::user();
       $check = Address::Where('user_id',$user->id)->where('default',1)->count();

       switch (TRUE) {
            case (!isset($request->default)):
                $address->update(array_merge($request->except('default'), ['default' => false]));
                break;
            case(isset($request->default) && $check > 0):
                return back()->withMessage('you are only allowed to have one shipping/billing address');
                break;
            case (isset($request->default) && $check == 0):
                $address->update($request->all());
                break;
            default:

        }
        return redirect()->route('address.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address ->delete();
        return redirect()->route('address.index');
    }
}
