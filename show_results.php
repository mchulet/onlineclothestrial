<style>
    .remove {
        margin-top:-10px;
        cursor:pointer;
    }
    .full_item_shown{
        cursor: move;
    }
</style>
<?php
    session_start();
    include "includes/connection.php";


    $data_cat_results="";
    $selected_cat_id = $_POST['selected_cat_id'];
    $model_number = $_POST['model_number'];

//    echo 'SELECT * FROM items WHERE category_id = '.$selected_cat_id.' And model_id='.$model_number;exit;
    $sql =	mysql_query("SELECT * FROM items WHERE category_id = ".$selected_cat_id." And model_id=".$model_number);
    while($rows = mysql_fetch_array($sql))
    {

        $item_id = $rows['item_id'];
        $item_name = $rows['item_name'];
        $item_img_path = $rows['item_img_path'];
        $vendor_name = $rows['vendor_name'];
        $vendor_link = $rows['vendor_link'];

        echo "<div class='item_shown'>";
        // echo "<img class='draggable_element' src =".base_url()."images/products/thumbs/".$row->item_img_path." />";
        echo "<img src = images/products/thumbs/".$item_img_path." title='Vendor: ".$vendor_name."' />";
        echo "</div>";

        echo "<div class='full_item_shown' id='itemid_".$item_id."' style='display:none' >";
        echo "<div class='' style='position:absolute'>";
        echo "<div class='remove' style='position:absolute;display:none'><img src='images/close.png'></div>";
        echo "<img src =images/products/".$item_img_path." title='Vendor: ".$vendor_name."' />";
        echo "<div class='vendor_name' style='display:none'>".$vendor_name."</div>";
        echo "<div class='vendor_link' style='display:none'>".$vendor_link."</div>";
        echo "</div>";
        echo "</div>";

    }

?>

<script type="text/javascript">
    $(function(){

        //$('.items_area').slimScroll();

        $('.category_menus').slimScroll();

    });
</script>

<script type="text/javascript">

    $(document).ready(function () {


        $(".full_item_shown").live('mouseover',function () {

            $(this).draggable({containment: '#dropable_area', revert: "false",appendTo: 'body' });

            $(this).children().children().show();
            $(".remove").click(function() {
                $(this).parent().parent().remove();

            })

            $(".full_item_shown").live('mouseout',function () {

                $(".remove").delay(3200).fadeOut(300);
            })
            i =100;
            $(".full_item_shown").live('click',function () {

                $(this).css("z-index",10000+i)
                i++;
            })


        });

        $(function () {
            $('img.draggable_element').hover(function () {
                $(this).next('div').show().html($(this).data('vendor_name')); // using title here
                // you can use ajax to get data from database
            });
            $('div.ad_fade').on('mouseleave',function(){ // mouse leave for fadeout div
                $(this).fadeOut(1000).html('');
            });
        });



        $('.item_shown').click(function (){

            $("#selected_models").children().each(function(e) {
                //		alert($(this).attr('id'))
                if($(this).css('display') == "block")
                {
                    model_id_for_sub_item = $(this).attr("id")
                }
            });
            //alert(model_id_for_sub_item)
            //	alert("#"+model_id_for_sub_item+".dropable_area");
            $(this).next().clone().css({'display':'block','position':'relative','top':'100px','left':'00px'}).appendTo("#"+model_id_for_sub_item+" .dropable_area");
        })

    })


</script>