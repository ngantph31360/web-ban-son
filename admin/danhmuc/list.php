<main class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
    </div>
    <div class="row frmcontent">
        <form action="#" method="post">
            <div class="row mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm="index.php?act=suadm&id=".$ma_loai;
                        $xoadm="index.php?act=xoadm&id=".$ma_loai;
                        echo '
                    <tr>
                    <td><input type="checkbox" name="" id="" /></td>
                    <td>'.$ma_loai.'</td>
                    <td>'.$ten_loai.'</td>
                    <td>
                      <a href="'.$suadm.'"><input type="button" value="Sửa" /></a>

                      <a href="'.$xoadm.'"><input type="button" value="Xóa" onclick="return confirm(\'Xóa danh mục sẽ ảnh hưởng dữ liệu, bạn có chắc muốn xóa!\')"/></a>
                    </td>
                  </tr>';
                    }
                    ?>

                </table>
            </div>
            <div class="row mb10">
                <input type="button" value="Chọn tất cả" />
                <input type="button" value="Bỏ chọn tất cả" />
                <input type="button" value="Xóa các mục đã chọn" />
                <a href="index.php?act=adddm"><input type="button" value="Nhập thêm" /></a>
            </div>
        </form>
    </div>
</main>
</div>
