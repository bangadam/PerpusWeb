<html>
    
    <tr></tr>
    <tr>
        <th colspan="7" align="center">Daftar Buku /PusWeb.com</th>
    </tr>
    <tr></tr>
    <tr>
        <th colspan="7" align="center">Admin : <b>{{{ Auth::user()->username }}}</b></th>
    </tr>
    <tr></tr>
<table border="1" style="border: 1px solid #000000;">
        <tr>
            <th></th>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Penerbit</th>
            <th>Lokasi</th>
        </tr>
        <?php $i=1; ?>
        @foreach($daftar as $b)
            <tr>
                <td></td>
                <td>{{{ $i++ }}}</td>
                <td>{{{ $b['judul'] }}}</td>
                <td>{{{ $b['pengarang'] }}}</td>
                <td>{{{ $b['th_terbit'] }}}</td>
                <td>{{{ $b['penerbit'] }}}</td>
                <td>{{{ $b['lokasi'] }}}</td>
            </tr>
        @endforeach
    </table>
</html>