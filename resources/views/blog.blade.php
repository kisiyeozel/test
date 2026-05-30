@inject('str', 'Illuminate\Support\Str')
@extends('layouts.app')
@section('title', 'Blog')
@section('meta_desc', 'Kişiye özel ürünler, hediye fikirleri ve ilham veren yazılar')

@section('content')
<div class="bg-cream-50 border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
        <span class="text-gold-500 text-sm font-semibold uppercase tracking-widest">İlham Perisi</span>
        <h1 class="text-4xl md:text-5xl blog-title mt-3">Blog</h1>
        <p class="text-dark-400 mt-4 max-w-2xl mx-auto text-lg">Hediye fikirleri, tasarım trendleri ve kişiye özel ürünler hakkında ilham veren yazılar</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @php
        $yazilarArray = $yazilar->items();
        $featured = $yazilarArray[0] ?? null;
        $others = array_slice($yazilarArray, 1);
    @endphp

    @if($featured)
        <a href="{{ route('blog.detail', $featured->slug) }}" class="group block mb-12">
            <div class="relative rounded-2xl overflow-hidden bg-white border border-dark-100 shadow-sm">
                <div class="grid md:grid-cols-2">
                    <div class="h-80 md:h-96 bg-cream-100 overflow-hidden relative">
                        @if($featured->foto)
                            <img src="{{ asset('storage/blog/' . $featured->foto) }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                                 loading="eager">
                        @else
                            <img src="https://picsum.photos/seed/{{ $featured->id }}/800/600"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                                 loading="eager">
                        @endif
                    </div>
                    <div class="p-8 md:p-12 flex flex-col justify-center">
                        <span class="text-xs text-dark-400 uppercase tracking-wider"><i class="far fa-calendar mr-1"></i>{{ $featured->created_at->format('d.m.Y') }}</span>
                        <h2 class="text-2xl md:text-3xl blog-title mt-4 group-hover:text-gold-600 transition">{{ $featured->baslik }}</h2>
                        @if($featured->ozet)
                            <p class="text-dark-400 mt-4 leading-relaxed">{{ $str::limit($featured->ozet, 200) }}</p>
                        @endif
                        <div class="mt-6 text-gold-600 font-medium flex items-center gap-2 group-hover:gap-3 transition-all">
                            Devamını Oku <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endif

    @if(count($others) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($others as $yazi)
                <a href="{{ route('blog.detail', $yazi->slug) }}" class="group bg-white rounded-xl border border-dark-100 overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
                    <div class="h-52 bg-cream-100 overflow-hidden relative">
                        @if($yazi->foto)
                            <img src="{{ asset('storage/blog/' . $yazi->foto) }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                 loading="lazy">
                        @else
                            <img src="https://picsum.photos/seed/{{ $yazi->id }}/400/300"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                 loading="lazy">
                        @endif
                    </div>
                    <div class="p-6">
                        <span class="text-xs text-dark-400"><i class="far fa-calendar mr-1"></i>{{ $yazi->created_at->format('d.m.Y') }}</span>
                        <h3 class="blog-title text-xl mt-3 group-hover:text-gold-600 transition leading-snug line-clamp-2">{{ $yazi->baslik }}</h3>
                        @if($yazi->ozet)
                            <p class="text-sm text-dark-400 mt-3 line-clamp-2">{{ $str::limit($yazi->ozet, 100) }}</p>
                        @endif
                        <div class="mt-4 text-sm text-gold-600 font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                            Devamını Oku <i class="fas fa-arrow-right text-xs"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    @if(count($yazilarArray) === 0)
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto bg-cream-100 rounded-full flex items-center justify-center mb-6"><i class="fas fa-newspaper text-4xl text-gray-300"></i></div>
            <p class="text-dark-400 font-medium">Henüz blog yazısı yok.</p>
        </div>
    @endif

    <div class="mt-12">{{ $yazilar->links() }}</div>
</div>
@endsection