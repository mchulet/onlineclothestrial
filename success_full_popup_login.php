<p>
<?php
//    session_start();
    include "includes/connection.php";
    if(isset($_SESSION['username'])) {
?>
    <div class="pop_login">
        <?php echo "<div align='center'><h3>You are not Logged in please Login</h3></div>" ?>
<!--        --><?php //include_once('user_management/user_login.php') ?>

    </div>
    <div id='ajax_error'></div>
<?php
    }
    else
    {
?>
        <div id="upload_form" style="display:none">
        <div id="register_form" class="main_form" style="float:right;margin-right: 100px;margin-top: 200px;width: 30%;padding: 20px;background: black;border-radius: 3px;-webkit-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);-moz-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);">
            <div align="center" style="font-size: 18px;color:white;font-weight:bold;font-size:20px;padding-bottom:10px;margin-bottom:20px;border-bottom:1px solid grey">Upload Your Image</div>
            <div align="center" style="font-size: 20px;color:white">Plaese upload model image of dimension 249px x 574px </div>
            <?php

                $model_image = array('name'        => 'userfile',
                                    'value'       => set_value('userfile'));

                echo form_open_multipart('user_image/add_user_model');
                    echo "<div class='input_row'>";
                    echo "<div class='labels' style='color:white;margin-left: 30px;width: auto;'>Model Image :</div>";
                    echo "<div class='input_fields' style='float: right;margin-top: -35px;color: white;'>";
                    echo form_upload($model_image);
                    echo "</div>";
                    echo "<div class='clear'></div>";
                    echo "</div>";
                    echo "<div style='margin-left:15px'>".form_submit('upload', 'Upload Image')."</div>";
                echo form_close();
            ?>
        </div>
    </div>
    <script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: '1950:2013',
          dateFormat: 'dd MM yy'
        });
    //  $('#toPopup').fadeIn('normal');
    // $('#backgroundPopup').fadeIn('normal');
    
        $("#edit_sub_cat_div").html("");
        $("#selected_models").clone().appendTo("#edit_sub_cat_div");
             
        $("#selected_models").children().each(function(e)
        {
//    		alert($(this).attr('id'))
            if($(this).css('display') == "block")
            {
                model_id_for_sub_item = $(this).attr("id")
            }
		});
//		alert(model_id_for_sub_item)
        item_count = $("#"+model_id_for_sub_item).children().next().next().find('.full_item_shown').length;
        $("#"+model_id_for_sub_item).children().next().next().find('.full_item_shown').each(function(e) {
 		});
        $('#item_vendor_info').show();
        $("#item_vendor_info").html("<h1>Click Link to Buy</h1>");
        
        $(".model_area #selected_models #"+model_id_for_sub_item+" .full_item_shown").each(function(e) {
    //    	alert($(this).attr('id'))
			single_id =$(this).attr('id')
            image_path = $(this).children().children().next().attr('src');
            vendor_name = $(this).children().children().next().next().html();
            vendor_link = $(this).children().children().next().next().next().text();

      
        var image_part = image_path.split("/");
        var image_path1= image_part[0];
        var image_path2= image_part[1];
        var image_path3= image_part[2];
        var image_path6= image_part[6];

        new_img_thumb_path = "http://www.onlinegamesbuzz.com/dress_appnew/images/products/thumbs/"+image_path6;
           $("#item_vendor_info").append("<div style='margin:10px;padding:10px;border:1px solid #cccccc'>" +
                "<div style='float:left;width: 100px;height: 100px;'>" +
                    "<img src='"+new_img_thumb_path+"'>" +
                "</div>" +
                "<div style='float:left;margin-left:40px'>" +
                    "<h5>Vendor Name: "+vendor_name+"</a></h5>" +
                "</div>" +
                "<div style='float:left;margin-left:40px'>" +
                    "<h5>Vendor Link: <a href='"+vendor_link+"' target='_blanck'>"+vendor_link+"</a></h5>" +
                "</div>" +
                "<div style='clear:both'></div>" +
           "</div>")
		});
     
        $('#edit_sub_cat_div .clear_all').hide();
        $('#upload_form').hide();
       //  alert(item_count)
  });
</script>
                   
                   
                        
    <div>
        <div id="edit_sub_cat_div" style="float:left;width:450px;"></div>
        <div id="item_vendor_info" style="border:1px solid #ffffff;height:610px;width:500px;float:right;overflow-y:scroll"></div>
        <div id="download_social">
            <input type="submit" value="Download" onclick="printDiv();" />
            <div id="fb-root"></div>
            <script>
                (function(d, s, id)
                {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }
                (document, 'script', 'facebook-jssdk'));
            </script>

            <div class="fb-share-button" data-href="https://www.facebook.com/pages/My-Body-Shape/708389669211223" data-type="button_count" style="float:right;"></div>
        </div>
        <div style="clear:both"></div>
    </div>
                       
                       
<?php
    }
?>
</p>