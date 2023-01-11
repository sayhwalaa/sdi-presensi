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
                            <h6>Data Admin</h6>
                            <button id="addAdmin" class="btn  bg-gradient-dark mb-3" data-bs-toggle="modal"
                                data-bs-target="#addAdminModal">Tambah Data</button>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="admin-table" class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Role</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admin as $key => $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="px-2 mb-0 text-xs">{{$admin->firstItem()+$key}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->nama}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->email}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->role}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button id="editAdmin" onclick="editForm('/resource/admin/{{$p->id}}')"
                                                    class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#addAdminModal">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button id="resetAdmin" onclick="resetForm({{$p->id}})"
                                                    class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#addAdminModal">
                                                    <i class="fa fa-key"></i>
                                                </button>
                                                <button id="deleteAdmin"
                                                    onclick="deleteForm('/resource/admin/{{$p->id}}')"
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
                                        {{$admin->firstItem()}}
                                        to
                                        {{$admin->lastItem()}}
                                        of
                                        {{$admin->total()}}
                                        entries
                                    </small>
                                    {{$admin->links('pagination::bootstrap-4')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="addAdminModal" aria-labelledby="addAdminLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdminLabel">Pendaftaran Admin</h5>
                        <button class="btn-close bg-danger" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="id" id="idReset" value="">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" autofocus>
                            <div id="nama-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                            <div id="email-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <div id="password-feedback" class="invalid-feedback"></div>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            <div id="password_confirmation-feedback" class="invalid-feedback"></div>
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

    <script src="/js/admin.js"></script>
</body>

</html>