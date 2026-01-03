<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyek;
use App\Models\pengguna;
use Barryvdh\DomPDF\Facade\Pdf;

class PortoController extends Controller
{
    //
    public function index()
    { 
        $proyek = proyek::all();
        return view('Porto', compact('proyek'));
    }

    public function exportPdf()
    {
        $proyek = proyek::all();
        
        // Convert images to base64 for PDF
        $proyekWithImages = $proyek->map(function($project) {
            $projectData = $project->toArray();
            $projectData['gambar_base64'] = null;
            
            if ($project->gambar && file_exists(public_path($project->gambar))) {
                $imagePath = public_path($project->gambar);
                $imageData = file_get_contents($imagePath);
                $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);
                
                // Convert to proper mime type
                $mimeTypes = [
                    'jpg' => 'image/jpeg',
                    'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp'
                ];
                
                $mimeType = $mimeTypes[strtolower($imageType)] ?? 'image/jpeg';
                $projectData['gambar_base64'] = 'data:' . $mimeType . ';base64,' . base64_encode($imageData);
            }
            
            return (object) $projectData;
        });
        
        $pdf = Pdf::loadView('pdf.portfolio', ['proyek' => $proyekWithImages])
                  ->setPaper('a4', 'portrait')
                  ->setOptions([
                      'isHtml5ParserEnabled' => true,
                      'isRemoteEnabled' => true,
                      'defaultFont' => 'sans-serif',
                      'chroot' => public_path()
                  ]);
        
        return $pdf->download('Portfolio_Muhammad_Harist_Illyasa_' . date('Y-m-d') . '.pdf');
    }
}
