@extends('layouts.template')

@section('content')
    <form action="{{ route('surat.update', $letter['id']) }}" method="POST" class="card p-5">
        {{-- mengecek value dari hasil input user --}}
        @csrf
        <div class="card-header mb-3">
            <h2>Form Input Surat</h2>
        </div>
    <div class="container">
        <div class="mb-3 row">
            <label for="letter_perihal" class="col-sm-2 col-form-label">Perihal :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('letter_perihal') is-invalid @enderror" id="letter_perihal" name="letter_perihal" value="{{ $letter['letter_perihal'] }}">
                @error('letter_perihal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="letter_type_id" class="col-sm-2 col-form-label">Klasifikasi Surat :</label>
            <div class="col-sm-10">
                <select class="form-select @error('role') is-invalid @enderror" id="letter_type_id" name="letter_type_id" value="{{ $letter['letter_type_id'] }}">
                    <option value="" hidden>Choose..</option>
                    {{-- data relasi --}}
                    @foreach ($data as $item)
                        <option value="{{ $item->id }}">{{ $item->name_type }}</option>
                    @endforeach
                </select>
                @error('letter_type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Isi Surat :</label>
            <div class="col-sm-10">
                <textarea name="content" id="des" cols="100" rows="10" value="{{ $letter['content'] }}"></textarea>
                @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th sclope="col">Nama</th>
                        <th scope="col">ceklis jika 'ya'</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $usr)
                    <tr>
                        <td>{{ $usr->name }}</td>
                        <td><input type="checkbox" name="recipients[]"  value="{{ $usr->id }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-3 row">
            <div class="mb-3">
                <label for="formFile" class="form-label">Lampiran</label>
                <input class="form-control" type="file" id="formFile" name="attachment" value="{{ $letter['attachment'] }}">
            </div>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="notulis" class="col-sm-2 col-form-label">Notulis :</label>
        <div class="col-sm-10">
            <select class="form-select @error('notulis') is-invalid @enderror" id="notulis" name="notulis" {{ $letter['notulis'] }}>
                <option value="" hidden>Choose..</option>
                {{-- data relasi --}}
                @foreach ($guru as $select)
                    <option value="{{ $select->id }}">{{ $select->name }}</option>
                @endforeach
            </select>
            @error('notulis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    <script>
        ClassicEditor
            .create(document.querySelector('#des'))
            .catch(error => {
                console.error(error)
            });
    </script>
    </form>
@endsection
