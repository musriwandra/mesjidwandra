<form action="<?= base_url('quiz/simpan')?>" name="form" method="post">
    <table>
        <tr>
            <td>Kode Sepeda</td>
            <td><select name="kodesepeda" id=""onchange="a()">
            <option value="k001">k001</option>
            <option value="k002">k002</option>
            <option value="k003">k003</option>
        
            </select>
        </tr>

        <tr>
            <td>Jenis Sepeda</td>
            <td><input type="text" name="jenissepeda"/></td>
        </tr>

        <tr>
            <td>Harga Semua</td>
            <td><input type="text" name="hargasemua" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>jumlah Beli</td>
            <td><input type="text" name="jumlahbeli" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td>Harga Satuan</td>
            <td><input type="text" name="hargasatuan" onkeyup="b()"/></td>
        </tr>

        <tr>
            <td><input type="Submit" name="simpan"></td>
        </tr>

        <script>
            function a() {
                var kode = document.form.kodesepeda.value;

                if(kode == 'k001') {
                    document.form.jenissepeda.value = "polyon"
                }else if (kode == 'k002') {
                    document.form.jenissepeda.value = "samki"
                }else {
                    document.form.jenissepeda.value = "gunung"
                }
            }

            function b(){
                var hrgsemua = document.form.hargasemua.value;
                var jmlbeli = document.form.jumlahbeli.value;

                document.form.hargasatuan.value = parseInt(hrgsemua) / parseInt(jmlbeli)
            }
        </script>
    </table>
</form>