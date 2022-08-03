<!DOCTYPE html>
<html>
<head>
	<title>Sistem Identifikasi Kepribadian</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<style type="text/css" media="screen">
		*,
		*::before,
		*::after {
		  box-sizing: border-box;
		}

		html {
		  font-family: sans-serif;
		  line-height: 1.15;
		  -webkit-text-size-adjust: 100%;
		  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}

		body {
		  margin: 0;
		  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
		  font-size: 1rem;
		  font-weight: 400;
		  line-height: 1.5;
		  color: #212529;
		  text-align: left;
		  background-color: #fff;
		}

		h1, h2, h3, h4, h5, h6 {
		  margin-top: 0;
		  margin-bottom: 0.5rem;
		}

		p {
		  margin-top: 0;
		  margin-bottom: 1rem;
		}

		table {
		  border-collapse: collapse;
		}

		th {
		  text-align: inherit;
		}

		h1, h2, h3, h4, h5, h6,
		.h1, .h2, .h3, .h4, .h5, .h6 {
		  margin-bottom: 0.5rem;
		  font-weight: 500;
		  line-height: 1.2;
		}


	</style>
</head>
<body class="bg-white">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center" style="border-bottom: 6px solid #226FFF;">
				<h2 class="font-weight-bold" style="color: #226FFF;text-align:center">Identifikasi Kepribadian DISC</h2>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 text-center px-4 pt-4 pb-0">
					<h3 class="font-weight-bold mb-2" style="text-decoration: underline;text-align:center; padding:1%">Hasil Test DISC</h3>
				</div>
			</div>

			<div class="row">
				<div class="col-11 px-0 pb-4 pt-0" style="border-bottom: 4px solid #000000;">
                    <div style="text-align:right">
                        <label for="">Tanggal</label>
                        <label for="">:</label>
                        <label for="">{{$history->tanggal}}</label>

                    </div>
					<table style="padding:1%">
						<tr>
							<td class="col-4 pb-2 px-0">Nama</td>
							<td class="col-1 pb-2 px-3">:</td>
							<td class="col-7 pb-2 px-0">{{$pengunjung->nama}}</td>
						</tr>
						<tr>
							<td class="col-4 pb-2 px-0">Email</td>
							<td class="col-1 pb-2 px-3">:</td>
							<td class="col-7 pb-2 px-0">{{$user->email}}</td>
						</tr>
						<tr>
							<td class="col-4 pb-2 px-0">No Telepon</td>
							<td class="col-1 pb-2 px-3">:</td>
							<td class="col-7 pb-2 px-0">{{$pengunjung->no_telp}}</td>
						</tr>
						@if($pengunjung->alamat != null)
						<tr>
							<td class="col-4 pb-2 px-0">Alamat</td>
							<td class="col-1 pb-2 px-3">:</td>
                            <td class="col-7 pb-2 px-0"> {{$pengunjung->alamat}}</td>
						</tr>
						@endif
					</table>
                </div>
    		</div>
			<div class="row">
				<div class="col-12 text-center px-4 pt-4 pb-0" style="border-bottom: 4px solid #000000;">
                    <h4 class="font-weight-bold mb-2" style="text-align:center; padding:1%">Dari Sifat-sifat yang anda berikan Kami dapat menyimpulkan bahwa anda memiliki Kepribadian</h4>
					<h4 class="font-weight-bold mb-2" style="text-decoration: underline;text-align:center; padding:1%">{{$history->hasil}}</h4>
				</div>
			</div>
			@if(count($kepribadian) != 0)
				<div class="row" style="border-bottom: 4px solid #000000;">
				<h4 style="text-align:center;padding:1%">Kelemahan dan Kelebihan dari Kepribadian yang miliki adalah</h4>
					<div class="d-flex flex-column" >
						<div class="p-0">
							<b>Kelebihan dari tipe kepribadian {{$history->hasil}}</b>
						</div>
						<div class="p-0">
							@forelse($kepribadian as $item)
								<p>{{ $loop->iteration }}.{{$item->kelebihan}}</p>
							@empty
								<p>Data tidak tersedia</p>
							@endforelse
						</div>
					</div>
					<div class="d-flex flex-column">
						<div class="p-0">
							<b>Kelemahan dari tipe kepribadian {{$history->hasil}}</b>
						</div>
						<div class="p-0">
							@forelse($kepribadian as $item)
								<p>{{ $loop->iteration }}.{{$item->kelemahan}}</p>
							@empty
								<p>Data tidak tersedia</p>
							@endforelse
						</div>
					</div>
				</div>
			@endif
            <div class="row">
                <div class="d-flex flex-column" >
                    <div class="p-0">
                        <h4 style="text-align:center;padding:1%">Dari hasil Identifikasi tersebut, kami menyarankan beberapa karir yang sesuai dengan kepribadian tersebut adalah</h4>
                        @forelse($karir as $data)
							<p>{{ $loop->iteration }}.{{$data->karir}}</p>
							@empty
							<p>Data tidak tersedia</p>
						@endforelse
                    </div>
                </div>
			</div>
		</div>
	</div>
</body>
</html>
<style>
    td{
        padding:5px;;
    }
</style>