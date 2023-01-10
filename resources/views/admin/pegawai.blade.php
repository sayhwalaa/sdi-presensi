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
                                <table id="pegawai-table" class="table align-items-center mb-0">
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
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{$p->pegawai->nama??'N/A'}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->pegawai->jabatan_id
                                                    == null
                                                    ?'N/A':$jabatan->find($p->pegawai->jabatan_id)->jabatan}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->pegawai->cabang_id
                                                    == null
                                                    ?'N/A':$cabang->find($p->pegawai->cabang_id)->cabang}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button id="editPegawai" onclick="editForm('/pegawai/{{$p->id}}')"
                                                    class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#addPegawaiModal">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button id="deletePegawai" onclick="deleteForm('/pegawai/{{$p->id}}')"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="px-3 page d-flex justify-content-between">

                                    <small style="font-weight: bold">
                                        Showing
                                        {{$pegawai->firstItem()}}
                                        to
                                        {{$pegawai->lastItem()}}
                                        of
                                        {{$pegawai->total()}}
                                        entries
                                    </small>
                                    {{$pegawai->links('pagination::bootstrap-4')}}
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

                        <div class='mb-3'>
                            <input type="hidden" name="id" id="id" value="">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="number" name="nip" id="nip" class="form-control" autofocus>
                            <div id="nip-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input required type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                class="form-control">
                            <div id="nama-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input required type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                class="form-control">
                            <div id="tgl_lahir-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="j_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="j_kelamin" id="j_kelamin" class="form-control">
                                <option value="0" disabled selected>-- Jenis Kelamin --</option>
                                <option value="1">
                                    Laki-laki
                                </option>
                                <option value="2">
                                    Perempuan
                                </option>
                            </select>
                            <div id="j_kelamin-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                            <input required type="tel" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}"
                                class="form-control">
                            <div id="no_telepon-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan</label>
                            <select name="jabatan_id" id="jabatan_id" class="form-control">
                                <option value="0" selected disabled>-- Pilih Jabatan --</option>
                                @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}">{{ $j->jabatan }}</option>
                                @endforeach
                            </select>
                            <div id="jabatan_id-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="cabang_id" class="form-label">Cabang</label>
                            <select name="cabang_id" id="cabang_id" class="form-control" value="{{ old('cabang_id') }}">
                                <option value="0" selected disabled>-- Pilih Cabang --</option>
                                @foreach ($cabang as $c)
                                <option value="{{ $c->id }}">{{ $c->cabang }}</option>
                                @endforeach
                            </select>
                            <div id="cabang_id-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class='mb-3'>
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                        </div>

                        <div style="float: right">
                            <button id="save" type="button" class="btn btn-primary mb-2">Daftar</button>
                        </div>

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