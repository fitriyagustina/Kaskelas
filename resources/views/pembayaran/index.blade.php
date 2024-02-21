@extends('layouts/app')
@section('konten')


                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">TOTAL PEMBAYARAN</th>
                                <th scope="col">TGL BAYAR TERAKHIR</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
    @forelse ($pembayaran as $key => $pembayaran)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $pembayaran->siswa->siswa }}</td>
            <td>{{ $pembayaran->total_bayar }}</td>
            <td>{{ $pembayaran->tgl_bayar_last }}</td>
            <td class="text-center">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST">

                    <a href="{{ route('pembayaran.history', $pembayaran->siswa_id) }}" class="btn btn-sm btn-info mx-2">HISTORY</a>

                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">Data Pembayaran belum Tersedia.</td>
        </tr>
    @endforelse
</tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>

    @endsection
