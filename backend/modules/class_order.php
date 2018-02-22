<?php
class Order{
    public function view(){//view những đơn hàng chưa giao
        Config::$page_title="Danh sách đơn hàng";
        global $smarty;

        $show_tool_search="";
        $where="WHERE o_status=0";
        if (isset($_POST['btn_search_name'])){
            $txt_name=trim($_POST['txt_customer_name']);
            $where.=" AND fullname like '%".mysql_escape_string($txt_name)."%'";
            $show_tool_search="search_name";
        }
        if (isset($_POST['btn_search_date'])){
            $date_start=$_POST['date_start'];
            $date_stop=$_POST['date_stop'];
            $where.=" AND (o_date BETWEEN '$date_start' AND '$date_stop')";
            $show_tool_search="search_date";
        }

        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("SELECT * FROM customer INNER JOIN tbl_order ON customer.customer_id=tbl_order.customer_id {$where}"));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("SELECT customer.fullname,customer.customer_id, tbl_order.shipping_address, tbl_order.order_id,tbl_order.o_total,tbl_order.recipients,tbl_order.phone_number FROM customer INNER JOIN tbl_order ON customer.customer_id=tbl_order.customer_id {$where} ORDER BY tbl_order.customer_id DESC limit $start,$limit");
        $countpage=mysql_num_rows($result); //Số bản ghi trên trang hiện tại
        $countrows=$count; //Tổng số bản ghi lấy đc
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=order&act=view",$pages,3); //Phân trang
        $order=array();
        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $order[]=$row;
            }
        }
        $smarty->assign('listOrder',$order);
        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('show_tool_search',$show_tool_search);
        $temp=$smarty->fetch('order_list.tpl');
        return $temp;
    }
    public function view2(){//view những đơn hàng đã giao
        Config::$page_title="Danh sách đơn hàng";
        global $smarty;

        $show_tool_search="";
        $where="WHERE o_status=1";
        if (isset($_POST['btn_search_name'])){
            $txt_name=trim($_POST['txt_customer_name']);
            $where.=" AND fullname like '%".mysql_escape_string($txt_name)."%'";
            $show_tool_search="search_name";
        }
        if (isset($_POST['btn_search_date'])){
            $date_start=$_POST['date_start'];
            $date_stop=$_POST['date_stop'];
            $where.=" AND (o_date BETWEEN '$date_start' AND '$date_stop')";
            $show_tool_search="search_date";
        }

        $p=new Pager();
        $limit=5;
        $start=$p->findStart($limit);
        $count=mysql_num_rows(mysql_query("SELECT * FROM customer INNER JOIN tbl_order ON customer.customer_id=tbl_order.customer_id {$where} "));
        $pages=$p->findPages($count,$limit);
        $result=mysql_query("SELECT customer.fullname,customer.customer_id, tbl_order.order_id,tbl_order.o_date,tbl_order.o_total,tbl_order.o_shipper FROM customer INNER JOIN tbl_order ON customer.customer_id=tbl_order.customer_id {$where} ORDER BY tbl_order.customer_id DESC limit $start,$limit");
        $countpage=mysql_num_rows($result); //Số bản ghi trên trang hiện tại
        $countrows=$count; //Tổng số bản ghi lấy đc
        $pagels=PagingUtils::showpage($_GET['page'],"?mod=order&act=view",$pages,3); //Phân trang
        $order=array();
        if(mysql_num_rows($result)<>0){
            while ($row=mysql_fetch_assoc($result)){
                $order[]=$row;
            }
        }
        $smarty->assign('listOrder',$order);
        $smarty->assign('countrows',$countrows);
        $smarty->assign('countpage',$countpage);
        $smarty->assign('pagels',$pagels);
        $smarty->assign('show_tool_search',$show_tool_search);
        $temp=$smarty->fetch('order_list2.tpl');
        return $temp;
    }


    function getCustomerName($customer_id){
        $sql="select fullname from customer WHERE customer_id=$customer_id";
        $customer=mysql_fetch_assoc(mysql_query($sql));
        return $customer['fullname'];
    }

    public function detail(){
        Config::$page_title="Chi tiết đơn hàng";
        global $smarty;

        $order_id=trim($_GET["id"]);
        $sql_get="SELECT order_detail.order_id, order_detail.product_id,order_detail.number,order_detail.price,tbl_order.customer_id,tbl_order.o_status FROM tbl_order INNER JOIN order_detail ON tbl_order.order_id=order_detail.order_id WHERE order_detail.order_id=$order_id";
        $table_order_detail=mysql_query($sql_get);
        $list_product=array();
        $total=0;
        if (mysql_num_rows($table_order_detail)!=0){
            while($row = mysql_fetch_assoc($table_order_detail)){
                $row['product_name']=$this->getProduct_name($row['product_id']);
                $row['total_row']=$row['number']*$row['price'];
                $total+=$row['total_row'];
                $list_product[]=$row;
            }
        }
        $smarty->assign('list_product',$list_product);
        $smarty->assign('total',$total);
        $smarty->assign('customer_name',$this->getCustomerName($list_product[0]['customer_id']));
        $smarty->assign('status',$list_product[0]['o_status']);
        $smarty->assign('order_id',$list_product[0]['order_id']);
        $result=$smarty->fetch('order_detail.tpl');
        return $result;
    }
    function getProduct_name($product_id){
        $sql_get="select p_name from product WHERE product_id=$product_id";
        $product=mysql_fetch_assoc(mysql_query($sql_get));
        return $product['p_name'];
    }

    public function confirm(){
        $order_id=$_POST['order_id'];
        $shipper=trim($_POST['shipper']);
        $date=date("Y-m-d");
        $sql="update tbl_order set o_shipper='".mysql_escape_string($shipper)."',o_status=1,o_date='$date' where order_id=$order_id";
        if (!($result=mysql_query($sql))){
            echo "<script>alert('Xảy ra lỗi!')</script>";
            echo "<script type=\"text/javascript\">window.history.back();</script>";
        }
        else{
            header("location:?mod=order&act=view");
        }
    }

    public function delete(){
        $order_id=$_POST['id'];
        $sql_delete="delete from tbl_order WHERE order_id=$order_id";
        $sql_delete_detail="delete from order_detail WHERE order_id=$order_id";
        $isOk=0;
        if (mysql_query($sql_delete) && mysql_query($sql_delete_detail)){
            $isOk=1;
        }
        $result=array('ok'=>$isOk);
        echo json_encode($result);
        exit();
    }

}
?>