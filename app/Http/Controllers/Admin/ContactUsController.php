<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contact = ContactUs::all();
            return view('backend.contact-us.index', compact('contact'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contact)
    {
        try {
            $contact->delete();
            return back()->with('success', 'Contact deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
