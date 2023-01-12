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
                </div>
                
                <div class="row">

                    <div class="col-md-12">
                        <form action="{{ route('PUpdate',$pegawai->id) }}" method="POST" enctype="multipart/form-data" id="PegawaiInfoForm">
                            @csrf
                            <div class="card">
                                <div class="card-header pb-0">                        
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                          <img class="profile-user-img img-fluid img-circle pegawai_image"
                                                src="/users/foto/{{Auth::user()->pegawai()->poto == ''? 'no-image.png':Auth::user()->pegawai()->foto}}"
                                                alt="profil pegawai" width="225" style="border-radius: .5rem;">
                                        </div>
                                        <h3 class="profile-username text-center">{{Auth::pegawai()->nama}}</h3>                   
                                        <p class="text-muted text-center">Pegawai</p>                 
                                        <input type="file" name="file" id="file" style="opacity: 0;height:1px;display:none">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-block " id="change_picture_btn"><b>Ubah Profil</b></a>                     
                                    </div>       
                                </div>
    
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nama</label>
                                                <input class="form-control" type="text" value="{{ Auth::user()->pegawai()->nama }}" name="nama">
                                                <span class="text-danger error-text nama_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">NIP</label>
                                                <input class="form-control" type="number" value="{{ Auth::user()->pegawai()->nip }}" name="nip">
                                                <span class="text-danger error-text nip_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                                <input class="form-control" type="date" value="{{ Auth::user()->pegawai()->tgl_lahir }}" name="tgl_lahir">
                                                <span class="text-danger error-text tgl_lahir_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                                                <input class="form-control" value="{{ Auth::user()->pegawai()->j_kelamin }}" name="j_kelamin">
                                                <span class="text-danger error-text j_kelamin_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">no Hp</label>
                                                <input class="form-control" type="tel" value="{{ Auth::user()->pegawai()->no_telepon }}" name="no_telepon">
                                                <span class="text-danger error-text no_telepon_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Alamat</label>
                                                <input class="form-control" type="text" value="{{ Auth::user()->pegawai()->alamat }}" name="alamat">
                                                <span class="text-danger error-text alamat_error"></span>
                                            </div>
                                        </div>
                                    </div>           
                                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                                </div>
                                <div class="body">
                                    <form class="form-horizontal" action="{{ route('ChangePw') }}" method="POST" id="changePw">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="passwordLama" class="form-label">Password Lama</label>
                                            <input type="password"  name="oldpassword" id="inputPass" placeholder="Masukkan Password Lama"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                                <span class="text-danger error-text oldpassword_error"></span>
                                        </div>
                                        <div class="mb-3">
                                                <label for="passwordBaru" class="form-label">Password Baru</label>
                                                <input type="password"  name="newpassword" id="inputNew" placeholder="Masukkan Password Baru" 
                                                    class="form-control @error('passwordBaru') is-invalid @enderror">
                                                @error('passwordBaru')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                <span class="text-danger error-text newpassword_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kPasswordBaru" class="form-label">Konfirmasi Password Baru</label>
                                                <input type="password"  name="knewpassword" id="inputKnew" placeholder="Masukkan Konfirmasi Password Baru"
                                                    class="form-control @error('kPasswordBaru') is-invalid @enderror">
                                                @error('kPasswordBaru')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div style="float: right">
                                            <button type="submit" class="btn btn-primary mb-2">Update Password</button>   
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </div>
        <!--end container-->
        {{-- footer --}}
        @include('template.footer')
        {{-- end footer --}}
        </div>
    </main>
    <!--   Core JS Files   -->
    @include('template.script')

    <script>
        $.ajaxSetup({
             headers:{
               'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          
          $(document).on('click','#change_picture_btn', function(){
              $('#file').click();
            });
            $('#file').ijaboCropTool({
                  preview : '.pegawai_image',
                  setRatio:1,
                  allowedExtensions: ['jpg', 'jpeg','png'],
                  buttonsText:['CROP','QUIT'],
                  buttonsColor:['#30bf7d','#ee5155', -15],
                  processUrl:'{{ route("crop") }}',
                  withCSRF:['_token','{{ csrf_token() }}'],
                  onSuccess:function(message, element, status){
                     alert(message);
                  },
                  onError:function(message, element, status){
                    alert(message);
                  }
               });   
        </script>

</body>

</html>