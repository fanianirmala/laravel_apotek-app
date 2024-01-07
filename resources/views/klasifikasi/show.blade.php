@extends('layouts.template')

@section('content')
    <div class="d-block justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Klasifikasi Surat</h1>
        <div class="d-flex">
            <h6>Home / Data Klasifikasi Surat /<b class="text-primary"> Detail Klasifikasi Surat</b></h6>
        </div>
    </div>
    @foreach ($detail as $item)
        <div class="d-flex mb-3">
            <h1 class="h2">{{ $item['letter_code'] }} | <h4 class="mt-2">
                {{ $item['name_type'] }}</h4>
            </h1>
        </div>
        <div class="card mb-3" style="max-width: 18rem;">
            <div class="d-flex">
                <div class="p-2 flex-grow-1">
                    <h6><b class="text-primary">{{ $item['name_type'] }}</b></h6>
                </div>
                <div class="p-2"><a href="{{ route('klasifikasi.download', $item['id']) }}"><i class="bi bi-download pe-2"></i></a></div>
            </div>
            <div class="card-body">
                <td><b><h5>{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</h3></b></td>
                @php $no = 1; @endphp
                @foreach ($guru as $items)
                    <p class="card-text">{{ $no++ }} . {{ $items->name }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
