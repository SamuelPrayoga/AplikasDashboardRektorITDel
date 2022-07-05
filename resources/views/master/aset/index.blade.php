@extends('layout.master')

@section('title', 'Mahasiswa')
@section('header-content')
    <h1 class="judul-page">Aset Kampus</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Master</a></div>
        <div class="breadcrumb-item"><a href="/aset">Aset Kampus</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
@endsection

@section('header-body')
    <div class="card">
        <div class="card-header">
            <h4>Data Asset Kampus</h4>
            <div class="card-header-form">
                <form method="/aset" >
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search.." name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
                <div class="col-12 pt-5">
                    {{-- <h5 class="mb-4 text-primary">Data Asset</h5> --}}
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr class="text-center bg-primary text-white">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Jenis</th>
                                <th>Tipe</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Penyimpanan</th>
                                <th>Status</th>
                                <th>Unit</th>
                                <th>Kategori</th>
                                <th>Gedung</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach ( $asset as $value )
                            <tr class="text-center">
                                <td>{{ $i++ }}</td>
                                <td class="text-left">{{ $value->kodeAset }}</td>
                                <td>{{ $value->jenisBarang }}</td>
                                <td>{{ $value->tipeBarang }}</td>
                                <td>{{ $value->jumlahBarang }}</td>
                                <td>{{ $value->tglBeli }}</td>
                                <td>{{ $value->penyimpanan }}</td>
                                <td>
                                    @if( $value->status == "ada" )
                                        <div class="badge badge-success badge-pill">Ada</div>
                                    @else
                                        <div class="badge badge-secondary badge-pill">Kosong</div>
                                    @endif
                                </td>
                                <td>{{ $value->unit }}</td>
                                <td>{{ $value->kategori }}</td>
                                <td>{{ $value->gedung }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke text-right">
        </div>
    </div>
@endsection
