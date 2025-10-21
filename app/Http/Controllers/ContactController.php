<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'company' => 'nullable|string|max:160',
            'message' => 'required|string|max:3000',
        ]);

        // add optional metadata
        $data['ip'] = $request->ip();
        $data['user_agent'] = $request->header('User-Agent');

        Log::info('Contact form submitted', ['name' => $data['name'], 'email' => $data['email']]);

        try {
            // send mail to company inbox
            Mail::to('borneoecosolution@gmail.com')->send(new ContactFormMail($data));
        } catch (\Exception $e) {
            Log::error('Contact mail send failed: '.$e->getMessage(), ['exception'=>$e]);
            // if AJAX request return json
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Gagal mengirim email. Silakan hubungi via WhatsApp.'], 500);
            }
            return back()->with('error', 'Gagal mengirim email. Silakan hubungi via WhatsApp.');
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Pesan terkirim']);
        }

        return back()->with('success', 'Pesan terkirim. Terima kasih!');
    }
}
