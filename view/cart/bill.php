<div class="row mb">
    <div class="boxtrai mr">
        <form action="index.php?act=billconfirm" method="post">
            <div class="row mb">
            <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
            <div class="row boxcontent billform ">
                <table>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $name=$_SESSION['user']['user'];
                        $address=$_SESSION['user']['address'];
                        $email=$_SESSION['user']['email'];
                        $tel=$_SESSION['user']['tel'];
                    }else{
                        $name="";
                        $address="";
                        $email="";
                        $tel="";
                    }
                    ?>
                    <tr>
                        <td>Người đặt hàng</td>
                        <td><input type="text" name="name" id="" value="<?=$name?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="address" id="" value="<?=$address?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" id="" value="<?=$email?>"></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type="text" name="tel" id="" value="<?=$tel?>"></td>
                    </tr>
                </table>
            </div>
            </div>
            <div class="row mb" style="height: 150px;">
                <div class="boxtitle">Phương thức thanh toán</div>
                <div class="row boxcontent" style="height: 100px;">
                    <table>
                        <tr>
                            <td style="padding: 10px;"><input type="radio" name="pttt" id="" checked>Thanh toán khi nhận hàng</td>
                            <td style="padding: 10px;"><input type="radio" name="pttt" id="">Chuyển khoản ngân hàng</td>
                            <td style="padding: 10px;"><input type="radio" name="pttt" id="">Thanh toán online</td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
        <div class="row mb">
            <div class="boxtitle">GIỎ HÀNG</div>
            <div class="row boxcontent frmdsloai">
                <table >
                    <?php
                    viewcart(0);
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
        <a href="index.php?act=bill"><input type="submit" value="Đồng ý đặt hàng" name="dongydathang"></a> 
        </div>
    </div>
    <?php 
        include "./view/boxphai.php";
        ?>
</div>