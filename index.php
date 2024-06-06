<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
include "view/header.php";
include "global.php";

if (!isset($_SESSION['mycart'])) {
  $_SESSION['mycart']=[];
}

$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top10();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
  $act = $_GET['act'];
  switch ($act) {
    case "sanphamct":
      if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        $onesp = loadone_sanpham($id);
        extract($onesp);
        $sp_cung_loai = load_sanpham_cungloai($id, $ma_loai);
        include "view/chitietsanpham.php";
      } else {
        include "view/home.php";
      }
      $onesp = loadone_sanpham($id);
      // include "view/chitietsanpham.php";
      break;

    case "sanpham":
      if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
        $kyw = $_POST['kyw'];
      } else {
        $kyw = "";
      }
      if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
      } else {
        $id = 0;
      }
      $dssp = loadall_sanpham($kyw, $id);
      $tendm = load_ten_dm($id);
      include "view/sanpham.php";
      break;

    case "dangky":
      if (isset($_POST['dangky']) && ($_POST['dangky'])) {
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        insert_taikhoan($pass, $user, $email);
        $thongbao = "Đã đăng ký thành công! Vui lòng đăng nhập để tiếp tục!";
      }
      include "view/taikhoan/dangky.php";
      break;

    case "dangnhap":
      if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $checkuser = check_user($user, $pass);
        if (is_array($checkuser)) {
          $_SESSION['user'] = $checkuser;
          // $thongbao="Đăng nhập thành công!";
          header('Location: index.php');
        } else {
          $thongbao = "Tài khoản không tồn tại! Vui lòng kiểm tra hoặc đăng ký!";
        }
      }
      include "view/taikhoan/dangky.php";
      break;

    case "edit_taikhoan":
        if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
          $id= $_POST['id'];
          $email = $_POST['email'];
          $user = $_POST['user'];
          $pass = $_POST['pass'];
          $address = $_POST['address'];
          $tel = $_POST['tel'];
          update_taikhoan($id,$user,$pass,$email,$tel,$address);
          $_SESSION['user'] = check_user($user,$pass);
          header('Location: index.php?act=edit_taikhoan');
          
        }
        include "view/taikhoan/edit_taikhoan.php";
        break;

    case "quenmk":
          if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
            $email = $_POST['email'];
            $checkemail=check_email($email);
            if (is_array($checkemail)) {
              $thongbao ="Mật khẩu của bạn là: ".$checkemail['mat_khau'];
            } else{
              $thongbao ="Email này không tồn tại!";
            }
          }
          include "view/taikhoan/quenmatkhau.php";
          break;

    case "thoat":
          session_unset();
          header('Location: index.php');
          break;
    case "addtocart":
      if (isset($_POST['addtocart'])&&($_POST['addtocart'])){
          $id=$_POST['ma_hh'];
          $ten_hh=$_POST['ten_hh'];
          $hinh=$_POST['hinh'];
          $don_gia=$_POST['don_gia'];
          $soluong=1;
          $ttien=$soluong * $don_gia;
          $spadd=[$id,$ten_hh,$hinh,$don_gia,$soluong,$ttien];
          array_push($_SESSION['mycart'],$spadd);
          }
          include "view/cart/viewcart.php";
          break;
    case "delcart":
      if (isset($_GET['id'])) {
        array_splice($_SESSION['mycart'],$_GET['id'],1);
      }else{
        $_SESSION['mycart']=[];
      }
        header('Location: index.php?act=viewcart');
        break;
    case "viewcart":
        include "view/cart/viewcart.php";
        break;
    case "bill":
        include "view/cart/bill.php";
        break;
    case "billconfirm":
        if (isset($_POST['dongydathang'])&&($_POST['dongydathang'])){
          $name=$_POST['name'];
          $address=$_POST['address'];
          $email=$_POST['email'];
          $tel=$_POST['tel'];
          $ngaydathang=date('h:i:sa d/m/Y');
          $tongdonhang=tongdonhang();
        }
        include "view/cart/billconfirm.php";
        break;
    case "mybill":
      include "view/cart/mybill.php";
      break;
    case "gioithieu":
      include "view/gioithieu.php";
      break;
    case "lienhe":
      include "view/lienhe.php";
      break;
    default:
      include "view/home.php";
  }
} else {
  include "view/home.php";
}
include "./view/footer.php";