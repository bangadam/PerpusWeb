<html>

    <tr></tr>
    <tr>
        <th colspan="7" align="center">Detail Transaksi</th>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;</td>
        <td></td>
        <td></td>
        <td>Tanggal : {{{ date("d F Y", time()) }}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        
    </tr>
    <tr>
        <td>&nbsp;&nbsp;</td>
        <td></td>
        <td></td>
        <td>User : {{{ Auth::user()->username }}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr></tr>
<table style="border: 1px solid #000000;">
        <tr>
            <th>&nbsp;&nbsp;</th>
            <th>ID Transaksi</th>
            <td>: {{{ $id }}}</td>
            <th>&nbsp;&nbsp;</th>
            <th>Tanggal Pinjam</th>
            <td>: {{{ date('d F Y', strtotime($detail[0]['tgl_pinjam']))}}}</td>
            <td>&nbsp;&nbsp;</td>
        </tr>
        <tr>
            <th>&nbsp;&nbsp;</th>
            <th>Nama</th>
            <td>: {{{ $detail[0]['nama_peminjam'] }}}</td>
            <th>&nbsp;&nbsp;</th>
            <th>Batas Peminjaman</th>
            <td>: {{{ date('d F Y', strtotime($detail[0]['batas']))}}}</td>
            <td>&nbsp;&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <th>Status</th>
            <td>: {{{ $detail[0]['status'] }}}</td>
            <td>&nbsp;&nbsp;</td>
        </tr>
        <tr></tr>
        <tr>
            <th>&nbsp;&nbsp;</th>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Denda</th>
            <th>Total</th>
        </tr>
        @if($detail[0]['status']=="sudah kembali")
        @for($i=0; $i<count($detail);$i++)
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>{{{$i+1}}}</td>
            <td>{{{ $detail[$i]['judul'] }}}</td>
            <td>{{{ $detail[$i]['pengarang'] }}}</td>
            <td>{{{ $detail[$i]['penerbit'] }}}</td>
            <td>{{{ $den[$i] }}}</td>
            <td>{{{ $detail[$i]['total'] }}}</td>
        </tr>
        @endfor
        @else
        @for($i=0; $i<count($detail);$i++)
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>{{{$i+1}}}</td>
            <td>{{{ $detail[$i]['judul'] }}}</td>
            <td>{{{ $detail[$i]['pengarang'] }}}</td>
            <td>{{{ $detail[$i]['penerbit'] }}}</td>
            <td>{{{ $den[$i] }}}</td>
            <td>{{{ $Total[$i] }}}</td>
        </tr>
        @endfor
        @endif
        <tr>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>&nbsp;&nbsp;</td>
            <td>{{{ $jumlah }}}</td>
        </tr>
    </table>
</html>