<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent mb10 frmdsloai">
                <table >
                    
                    <?php
                    viewcart(1);
                //     $tong=0;
                //     $dem=0;
                // foreach ($_SESSION['mycart'] as $cart) {
                //     $hinh=$img_path.$cart[2];
                //     $ttien=$cart[4]*$cart[3];
                //     $tong+=$ttien;
                //     $xoasp="index.php?act=delcart&id=".$dem;
                    
                //     echo '
                //     <tr>
                //     <td><img src="'.$hinh.'" alt="" height="80px"></td>
                //     <td>'.$cart[1].'</td>
                //     <td>'.$cart[3].'</td>
                //     <td>'.$cart[4].'</td>
                //     <td>'.$ttien.'</td>
                //     <td><a href="'.$xoasp.'"><input type="button" value="Xóa" /></a></td>
                // </tr>';
                // $dem+=1;
                // }
                //     echo '
                //     <tr>
                //     <td colspan="4">Tổng đơn hàng</td>
                   
                //     <td>'.$tong.'</td>
                //     <td></td>
                // </tr>
                //     ';
                ?>
                    <!-- <tr>
                    <td><img src="/image/Merzy1.webp" alt="" height="80px"></td>
                    <td>Son merzy</td>
                    <td>159.000</td>
                    <td>1</td>
                    <td>159.000</td>
                    <td><input type="button" value="Xóa"></td>
                </tr>
                <tr>
                <td><img src="/image/Merzy_li.webp" alt="" height="80px"></td>
                    <td>Son merzy lì</td>
                    <td>159.000</td>
                    <td>1</td>
                    <td>218.000</td>
                    <td><input type="button" value="Xóa"></td>
                </tr> -->
                </table>
            </div>
        </div>
        <div class="row mb bill">
        <a href="index.php?act=bill"><input type="submit" value="Đồng ý đặt hàng"></a> <a href="index.php?act=delcart"><input type="button"
                    value="Xóa giỏ hàng"></a>
        </div>
    </div>
    <?php 
        include "./view/boxphai.php";
        ?>
</div>