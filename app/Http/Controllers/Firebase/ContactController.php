<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Http\HttpClientOptions;
use Kreait\Firebase\Factory;

class ContactController extends Controller
{
    protected $database;

    // public function index(){
    //     $path = base_path('storage/firebase/firebase.json');
    
    //     // Fix: Check if the file does NOT exist
    //     if (!file_exists($path)){
    //         die("The file path [$path] does not exist.");
    //     }
    
    //     try {
    //         $factory = (new Factory)
    //             ->withServiceAccount($path)
    //             ->withDatabaseUri('https://e-commerce-website-1-80525-default-rtdb.firebaseio.com/');
    //             $realtimeDatabase = $factory->createDatabase();
    //             $reference = $realtimeDatabase->getReference('contacts');
    //             $reference->set(['connection' => true]);
    //             $snapshot = $reference->getSnapshot();
    //             $value=$snapshot->getValue();
    //             return response([
    //                 'message' => true,
    //                 'value' => $value,
    //             ]);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => $e->getMessage(),
    //             'status' => false,
    //         ]);
    //     }
    // }
    

    public function __construct()
    {
        $path = base_path('storage/firebase/firebase.json');
        $factory = (new Factory)
        ->withServiceAccount($path)
         ->withDatabaseUri('https://e-commerce-website-1-1a5ee-default-rtdb.firebaseio.com/');
        
        ;

        $this->database = $factory->createDatabase();

    }
    
    /// view thw inquiry form
    public function showForm()
    {
        // Return the view for the contact form
        return view('firebase.contact.index');
    }

    /// view the created inquiries
    public function viewInquiries()
    {
    try {
        // Fetch all inquiries from Firebase
        $reference = $this->database->getReference('contacts');
        $inquiries = $reference->getValue(); // Get all inquiries

        // If no inquiries are found, make sure $inquiries is an empty array
        $inquiries = $inquiries ?? [];

        return view('firebase.contact.view', compact('inquiries'));

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to fetch inquiries: ' . $e->getMessage());
        }
    }
    
    //create
    public function store(Request $request)
    {
    // Validate the form inputs
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Path to Firebase credentials
    $path = base_path('storage/firebase/firebase.json');

    if (!file_exists($path)) {
        return redirect()->back()->with('error', 'Firebase configuration file is missing.');
    }

    try {
        // Initialize Firebase factory
        $factory = (new Factory)
            ->withServiceAccount($path)
            ->withDatabaseUri('https://e-commerce-website-1-1a5ee-default-rtdb.firebaseio.com/');

        // Create a database instance
        $database = $factory->createDatabase();

        // Push data to Firebase Realtime Database under "contacts" node
        $newContact = $database->getReference('contacts')->push([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'created_at' => now()->toDateTimeString(),
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to submit inquiry: ' . $e->getMessage());
    }
    }

    /// edit
    public function edit($id)
    {
    try {
        // Retrieve inquiry by ID
        $reference = $this->database->getReference("contacts/{$id}");
        $inquiry = $reference->getValue();

        if (!$inquiry) {
            return redirect()->back()->with('error', 'Inquiry not found.');
        }

        return view('firebase.contact.edit', compact('inquiry', 'id'));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to retrieve inquiry: ' . $e->getMessage());
    }
    }

    ///update
    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
        $this->database->getReference("contacts/{$id}")->update($validatedData);
        return redirect()->route('contacts.view')->with('success', 'Inquiry updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update inquiry: ' . $e->getMessage());
    }
    }

    ////delete
    public function destroy($id)
    {
    try {
        $this->database->getReference("contacts/{$id}")->remove();
        return redirect()->back()->with('error', 'Your inquiry has been deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->with('error', 'Failed to delete inquiry: ' . $e->getMessage());
    }
    }



}
