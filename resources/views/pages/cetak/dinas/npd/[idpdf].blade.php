@php
use Illuminate\Support\Facades\Http;

$segments = request()->segments();
$lastSegment = count($segments) > 0 ? end($segments) : null;

// Token bearer yang Anda miliki
$token = '1|x0mu02xVoEGcXQM760UUiPLJkt7B6zDjloDtrOgE0c22e6c0';

// URL API yang menyediakan PDF
$apiUrl = env('API_DOMAIN').'/api/v1/viewnpd-dinas/'.$lastSegment;

// Mengambil konten PDF dari API menggunakan Http client bawaan Laravel
$response = Http::withToken($token)->get($apiUrl);

if ($response->successful()) {
    // Mengirim konten PDF ke browser
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="document.pdf"');
    echo $response->body();
    exit;
} else {
    // Menangani kesalahan jika permintaan gagal
    echo 'Failed to retrieve PDF from API. Error: ' . $response->status() . ' - ' . $response->body();
    exit;
}

@endphp
