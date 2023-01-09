<!DOCTYPE html>
<html lang="en">
@include('template.head')

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    {{-- sidebar --}}
    @include('template.sidebar')
    {{-- end sidebar --}}
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('template.navbar')
        {{-- end navbar --}}

        <!--start container-->
        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('msg'))
                    <div class="alert alert-success" style="color:white;">
                        {{ session()->get('msg') }}
                        <div style="float: right">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>


                <div class="col-12">
                    @if(session()->has('pesan'))
                    <div class="alert alert-success" style="color:white;">
                        {{ session()->get('pesan')}}
                        <div style="float: right">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>Data Pengguna</h6>
                            <button id="addPegawai" class="btn  bg-gradient-dark mb-3" data-bs-toggle="modal"
                                data-bs-target="#addPegawaiModal">Tambah Data</button>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NIP</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jabatan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cabang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawai as $key => $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="px-2 mb-0 text-xs">{{$pegawai->firstItem()+$key}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$p->pegawai->nip}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->nama??'N/A'}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->pegawai->jabatan??'N/A'}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->pegawai->cabang??'NA'}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button id="editPegawai" class="btn btn-warning">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button id="deletePegawai" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <small class="px-3" style="font-weight: bold">
                                    Showing
                                    {{$pegawai->firstItem()}}
                                    to
                                    {{$pegawai->lastItem()}}
                                    of
                                    {{$pegawai->total()}}
                                    entries
                                </small>
                                <style>
                                    .page .page-item.active .page-link {
                                        color: white;
                                    }
                                </style>
                                <div class="page"
                                    style="float: right; font-weight:bold; margin-right: 50px; margin-top: 20px;">
                                    {{$pegawai->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="addPegawaiModal" aria-labelledby="addPegawaiLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPegawaiLabel">Pendaftaran Pegawai</h5>
                        <button class="btn-close bg-danger" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pegawai.store'); }}" method="POST">
                            @csrf
                            <div class='mb-3'>
                                <label for="nip" class="form-label">NIP</label>
                                <input required type="number" name="nip" id="nip" value="{{ old(" nip") }}"
                                    class="form-control @error('nip') is-invalid @enderror" autofocus>
                                @error('nip')
                                <div class='text-danger'>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input required type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                <input required type="date" name="tglLahir" id="tglLahir" value="{{ old('tglLahir') }}"
                                    class="form-control @error('tglLahir') is-invalid @enderror">
                                @error('tglLahir')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jKel" class="form-label">Jenis Kelamin</label>
                                <select name="jKel" id="jKel" class="form-control" value="{{ old('jKel') }}">
                                    <option>-- Jenis Kelamin --</option>
                                    <option value="1" {{ old('jKel')=='Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="2" {{ old('jKel')=='Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                                @error('jkel')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="noHp" class="form-label">Nomor Hp</label>
                                <input required type="tel" name="noHp" id="noHp" value="{{ old('noHp') }}"
                                    class="form-control @error('noHp') is-invalid @enderror">
                                @error('noHp')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jabatan_id" class="form-label">Jabatan</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-control"
                                    value="{{ old('jabatan_id') }}">
                                    <option>-- Pilih Jabatan --</option>
                                    @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}">{{ $j->jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cabang_id" class="form-label">Cabang</label>
                                <select name="cabang_id" id="cabang_id" class="form-control"
                                    value="{{ old('cabang_id') }}">
                                    <option>-- Pilih Cabang --</option>
                                    @foreach ($cabang as $c)
                                    <option value="{{ $c->id }}">{{ $c->nama_cabang }}</option>
                                    @endforeach
                                </select>
                                @error('cabang_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class='mb-3'>
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat"
                                    rows="3">{{ old('alamat') }}</textarea>
                            </div>

                            <div style="float: right">
                                <button id="save" type="button" class="btn btn-primary mb-2">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal --}}
        <!--end container-->
        {{-- footer --}}
        @include('template.footer')
        {{-- end footer --}}
        </div>
    </main>
    <!--   Core JS Files   -->
    @include('template.script')

    <script src="/js/pegawai.js"></script>
</body>

</html>