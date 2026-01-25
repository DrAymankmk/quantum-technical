<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsPage;

class ContactController extends Controller
{
    public function index()
    {
        $contactPage = CmsPage::where('slug', 'contact')
            ->with([
                'sections' => function($query) {
                    $query->where('is_active', true)->orderBy('order');
                },
            ])
            ->first();
        return view('frontend.template-1.pages.contact.index', compact('contactPage'));
    }

    /**
     * Handle contact form submission and send email using PHP native mail() function.
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Sanitize inputs
        $name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($data['message'], ENT_QUOTES, 'UTF-8');

        // Email configuration
        $to = 'info@quantum-technical.com';
        $subject = 'New Contact Form Submission from ' . $name;
        
        // Build HTML email body
        $emailBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #3C72FC; color: white; padding: 20px; text-align: center; }
        .content { background-color: #f9f9f9; padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; padding: 10px; background-color: white; border-left: 3px solid #3C72FC; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Contact Form Submission</h2>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>Name:</div>
                <div class='value'>{$name}</div>
            </div>
            <div class='field'>
                <div class='label'>Email:</div>
                <div class='value'>{$email}</div>
            </div>
            <div class='field'>
                <div class='label'>Message:</div>
                <div class='value'>" . nl2br($message) . "</div>
            </div>
        </div>
    </div>
</body>
</html>
";

        // Set email headers
        $headers = array(
            'From' => $email,
            'Reply-To' => $email,
            'X-Mailer' => 'PHP/' . phpversion(),
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/html; charset=UTF-8'
        );

        // Convert headers array to string
        $headersString = '';
        foreach ($headers as $key => $value) {
            $headersString .= $key . ': ' . $value . "\r\n";
        }

        // Send email using PHP native mail() function
        $mailSent = mail($to, $subject, $emailBody, $headersString);

        if ($mailSent) {
            return back()->with('success', 'Your message has been sent successfully! We will get back to you soon.');
        } else {
            return back()->with('error', 'Failed to send message. Please try again later.');
        }
    }
}
