<form action="<?= base_url('uts/simpan')?>" name="form" method="post">
    <table>
        <tr>
            <td>NoBp</td>
            <td><select name="nobp" id=""onchange="a()">
            <option value="2120014">2120014</option>
            <option value="2120018">2120018</option>
            <option value="2120020">2120020</option>
        
            </select>
        </tr>

        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"/></td>
        </tr>

        <tr>
            <td>Uts</td>
            <td><input type="text" name="uts" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>Uas</td>
            <td><input type="text" name="uas" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keterangan" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>

        <script>
            function a() {
                var nobp = document.form.nobp.value;

                if(nobp == '2120014') {
                    document.form.nama.value = "wandra"
                }else if (nobp == '2120018') {
                    document.form.nama.value = "randi"
                }else {
                    document.form.nama.value = "ilham"
                }
            }

            function b(){
                var uts = document.form.uts.value;
                var uas = document.form.uas.value;

                document.form.keterangan.value = parseInt(uts) + parseInt(uas)
            }
        </script>
    </table>
</form>