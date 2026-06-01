<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Kelas dibuat mandiri (standalone) tanpa "extends Controller"
// Langkah ini menyelesaikan error "Class App\Http\Controllers\Controller not found" secara tuntas!
class PortfolioController
{
    public function index()
    
{
    $projects = [
        [
            'id' => 1,
            'num' => '01',
            'category' => 'design',
            'company' => 'CV. Ruang Karya Merdeka',
            'title' => 'Visual Identity & Feed System',
            'desc' => 'Mendesain layout feed sosial media berestetika tinggi yang disesuaikan khusus untuk meningkatkan citra & interaksi klien.',
            'platform' => 'Canva & Photoshop',
            'color' => 'bg-[#FFEB3B] text-black',
            'tapeColor' => 'bg-red-400/40',
            'rotation' => 'rotate-1',
            'image' => asset('image/1. Ruang Sarjana.png'),
            'video' => null 
        ],

        [
            'id' => 2,
            'num' => '02',
            'category' => 'video',
            'company' => 'UKM KSM CREATIVE MINORITY UNIVERSITAS MALIKUSSALEH',
            'title' => 'Cinematic Vertical Profile Organization',
            'desc' => 'Mengedit kumpulan video yang ditayangkan pada PKKMB 2025, serta memberikan transisi dinamis, serta color grading yang kaya akan visual dramatis.',
            'platform' => 'Capcut pro & Canva',
            'color' => 'bg-[#FF5722] text-white',
            'tapeColor' => 'bg-yellow-400/40',
            'rotation' => '-rotate-2',
            'image' => null,
            'video' => 'https://www.youtube.com/embed/MPecKCzwYFA',
                'video_type' => 'iframe',
                'youtube_id' => 'MPecKCzwYFA',

        ],

        [
            'id' => 3,
            'num' => '03',
            'category' => 'branding',
            'company' => 'Cendikia Foundation',
            'title' => 'Social Media Officer',
            'desc' => 'Penyusunan pilar konten edukatif mingguan, infografis kreatif, serta mewadahi kolaborasi dan media promosi.',
            'platform' => 'Canva',
            'color' => 'bg-[#00E676] text-black',
            'tapeColor' => 'bg-blue-400/40',
            'rotation' => 'rotate-2',
            'image' => asset('image/banner.png'),
            'video' => null,
            ''
        ],

        [
            'id' => 4,
            'num' => '04',
            'category' => 'video',
            'company' => 'OSPMMU',
            'title' => '1.5 Year Pesantren Archive',
            'desc' => 'Penyuntingan video dokumentasi dari seluruh kegiatan yang terjadi di lingkungan Pesantren Modern Misbahul Ulum selama masa jabatan.',
            'platform' => 'CapCut, Canva, dan Photoshop',
            'color' => 'bg-[#E040FB] text-white',
            'tapeColor' => 'bg-green-400/40',
            'rotation' => '-rotate-1',
            'image' =>  asset('image/ospmmu.png'),
            'video' => null,
            'video_type' => null,
        ],

        [
            'id' => 5,
            'num' => '05',
            'category' => 'design',
            'company' => 'Layanan Berdikari',
            'title' => 'Bersama Memeluk Diri',
            'desc' => 'Membuat konten promosi baik dalam bentuk video ataupun desain untuk menarik peserta berpartisipasi dalam terapi memeluk diri.',
            'platform' => 'Canva & Capcut',
            'color' => 'bg-[#00B0FF] text-black',
            'tapeColor' => 'bg-pink-400/40',
            'rotation' => 'rotate-3',
            'image' =>  asset('image/lb.png'),
            'video' => null,
            'video_type' => null
        ],

        [
            'id' => 6,
            'num' => '06',
            'category' => 'video',
            'company' => 'Yayasan Solidaritas Aksi Peduli',
            'title' => 'Relawan S.O.S (Support Our Society)',
            'desc' => 'Membantu pelaporan dalam bentuk video yang sudah di edit untuk mengait lebih banyak instansi yang ingin mendonor di kebencanaan Sumatera.',
            'platform' => 'Capcut',
            'color' => 'bg-[#00B0FF] text-black',
            'tapeColor' => 'bg-pink-400/40',
            'rotation' => 'rotate-3',
            'image' => null,
            'video' => 'https://www.youtube.com/embed/qFnivNXsyhg',
            'video_type' => 'iframe',
            'youtube_id' => 'qFnivNXsyhg',
        ]
    ];

    $languages = [
        [
            'name' => 'Arabic (العربية)',
            'level' => 'INTERMEDIATE',
            'percentage' => 75,
            'color' => 'bg-red-500',
            'textColor' => 'text-[#E65100]'
        ],
        [
            'name' => 'English',
            'level' => 'BEGINNER',
            'percentage' => 40,
            'color' => 'bg-black',
            'textColor' => 'text-black'
        ]
    ];

    return view('portfolio', compact('projects', 'languages'));
}
}