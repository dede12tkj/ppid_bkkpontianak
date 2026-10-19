@extends('layouts.ppid')
@section('title')
    PPID
@endsection
@section('title-navbar')
    PPID Balai Kekarantinaan Kesehatan Kelas I Pontianak
@endsection
@section('content')
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto">
                <h2 class="mb-0">Selamat datang di layanan e-PPID</h2>
                <p>Layanan ini merupakan sarana layanan online bagi pemohon informasi publik sebagai salah satu wujud
                    pelaksanaan keterbukaan informasi publik pada Balai Kekarantinaan Kesehatan Kelas I Pontianak </p>
            </div>
            <hr>
            <div class="action-grid">
                <a href="{{ $form?->form_permohonan_informasi ?? '#' }}" target="_blank" rel="noopener" class="action-card">
                    <span class="ico"><i class="bi bi-file-earmark-text"></i></span>
                    <span><b>Formulir Permohonan Informasi</b><small>Ajukan permintaan informasi publik</small></span>
                    <i class="bi bi-arrow-right go"></i>
                </a>
                <a href="{{ $form?->form_keberatan ?? '#' }}" target="_blank" rel="noopener" class="action-card">
                    <span class="ico"><i class="bi bi-chat-left-text"></i></span>
                    <span><b>Formulir Keberatan</b><small>Sampaikan keberatan atas layanan</small></span>
                    <i class="bi bi-arrow-right go"></i>
                </a>
                <a href="{{ $form && $form->file_daftar_informasi_publik ? asset('storage/' . $form->file_daftar_informasi_publik) : '#' }}"
                    target="_blank" rel="noopener" class="action-card">
                    <span class="ico"><i class="bi bi-journal-text"></i></span>
                    <span><b>Daftar Informasi Publik</b><small>E-DIP, unduh dokumen</small></span>
                    <i class="bi bi-arrow-right go"></i>
                </a>
            </div>
            <hr>
            <h2 class="text-center mt-3">Pertanyaan yang sering diajukan</h2>

            <div class="accordion shadow mt-3" id="kemenkesAccordion">

                @foreach ($faq as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $item->id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $item->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $item->id }}">
                                {{ $item->judul }}
                            </button>
                        </h2>

                        <div id="collapse{{ $item->id }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $item->id }}" data-bs-parent="#kemenkesAccordion">

                            <div class="accordion-body">
                                {!! $item->deskripsi !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
