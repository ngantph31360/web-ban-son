<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $dem = 0;
    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = "";
        $xoasp_td2 = "";
    }
    echo '<tr style="background-color: chocolate;">
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                ' . $xoasp_th . '
            </tr>';
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[4] * $cart[3];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&id=' . $dem . '"><input type="button" value="Xóa" /></a></td>';
        } else {
            $xoasp_td = "";
        }
        echo '
                    <tr>
                    <td><img src="' . $hinh . '" alt="" height="80px"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . $cart[3] . '</td>
                    <td>' . $cart[4] . '</td>
                    <td>' . $ttien . '</td>
                        ' . $xoasp_td . '
                </tr>';
        $dem += 1;
    }
    echo '
                    <tr>
                    <td colspan="4">Tổng đơn hàng</td>
                   
                    <td><strong>' . $tong . '</strong></td>
                        ' . $xoasp_td2 . '
                </tr>
                    ';
}

function tongdonhang($del)
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[4] * $cart[3];
        $tong += $ttien;
    }
    return $tong;
}

function insert_bill($name,$address,$email,$tel,$ngaydathang,$tongdonhang){
    $sql="INSERT INTO bill(name,address,email,tel,ngaydathang,tongdonhang) values('$name','$address','$email','$tel','$ngaydathang','$tongdonhang')";
        pdo_execute($sql);
}
