<?php

namespace App\Http\Controllers\Admin;

use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMembershipsRequest;
use App\Http\Requests\Admin\UpdateMembershipsRequest;

class MembershipsController extends Controller
{
    /**
     * Display a listing of Membership.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('membership_access')) {
            return abort(401);
        }


                $memberships = Membership::all();

        return view('admin.memberships.index', compact('memberships'));
    }

    /**
     * Show the form for creating new Membership.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('membership_create')) {
            return abort(401);
        }
        return view('admin.memberships.create');
    }

    /**
     * Store a newly created Membership in storage.
     *
     * @param  \App\Http\Requests\StoreMembershipsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembershipsRequest $request)
    {
        if (! Gate::allows('membership_create')) {
            return abort(401);
        }
        $membership = Membership::create($request->all());



        return redirect()->route('admin.memberships.index');
    }


    /**
     * Show the form for editing Membership.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('membership_edit')) {
            return abort(401);
        }
        $membership = Membership::findOrFail($id);

        return view('admin.memberships.edit', compact('membership'));
    }

    /**
     * Update Membership in storage.
     *
     * @param  \App\Http\Requests\UpdateMembershipsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMembershipsRequest $request, $id)
    {
        if (! Gate::allows('membership_edit')) {
            return abort(401);
        }
        $membership = Membership::findOrFail($id);
        $membership->update($request->all());



        return redirect()->route('admin.memberships.index');
    }


    /**
     * Display Membership.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('membership_view')) {
            return abort(401);
        }
        $membership = Membership::findOrFail($id);

        return view('admin.memberships.show', compact('membership'));
    }


    /**
     * Remove Membership from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('membership_delete')) {
            return abort(401);
        }
        $membership = Membership::findOrFail($id);
        $membership->delete();

        return redirect()->route('admin.memberships.index');
    }

    /**
     * Delete all selected Membership at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('membership_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Membership::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
