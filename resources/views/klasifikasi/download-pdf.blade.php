<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klasifikasi</title>
    <style>
        #receipt{
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 50px 50px;
            margin: 30px auto 0 auto;
            width: 900px;
            height: auto;
            background: #fff;
        }
        .img img{
            width: 120px;
            height: auto;
        }
        .text{
            line-height: 0.4;
            margin-left: 20px;
        }
        .alamat{
            margin-left: 230px;
        }
        .date{
            margin-left: 70%;
            margin-top: 30px;
        }
        .perihal{
            margin-left: 40px;
            margin-top: 30px;
        }
        .flex{
            display: flex;
        }
        .to{
            margin-left: 270px;
            margin-top: 30px;
        }
        .isi{
            line-height: 2;
            margin-left: 40px;
            margin-top: 50px;
            margin-bottom: 60px;
        }
        .hadir{
            margin-left: 40px;
            line-height: 1.5;
        }
        .tulis{
            margin-top: 80px;
            margin-left: 70%;
        }
        .ttd{
            margin-left: 24px;
            margin-top: 40px;
            margin-bottom: 190px;
        }
    </style>
</head>
<body>
    <div id="receipt">
        <div class="flex">
            <div class="img">
                <td><img src="logo-wk.png"></td>
            </div>
            <div class="text">
                    <h2>SMK Wikrama Bogor</h2>
                    <hr>
                    <p>Bisnis dan Management</p>
                    <p>Teknologi Informasi dan Komunikasi</p>
                    <p>Pariwisata</p>
                </div>
                <div class="alamat">
                    <p>Jl. Raya Wangun Kel. Sindangsari Bogor</p>
                    <p>Telp/Faks : (0251)8242441</p>
                    <p>e-mail : prohumasi@smkwikrama.sch.id</p>
                    <p>Website : www.smkwikrama.sch.id</p>
                </div>
            </div>
            <hr>
            <div class="date">
                {{-- <b>{{ $letter->created_at->format('j F Y') }}</b> --}}
                <b>15 Maret 2023</b>
            </div>
            <div class="flex">
                <div class="perihal">
                    {{-- <p>No : {{ $letter->letter_code }}/000{{$letter->id}}/SMK-WIKRAMA-BOGOR/XII/{{ date('Y') }}</p> --}}
                    <p>No : 0001-1/0001/SMK-WIKRAMA-BOGOR/XII/2023</p>
                    {{-- <p>Hal : <b>{{ $letter->name_type }}</b></p> --}}
                    <p>Hal : <b>Rapat Rutin</b></p>
                </div>
                <div class="to">
                    <p>Kepada</p>
                    <p>Yth. Bapa/Ibu Terlampir</b></p>
                    <p>di Tempat</p>
                </div>
            </div>
            <div class="isi">
            {{-- {{ $letter->content }} --}}
            wqwhsncdfwqiokassmndhfgyweq89okadsjhfgyewqoskdchbfjuegfbdnwqkowihhbnwiufgbwqnmkijufhd
            </div>
            <div class="hadir">
                {{-- @php
                    $no = 1;
                @endphp --}}
                {{-- @foreach($letter as $index) --}}
                    {{-- <ol>{{ $no ++ }} . {{ $index['recipients'] }}</ol> --}}
                {{-- @endforeach --}}
                <ol>1. Ony</ol>
            </div>
            <div class="tulis">
                Hormat kami, <br>
                Kepala SMK Wikrama Bogor
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="ttd">
                    (................................)
                </div>
            </div>
        </div>
    </div>
</body>
</html>
