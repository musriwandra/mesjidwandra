<form action="<?= base_url('Home/simpan')?>" name="form" method="post">
    <table>
        <tr>
            <td>Kode Keberangkatan</td>
            <td><select name="kode" id=""onchange="a()">
            <option value="k001">k001</option>
            <option value="k002">k002</option>
            <option value="k003">k003</option>
        
            </select>
        </tr>

        <tr>
            <td>Agenda</td>
            <td><input type="text" name="agenda"/></td>
        </tr>

        <tr>
            <td>Biaya Transportasi</td>
            <td><input type="text" name="transportasi" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>Biaya Penginapan</td>
            <td><input type="text" name="penginapan" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>Biaya Pokok</td>
            <td><input type="text" name="pokok" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>Total</td>
            <td><input type="text" name="total" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td><input type="submit" name="simpan"></td>
        </tr>

        <script>
            function a() {
                var kode = document.form.kode.value;
                var agenda = document.form.agenda.value;

                if(kode == 'k001') {
                    document.form.agenda.value = "Rapat"
                }else if (kode == 'k002') {
                    document.form.agenda.value = "Dinas Luar"
                }else {
                    document.form.agenda.value = "Study"
                }
            }

            function b(){
                var transportsi = document.form.transportasi.value;
                var penginapan = document.form.penginapan.value;
                var pokok = document.form.pokok.value;

                document.form.total.value = parseInt(transportsi)+parseInt(penginapan)+parseInt(pokok)
            }
        </script>
    </table>
</form>